<?

/**
* mod_order.php
* @ File description :  order management (not yet implemented !)
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
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
	case 'confirm':
			if($is_not_logged)
			{
				$message = "Vous devez vous connecter ou vous enregistrer pour pouvoir continuer !";	
			}
			else
			{
				$message = "Gestion de la suite de la commande ...";	
			}
			
			$template->assign("message", $message);
			$template_include = "message";
		break;
	
	default:
			$message = "Pas assez de paramètres !";
			$error = true;
			
			$template->assign("message", $message);
			$template->assign("error", $error);
			
			$template_include = "message";
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