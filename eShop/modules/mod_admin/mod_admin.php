<?

/**
* mod_admin.php
* @ File description :  main page of the administration area of the eshop
*						display few stats
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_admin.php,v 1.2 2004/07/10 20:32:07 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

$template->assign('is_not_logged', $is_not_logged);
$template->assign('db_type', $GLOBALS["db_type"]);

if(!isset($_SESSION["level"]))
	$_SESSION["level"]=0;

// check if the user got the authorisation
if($_SESSION["level"]<5)
{
	$message = "Vous n'avez pas les droits nécessaires pour accéder à cette page !";
	$error = true;
	
	include("./modules/mod_main/menu.php");
	
	$template->assign('template', 'message');
	
	$template->assign('message', $message);
	$template->assign('error', $error);
	
	// assign the benchmark
	if($benchmark_activation == "on")
		$template->assign('benchmark', $benchmark->ReturnTimer(3));
	$template->display('./templates/core.tpl');	
}
else
{
	if($session->is_registered("level"))
		$template->assign('level', $_SESSION["level"]);
	
	if($session->is_registered("login"))
		$template->assign('user', $_SESSION["login"]);
	
	if($session->is_registered("id"))	
		$template->assign('id', $_SESSION["id"]);
	
	if(!isset($_REQUEST["action"]))
		$_REQUEST["action"] = null;
	
	include ("./modules/mod_admin/class.stats.php");
			
	// generating the stats
	$stats = new Stats();
	
	// sending all the var to the template
	$template->assign('items', $stats->number_articles);
	$template->assign('cat', $stats->number_categories);
	$template->assign('user_validated', $stats->number_user_ok);
	$template->assign('user_not_validated', $stats->number_user_validation);
	
	for($i=0; $i<5; $i++)
	{	
		$template->assign('sold_item_name'.$i, $stats->five_most_sold_articles_name[$i]);
		$template->assign('sold_item_value'.$i, $stats->five_most_sold_articles[$i]);
		$template->assign('stock_item_name'.$i, $stats->five_fewer_stock_articles_name[$i]);
		$template->assign('stock_item_value'.$i, $stats->five_fewer_stock_articles[$i]);
	}
	
	$template->assign('template', "accueil");
	
	// assign the benchmark
	if($benchmark_activation == "on")
		$template->assign('benchmark', $benchmark->ReturnTimer(3));
	$template->display('./templates/admin.tpl');
}


// close the connexion to the DB
$connexion->Close();