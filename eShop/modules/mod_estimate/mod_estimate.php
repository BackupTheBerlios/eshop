<?php

/**
* mod_estimate.php
* @ File description :  estimate management (not yet implemented !)
* @ Authors : 2004 T. Prêtre, R. Emourgeon & Christian KAKESA
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_estimate.php,v 1.7 2004/08/19 02:07:48 setcode Exp $
**/

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
			$query = "INSERT INTO ".$GLOBALS["db_prefix"]."_estimate VALUES ('', '', ".$_SESSION["id"].", NOW(), ". LibSql::Number($_POST["ttc"]) .", 0, '".$_SESSION['us_company']."', '".$_SESSION['us_first_name']."', '".$_SESSION['us_name']."', '".$_SESSION['us_address']."', '".$_SESSION['us_NPA']."', '".$_SESSION['us_city']."', '".$_SESSION['us_country']."', '".$_SESSION['us_email']."')";
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
					$query = "SELECT us.us_login, us.us_company, us.us_name, us.us_first_name, us.us_address, us.us_NPA, us.us_city, co.co_name, us.us_email FROM ".$GLOBALS["db_prefix"]."_users us, ".$GLOBALS["db_prefix"]."_countries co WHERE  us.us_login='".$_SESSION["login"]."' AND co.co_id=us.us_country";
					if(!$resultat = &$connexion->Execute($query))
						echo $connexion->ErrorMsg();
					$user_info = $resultat->GetArray();

					$template->assign('user_info', $user_info);
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