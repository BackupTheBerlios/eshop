<?

/**
* mod_auth.php
* @ File description :  login & logout users
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_auth.php,v 1.6 2004/08/16 20:36:45 setcode Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

if(!isset($_REQUEST["action"]))
	$_REQUEST["action"]=null;

if(!isset($_REQUEST["user_login"]))
	$_REQUEST["user_login"] = null;

switch($_REQUEST["action"])
{
	case 'login':
	// temp variable to test if there's an error
	$error = false;
	
	if($_REQUEST["user_login"]=="" || $_REQUEST["user_pwd"]=="")
	{
		$error = true;
		$error_message = "Vous devez remplir tous les champs du formulaire !";
	}
	else
	{
	
		/**
		 * - checking the user 
		 * - registering the session 
		 * - redirecting the user to the main page
		 */
		
		// loading the data from the Db

		$query = "SELECT * FROM ".$db_prefix."_users WHERE us_login='".$_REQUEST["user_login"]."' AND us_password='".md5($_REQUEST["user_pwd"])."' AND us_activated='1'";
			
		$resultat = &$connexion->Execute($query);
		
		if (!$resultat) 
			print $connexion->ErrorMsg();
		
		if($resultat->RecordCount()!=1)
		{
			$error = true;
			$error_message = "Erreur : login ou mot de passe invalide (ou compte non activé) !";
		}
		else
		{
			$error = false;
			
			// saving the session
			$session->register("login", $resultat->fields["us_login"]);
			$session->register("level", $resultat->fields["us_level"]);
			$session->register("id", $resultat->fields["us_id"]);
			
			// updating lastlog and lastip :)
				
			$query = "UPDATE ".$db_prefix."_users SET us_last_ip='".$_SERVER['REMOTE_ADDR']."', us_last_log='".time()."' WHERE us_id=".$resultat->fields["us_id"];
				
			$resultat = &$connexion->Execute($query);
								
			if (!$resultat) 
				print $connexion->ErrorMsg();
			if($_REQUEST["module"] == "mod_auth") //don't return on login page
			{
				header("Location: index.php");
			}
			else
			{
				// redirecting visitor
				header("Location:".$_SERVER["HTTP_REFERER"]);
			}
		} 
	}
	
	if($error)
	{
		/* printing the login form with the error message */
		
		// displaying the login form
		$template->assign('template', 'login');
		
		$template->assign('is_not_logged', $is_not_logged);
		$template->assign('login_error', true);
		$template->assign('error', $error_message);
        }
		break;

	case 'logout':
		// shoot all the var in the session
		$session->unregister_all();
		
		// redirect the visitor
		header("Location:".$_SERVER["HTTP_REFERER"]);
		break;


	default:
		/* printing the login form */
	
		// displaying the login form
		$template->assign('template', 'login');
		
		$template->assign('is_not_logged', $is_not_logged);
		$template->assign('login_error', false);
		break;
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