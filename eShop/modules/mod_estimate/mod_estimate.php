<?php

/**
 * mod_estimate.php
 * @ File description :  estimate management (not yet implemented !)
 * @ Authors : 2004 T. Prêtre, R. Emourgeon & Christian KAKESA
 * @ eShop is Free Software
 * @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
 *
 * $Id: mod_estimate.php,v 1.8 2004/08/20 17:20:49 setcode Exp $
 */

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

// in all cases we assign this value
$template->assign('is_not_logged', $is_not_logged);

if($session->is_registered("level"))
	$template->assign('level', $_SESSION["level"]);

if($session->is_registered("login"))
	$template->assign('user', $_SESSION["login"]);

if($session->is_registered("id"))	
	$template->assign('id', $_SESSION["id"]);

if($is_not_logged)
{
	$message = "Vous devez vous connecter ou vous enregistrer pour pouvoir continuer !";
	$template->assign("message", $message);
	$template_include = "message";
	$template->assign("template", $template_include);
}
else
{
	switch($_REQUEST["action"])
	{
		case "confirm" :
			//insert data to table est_estimate
			$query = "INSERT INTO ".$GLOBALS["db_prefix"]."_estimate VALUES ('', '', '".$_SESSION["id"]."', NOW(), '". LibSql::Number($_POST["ttc"]) ."', '0', '".$_SESSION['us_company']."', '".$_SESSION['us_first_name']."', '".$_SESSION['us_name']."', '".$_SESSION['us_address']."', '".$_SESSION['us_NPA']."', '".$_SESSION['us_city']."', '".$_SESSION['us_country']."', '".$_SESSION['us_email']."')";
			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
			$est_id = mysql_insert_id();
			$est_num = date("Ym") . sprintf("%03d",$est_id);
			$query = "Update ".$GLOBALS["db_prefix"]."_estimate SET est_num='". $est_num ."' WHERE est_id=". $est_id;
			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
				
			//get basket item info and insert data to table est_estimate_items
			$query = "SELECT bi.bi_item_FK, it.it_price, bi.bi_quantity FROM ".$GLOBALS["db_prefix"]."_basket_items bi, ".$GLOBALS["db_prefix"]."_items it WHERE  bi.bi_basket_FK='".$_COOKIE["eshopcart"]."' AND it.it_id = bi.bi_item_FK";
			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
			$table = $resultat->GetArray();
			
			$count = count($table);
			for($i = 0; $i < $count; ++$i)
			{
				$query = "INSERT INTO ".$GLOBALS["db_prefix"]."_estimate_items VALUES ('', ".$est_num.", ".$table[$i][0].", ".$table[$i][1].", ". $table[$i][2] .")";
				if(!$resultat = &$connexion->Execute($query))
					echo $connexion->ErrorMsg();
			}
			
			//delete basket after insertion in database
			$query_item_delete = "DELETE FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE bi_basket_FK='".$_COOKIE['eshopcart']."'";
			if(!$resultat = &$connexion->Execute($query_item_delete))
				echo $connexion->ErrorMsg();

			$template->assign('est_num', $est_num);
			$template->assign('validate', true);

			$message = "<p>Votre devis est pris en compte, un commercial va prendre contact avec vous!</p><br /><p>Vous pouvez imprimer votre devis à partir du menu. Cordialement.</p>";
			$template_include = "message";
			$template->assign("message", $message);
			$template->assign("template", $template_include);
			break;
			
		case "user_estimate":
			$query = "SELECT est.est_num, est.est_ttc_price, est.est_date  FROM ".$GLOBALS["db_prefix"]."_estimate est WHERE  est.est_status < 3 AND est. est_user_id_FK =". $_SESSION['id'] ." ORDER BY est.est_date DESC, est.est_num DESC";
			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
			$encours = $resultat->GetArray();
			$query = "SELECT est.est_num, est.est_ttc_price, est.est_date  FROM ".$GLOBALS["db_prefix"]."_estimate est WHERE  est.est_status = 3 AND est. est_user_id_FK=". $_SESSION['id'] ." ORDER BY est.est_date DESC, est.est_num DESC";
			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
			$traite = $resultat->GetArray();
			
			$template->assign("encours", $encours);
			$template->assign("traite", $traite);		
			$template->assign("template", "user_estimate");
			break;
			
		case "est_view":
			//company_info
			$template->assign('company_name', $company_name);
			$template->assign('company_address', $company_address);
			$template->assign('company_address2', $company_address2);
			$template->assign('company_npa', $company_npa);
			$template->assign('company_city', $company_city);
			$template->assign('company_telephone', $company_telephone);
			$template->assign('company_fax', $company_fax);
			$template->assign('company_mail', $company_mail);
			$template->assign('company_tva_intra_eu', $company_tva_intra_eu);
			$template->assign('est_num', $_REQUEST['est_num']);
			//user_estimate_info
			$query = "SELECT est.est_date, est.est_ttc_price, est.est_status, est.us_company, est.us_first_name, est.us_name, est.us_address, est.us_NPA, est.us_city, est.us_country, est.us_email FROM ".$GLOBALS["db_prefix"]."_estimate est WHERE est.est_num=".$_REQUEST['est_num']." AND est.est_user_id_FK=".$_SESSION['id']."";
			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
			$table = $resultat->GetArray();
			if(count($table)>1){ echo $connexion->ErrorMsg(); }
			$template->assign('us_company', $table[0]['us_company']);
			$template->assign('us_first_name', $table[0]['us_first_name']);
			$template->assign('us_name', $table[0]['us_name']);
			$template->assign('us_address', $table[0]['us_address']);
			$template->assign('us_NPA', $table[0]['us_NPA']);
			$template->assign('us_city', $table[0]['us_city']);
			$template->assign('us_country', $table[0]['us_country']);
			$template->assign('us_email', $table[0]['us_email']);
			$template->assign("est_date", $table[0]['est_date']);
			$template->assign("est_ttc_price", $table[0]['est_ttc_price']);
			$template->assign("est_status", $table[0]['est_status']);
			
			$query = "SELECT ei.it_id_FK, it.it_name, ei.it_price, ei.it_qte, ei.it_price * ei.it_qte FROM ".$GLOBALS["db_prefix"]."_estimate_items ei, ".$GLOBALS["db_prefix"]."_items it WHERE ei.est_id_FK=".$_REQUEST['est_num']." AND ei.it_id_FK=it.it_id";
			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
			$values = $resultat->GetArray();
			$nb_items = count($values);
			$template->assign("values", $values);
			$template->assign("nb_items", $nb_items);		
			$template->assign("template", "est_view");
			break;
			
		default :
			if(isset($_COOKIE["eshopcart"]) && $_COOKIE["eshopcart"]!==null)
			{
				//get items quantity in basket
				$query = "SELECT sum(bi_quantity) FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE  bi_basket_FK=".$_COOKIE["eshopcart"]."";
				if(!$resultat = &$connexion->Execute($query))
					echo $connexion->ErrorMsg();
						
				if($resultat->fields["sum(bi_quantity)"] == 0)
				{
					$message = "Aucun élément dans votre panier !";
					$template->assign("message", $message);
						
					$template_include = "message";
					$template->assign("template", $template_include);
				}
				else
				{
					//items in basket
					$query = "SELECT bi.bi_item_FK, it.it_name, it.it_price, bi.bi_quantity, it.it_price * bi.bi_quantity FROM ".$GLOBALS["db_prefix"]."_basket_items bi, ".$GLOBALS["db_prefix"]."_items it WHERE  bi.bi_basket_FK=".$_COOKIE["eshopcart"]." AND bi.bi_item_FK = it.it_id";
					if(!$resultat = &$connexion->Execute($query))
						echo $connexion->ErrorMsg();
					$tableau = $resultat->GetArray();
					//number of items in basket
					$query = "SELECT COUNT(bi_item_FK) FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE  bi_basket_FK=".$_COOKIE["eshopcart"]."";
					if(!$resultat = &$connexion->Execute($query))
						echo $connexion->ErrorMsg();
						
					$template->assign("numberOfItems", $resultat->fields["COUNT(bi_item_FK)"]);
					$template->assign("values",$tableau);
					
					//company_info
					$template->assign('company_name', $company_name);
					$template->assign('company_address', $company_address);
					$template->assign('company_address2', $company_address2);
					$template->assign('company_npa', $company_npa);
					$template->assign('company_city', $company_city);
					$template->assign('company_telephone', $company_telephone);
					$template->assign('company_fax', $company_fax);
					$template->assign('company_mail', $company_mail);
					$template->assign('company_tva_intra_eu', $company_tva_intra_eu);
					
					//customer_info
					$template->assign('us_company', $_SESSION['us_company']);
					$template->assign('us_first_name', $_SESSION['us_first_name']);
					$template->assign('us_name', $_SESSION['us_name']);
					$template->assign('us_address', $_SESSION['us_address']);
					$template->assign('us_NPA', $_SESSION['us_NPA']);
					$template->assign('us_city', $_SESSION['us_city']);
					$template->assign('us_country', $_SESSION['us_country']);
					$template->assign('us_email', $_SESSION['us_email']);
					$template->assign('template', 'estimate');
				}
			}
			else
			{
				$message = "Aucun élément dans votre panier !";
				$template_include = "message";
					
				$template->assign("message", $message);
				$template->assign("template", $template_include);
			}	
		break;
	}
}
/*
 *   INSERTION DU MENU
 */
 
include './modules/mod_main/menu.php';

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
	
$template->display('./templates/core.tpl');

// close the connexion to the DB
$connexion->Close();

?>