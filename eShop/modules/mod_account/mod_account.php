<?

/**
* mod_account.php
* @ File description :  management of the account (user side)
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_account.php,v 1.3 2004/08/11 12:53:47 setcode Exp $
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
	case 'save':
		$error = false;
		$passwordModif = false;
	
		if(!isset($_REQUEST["us_email"]) || $_REQUEST["us_email"]=="")
		{	
			$error = true;
			$message = "L'adresse email ne peut pas être laissée vide !";
		}
		else
		{
			if(isset($_REQUEST["us_new_password1"]) && isset($_REQUEST["us_new_password2"]))
			{
				if($_REQUEST["us_new_password1"] != "" && $_REQUEST["us_new_password2"] != "")
				{
					if($_REQUEST["us_new_password1"] != $_REQUEST["us_new_password2"])	
					{
						$error = true;
						$message = "Les mots de passe doivent être identiques !";
					}
					else
					{
						$passwordModif = true;	
					}
				}
			}
		}
		
		if($error)	
		{
			$template->assign("error", $error);
			$template->assign("message", $message);
			
			$template_include = "account";
			
			// assign all the values to the template
			$query_fields = "SHOW FIELDS FROM ".$db_prefix."_users";
					
			$resultat_fields = &$connexion->Execute($query_fields);
				
			if (!$resultat_fields) 
				print $connexion->ErrorMsg();
			
			// assign the value to the template
			while(!$resultat_fields->EOF)
			{
				$field = $resultat_fields->fields['Field'];
				
				if(isset($_REQUEST[$field]))
					$template->assign($field, $_REQUEST[$field]);
				
				$resultat_fields->MoveNext();
			}	
	
			$query = "SELECT co_name, co_id FROM ".$db_prefix."_countries ORDER BY co_name";
	
			$resultat = &$connexion->Execute($query);
	
			if (!$resultat) 
				print $connexion->ErrorMsg();
		
			$template->assign('us_country', $resultat->GetMenu2('us_country', $_REQUEST["us_country"], false));		
		}
		else
		{		
			if(isset($_REQUEST["us_newsletter"]))
				$_REQUEST["us_newsletter"] = 1;
			else
				$_REQUEST["us_newsletter"] = 0;
			
			if($passwordModif)
				$query = "UPDATE ".$db_prefix."_users SET us_password='".md5($_REQUEST["us_new_password1"])."', us_email='".$_REQUEST["us_email"]."', us_name='".$_REQUEST["us_name"]."', us_first_name='".$_REQUEST["us_first_name"]."', us_company='".$_REQUEST["us_company"]."', us_address='".$_REQUEST["us_address"]."', us_NPA='".$_REQUEST["us_NPA"]."', us_city='".$_REQUEST["us_city"]."', us_country='".$_REQUEST["us_country"]."', us_newsletter='".$_REQUEST["us_newsletter"]."' WHERE us_id='".$_SESSION["id"]."'";
			else
				$query = "UPDATE ".$db_prefix."_users SET us_email='".$_REQUEST["us_email"]."', us_name='".$_REQUEST["us_name"]."', us_first_name='".$_REQUEST["us_first_name"]."', us_company='".$_REQUEST["us_company"]."', us_address='".$_REQUEST["us_address"]."', us_NPA='".$_REQUEST["us_NPA"]."', us_city='".$_REQUEST["us_city"]."', us_country='".$_REQUEST["us_country"]."', us_newsletter='".$_REQUEST["us_newsletter"]."' WHERE us_id='".$_SESSION["id"]."'";

			//echo $query;

			$resultat = &$connexion->Execute($query);
		
			if (!$resultat)
			{
				print $connexion->ErrorMsg();
			}
			header("Location:index.php?module=mod_account");
			exit();
		}
		break;
	
	default:
		if(!$session->is_registered("id"))
		{
			$error = true;
			$message = "Vous devez être connecté !";
			
			$template->assign("error", $error);
			$template->assign("message", $message);
			
			$template_include = "message";
		}
		else
		{
			// for the user informations
			
			$query_user = "SELECT * FROM ".$db_prefix."_users WHERE us_id ='".$_SESSION["id"]."'";

			$resultat_user = &$connexion->Execute($query_user);
				
			if (!$resultat_user) 
				print $connexion->ErrorMsg();	
	
			// for the countries
	
			$query = "SELECT co_name, co_id FROM ".$db_prefix."_countries ORDER BY co_name";
			
			$resultat = &$connexion->Execute($query);
				
			if (!$resultat) 
				print $connexion->ErrorMsg();
		
			$template->assign('us_country', $resultat->GetMenu2('us_country', $resultat_user->fields["us_country"], false));
			
			$query_fields = "SHOW FIELDS FROM ".$db_prefix."_users";
					
			$resultat_fields = &$connexion->Execute($query_fields);
				
			if (!$resultat_fields) 
				print $connexion->ErrorMsg();
			
			// assign the value to the template
			while(!$resultat_fields->EOF)
			{
				$field = $resultat_fields->fields['Field'];

				if($field != "us_country")
					$template->assign($field, $resultat_user->fields[$field]);
				
				$resultat_fields->MoveNext();
			}	
			
			$template_include = "account";
		}
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