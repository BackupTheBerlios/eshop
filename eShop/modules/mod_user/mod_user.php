<?

/**
* mod_user.php
* @ File description :  display/search/edit/delete user
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

$template->assign('is_not_logged', $is_not_logged);
$template->assign('db_type', $GLOBALS["db_type"]);

$message = "";
$error = "";
$user_list = "";
$color_ligne = true;

if(!isset($_REQUEST["action"]))
	$_REQUEST["action"]=null;

// check if the user got the authorisation
if(!isset($_SESSION["level"]))
	$_SESSION["level"] = 0;

$error_access = false;

if($_SESSION["level"]<5)
{
	$message = "Vous n'avez pas les droits nécessaires pour accéder à cette page !";
	$error = true;
	
	$template->assign('error', $error);
	$template->assign('message', $message);
	
	include("./modules/mod_main/menu.php");
	
	$template_name = "message";
	$error_access = true;
}
else
{	
	$template_name = "";
	
	if($session->is_registered("level"))
		$template->assign('level', $_SESSION["level"]);
	
	if($session->is_registered("login"))
		$template->assign('user', $_SESSION["login"]);
	
	if($session->is_registered("id"))	
		$template->assign('id', $_SESSION["id"]);
	
	if(!isset($_REQUEST["action"]))
		$_REQUEST["action"] = null;	
	
	switch($_REQUEST["action"])
	{
		case 'recherche':
			$us_id = $_REQUEST["us_id"];
			$us_login = $_REQUEST["us_login"];
			$us_name = $_REQUEST["us_name"];
			$query = "SELECT us_id, us_login, us_name FROM ".$db_prefix."_users WHERE (us_id LIKE '".$us_id."%') AND (us_login LIKE '".$us_login."%') AND (us_name LIKE '".$us_name."%') LIMIT 0,30";
			$resultat = &$connexion->Execute($query);			
			if(!$resultat) 
			{
				$error = $connexion->ErrorMsg();
			}
			else
			{
				while(!$resultat->EOF)
				{
					if($color_ligne)
					{
						$color = " class=tab_ligne"; 
						$color_ligne = false;
					}
					else
					{
						$color = "";
						$color_ligne=true;
					}
					$user_list .= "<tr $color>";
						$user_list .= "<td>".$resultat->fields["us_id"]."</td>";
						$user_list .= "<td>".$resultat->fields["us_login"]."</td>";
						$user_list .= "<td>".$resultat->fields["us_name"]."</td>";
						$user_list .= "<td align=\"center\">";
						    $user_list .= "<a href=\"index.php?module=mod_user&action=modifuser&id=".$resultat->fields["us_id"]."\" title=\"Modifier\"><img src=\"./images/button_edit.png\" border=0 /></a>";
						    $user_list .= " / ";
						    $user_list .= "<a href=\"index.php?module=mod_user&action=deleteuser&id=".$resultat->fields["us_id"]."\" onClick=\"if(confirm('Etes vous sûr de vouloir supprimer l\'utilisateur ".$resultat->fields["us_login"]." ?')){return true;}else{return false;}\" title=\"Supprimer\"><img src=\"./images/button_drop.png\" border=0 />";
					    $user_list .= "</td>";
				  	$user_list .= "</tr>";
				  	$resultat->MoveNext();
				}
				$template_name = "list_user";
				$template->assign('user_list', $user_list);
			}
			break;
		
		case 'modifuser':
			$query1 = "SHOW FIELDS FROM ".$db_prefix."_users";
					
			$resultat1 = &$connexion->Execute($query1);
				
			if (!$resultat) 
				print $connexion->ErrorMsg();
		
			$query2 = "SELECT * FROM ".$db_prefix."_users WHERE us_id=".$_REQUEST["id"];
			$resultat2 = &$connexion->Execute($query2);
			
			if (!$resultat) 
				print $connexion->ErrorMsg();
			
			// assign the value to the template
			while(!$resultat1->EOF)
			{
				$field = $resultat1->fields['Field'];
				if($field != "us_password")
					$template->assign($field, $resultat2->fields[$field]);
				
				$resultat1->MoveNext();
			}	
			
			// for the countries
	
			$query3 = "SELECT co_name, co_id FROM ".$db_prefix."_countries ORDER BY co_name";
	
			$resultat = &$connexion->Execute($query3);
		
			if (!$resultat) 
				print $connexion->ErrorMsg();
		
			$template->assign('us_country', $resultat->GetMenu2('us_country',$resultat2->fields["us_country"], false));
			
			// for the price category
	
			$query4 = "SELECT pc_name, pc_id FROM ".$db_prefix."_price_cat ORDER BY pc_name";
	
			$resultat = &$connexion->Execute($query4);
		
			if (!$resultat) 
				print $connexion->ErrorMsg();	
		
			$template->assign('us_price_cat', $resultat->GetMenu2('us_price_cat',$resultat2->fields["us_price_cat_FK"], false));
			
			// for the user level
			
			$query5 = "SELECT ul_name, ul_value FROM ".$db_prefix."_users_level ORDER BY ul_name";
			
			$resultat = &$connexion->Execute($query5);
		
			if (!$resultat) 
				print $connexion->ErrorMsg();	

			$template->assign('us_level', $resultat->GetMenu2('us_level',$resultat2->fields["us_level"], false));
			
			// select the good template
			$template_name = "useredit";
			break;	
	
		case 'deleteuser':
			if($_REQUEST["id"] != 1)
			{
				$query = "DELETE FROM ".$db_prefix."_users WHERE us_id='".$_REQUEST["id"]."'";
				
				$resultat = &$connexion->Execute($query);
					
				if (!$resultat) 
					print $connexion->ErrorMsg();
			}
			
			header("Location: index.php?module=mod_user");
			break;
		
		case 'saveedition':
			// check that all required fields are filled		
			if($_REQUEST["us_login"]=="" || $_REQUEST["us_email"]=="")
			{	
				$error = true;
				$message = "Les champs login et email ne peuvent pas être laissés vide !";
				
				$template->assign('error', $error);
				$template->assign('message', $message);
				
				// reassign all the values to the template
				
				$query1 = "SHOW FIELDS FROM ".$db_prefix."_users";
						
				$resultat1 = &$connexion->Execute($query1);
					
				if (!$resultat1) 
					print $connexion->ErrorMsg();
						
				// assign the value to the template
				while(!$resultat1->EOF)
				{
					$field = $resultat1->fields['Field'];
					if(isset($_REQUEST[$field]))
						$template->assign($field, $_REQUEST[$field]);			
					
					$resultat1->MoveNext();
				}	
				
				// for the countries
		
				$query3 = "SELECT co_name, co_id FROM ".$db_prefix."_countries ORDER BY co_name";
		
				$resultat = &$connexion->Execute($query3);
			
				if (!$resultat) 
					print $connexion->ErrorMsg();
			
				$template->assign('us_country', $resultat->GetMenu2('us_country',$_REQUEST["us_country"], false));
				
				// for the price category
		
				$query4 = "SELECT pc_name, pc_id FROM ".$db_prefix."_price_cat ORDER BY pc_name";
		
				$resultat = &$connexion->Execute($query4);
			
				if (!$resultat) 
					print $connexion->ErrorMsg();	
			
				if(isset($_REQUEST["us_price_cat_FK"]))
					$template->assign('us_price_cat', $resultat->GetMenu2('us_price_cat',$_REQUEST["us_price_cat_FK"], false));
				
				// for the user level
				
				$query5 = "SELECT ul_name, ul_value FROM ".$db_prefix."_users_level ORDER BY ul_name";
				
				$resultat = &$connexion->Execute($query5);
			
				if (!$resultat) 
					print $connexion->ErrorMsg();	
	
				$template->assign('us_level', $resultat->GetMenu2('us_level',$_REQUEST["us_level"], false));
			}
			else // if everything is OK, save and go back to the user page	
			{				
				if($_REQUEST["us_activated"] != 1)
					$_REQUEST["us_activated"] = 0;
				
				$query = "UPDATE ".$db_prefix."_users SET us_login='".$_REQUEST["us_login"]."', us_email='".$_REQUEST["us_email"]."', us_name='".$_REQUEST["us_name"]."', us_first_name='".$_REQUEST["us_first_name"]."', us_company='".$_REQUEST["us_company"]."', us_address='".$_REQUEST["us_address"]."', us_NPA='".$_REQUEST["us_NPA"]."', us_city='".$_REQUEST["us_city"]."', us_country='".$_REQUEST["us_country"]."', us_newsletter='".$_REQUEST["us_newsletter"]."', us_level='".$_REQUEST["us_level"]."', us_price_cat_FK='".$_REQUEST["us_price_cat"]."', us_activated='".$_REQUEST["us_activated"]."' WHERE us_id='".$_REQUEST["id"]."'";

				$resultat = &$connexion->Execute($query);
			
				if (!$resultat) 
					print $connexion->ErrorMsg();
									
				header("Location: index.php?module=mod_user");	
			}
			
			$template_name = "useredit";
			
			break;
	
		default:
			$query = "SELECT us_id, us_login, us_name FROM ".$db_prefix."_users";
			$resultat = &$connexion->Execute($query);			
			if(!$resultat) 
			{
				$error = $connexion->ErrorMsg();
			}
			else
			{
				$template->assign('numberOfUsers', $resultat->RecordCount());
				$template->assign('user', $resultat->GetArray());
				$template_name = "userlist";
			}
			break;	
	}	
}

$template->assign('template', $template_name);

if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
	
if($error_access)
	$template->display('./templates/core.tpl');
else
	$template->display('./templates/admin.tpl');	

?>