<?php

/**
* mod_estimate.php
* @ File description :  estimate management (not yet implemented !)
* @ Authors : 2004 T. Prêtre, R. Emourgeon & Christian KAKESA
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_estimate.php,v 1.2 2004/08/13 08:26:57 setcode Exp $
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

// var declarations

if($is_not_logged)
{
	$message = "Vous devez vous connecter ou vous enregistrer pour pouvoir continuer !";
	$template->assign("message", $message);
	$template_include = "message";
	$template->assign("template", $template_include);
}
else
{
	if(isset($_COOKIE["eshopcart"]) && $_COOKIE["eshopcart"]!==null)
	{
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
			$query = "SELECT bi.bi_item_FK, it.it_name, it.it_price, bi.bi_quantity FROM ".$GLOBALS["db_prefix"]."_basket_items bi, ".$GLOBALS["db_prefix"]."_items it WHERE  bi.bi_basket_FK=".$_COOKIE["eshopcart"]." AND bi.bi_item_FK = it.it_id";

			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
				
			$tableau = $resultat->GetArray();
				
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
			//print_r($user_info);
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