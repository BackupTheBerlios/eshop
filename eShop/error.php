<?

/**
* error.php
* @ File description : error handling
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: erreur.html"));

require_once("./includes/set_env.php");

// delete the user who have no validated their account
$currentTime = time();

$query = "DELETE FROM ".$db_prefix."_users WHERE (us_register_date+86400 < $currentTime) AND (us_activated = 0);"; //   

$resultat = &$connexion->Execute($query);

if (!$resultat) 
	$resultat .= $connexion->ErrorMsg();

// to include the good template

$template->assign('is_not_logged', $is_not_logged);

if($session->is_registered("level"))
	$template->assign('level', $_SESSION["level"]);

if($session->is_registered("login"))
	$template->assign('user', $_SESSION["login"]);

if($session->is_registered("id"))	
	$template->assign('id', $_SESSION["id"]);
		
/*
 *   INSERTION DU MENU
 */
 
include './modules/mod_main/menu.php';

// close the connexion to the DB
$connexion->Close();

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));

$template->assign('template','message');
$template->assign('error', true);
$template->assign('message', "Module inexistant !");

$template->display('./templates/core.tpl');

?>