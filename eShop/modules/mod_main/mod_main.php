<?

/**
* mod_main.php
* @ File description :  homepage of the eshop
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

// delete the user who have no validated their account
$currentTime = time();

$query = "DELETE FROM ".$db_prefix."_users WHERE (us_register_date+86400 < $currentTime) AND (us_activated = 0);"; //   

$resultat = &$connexion->Execute($query);

if (!$resultat) 
	$resultat .= $connexion->ErrorMsg();

// to include the good template
if(isset($_REQUEST["cat"]))
	$template->assign('template', 'items');
else
	$template->assign('template', 'main');

$template->assign('is_not_logged', $is_not_logged);

if($session->is_registered("level"))
	$template->assign('level', $_SESSION["level"]);

if($session->is_registered("login"))
	$template->assign('user', $_SESSION["login"]);

if($session->is_registered("id"))	
	$template->assign('id', $_SESSION["id"]);

if(isset($editorial))
	$template->assign('editorial', $editorial);

if(isset($editorial_text))
	$template->assign('editorial_text', $editorial_text);
	
if(isset($editorial_title))
	$template->assign('editorial_title', $editorial_title);

// display article choose to been display on frontpage
$query = "SELECT it_name, it_description, it_price, it_id, it_cat_FK FROM ".$GLOBALS["db_prefix"]."_items WHERE  it_frontpage='1' AND it_activated='1'";

if(!$resultat = &$connexion->Execute($query))
	echo $connexion->ErrorMsg();

$tableau = $resultat->GetArray();

if(!$resultat = &$connexion->Execute($query))
	echo $connexion->ErrorMsg();

$template->assign("numberOfItems", $resultat->RecordCount());
$template->assign("values",$tableau);
$template->assign("currency", $currency);

// display the menu 
include './modules/mod_main/menu.php';

// close the connexion to the DB
$connexion->Close();

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));

$template->display('./templates/core.tpl');

?>