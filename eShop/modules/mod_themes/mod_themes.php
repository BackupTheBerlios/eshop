<?

/**
* mod_themes.php
* @ File description :  theme switcher
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_themes.php,v 1.1 2004/07/29 13:18:46 kilgore Exp $
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
$template_include = null;

if(!isset($_REQUEST["action"]))
	$_REQUEST["action"]=null;

switch($_REQUEST["action"])
{
	case 'change':
		setcookie ('eshopstyle', $_POST["eshopstyle"], (time()+31536000));

		header("Location:".$_SERVER["HTTP_REFERER"]);
		
		exit();
		
		break;
		
	default:
		$message = "Pas assez de paramètres !";
		$template_include = "message";
			
		$template->assign("message", $message);
		break;	
}
/*
 *   INSERTION DU MENU
 */
 
include './modules/mod_main/menu.php';

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
	
$template->assign('template', $template_include);
	
$template->display('./templates/core.tpl');

// close the connexion to the DB
$connexion->Close();

?>