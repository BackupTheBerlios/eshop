<?

/**
* mod_items.php
* @ File description :  management of the items
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_items.php,v 1.3 2004/08/11 12:53:47 setcode Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

$template->assign('is_not_logged', $is_not_logged);
$template->assign('db_type', $GLOBALS["db_type"]);

$error_access = false;

if(!isset($_SESSION["level"]))
	$_SESSION["level"]=0;

// check if the user got the authorisation
if($_SESSION["level"]<5)
{
	$message = "Vous n'avez pas les droits nécessaires pour accéder à cette page !";
	$error = true;
	
	$template_include = "message";
	
	include("./modules/mod_main/menu.php");
	
	$template->assign('message', $message);
	$template->assign('error', $error);
	
	$error_access = true;

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
		
	$template_include = null;
		
	switch($_REQUEST["action"])
	{		
		case 'new':
			$query2 = "SELECT ca_name, ca_id FROM ".$db_prefix."_cat";
			$resultat2 = &$connexion->Execute($query2);
			$select = $resultat2->GetMenu2("it_cat_FK", $resultat->fields["it_cat_FK"],false);
			
			$template->assign('it_cat_FK', $select);
			$template->assign('currency', $GLOBALS["currency"]);
		
			$template_include = "itemadd";
			break;
		
		case 'delete':
			$query = "DELETE FROM ".$db_prefix."_items WHERE it_id='".$_REQUEST["id"]."'";
				
			$resultat = &$connexion->Execute($query);
					
			if (!$resultat) 
				print $connexion->ErrorMsg();
				
			$query = "DELETE FROM ".$db_prefix."_basket_items WHERE bi_item_FK='".$_REQUEST["id"]."'";

			$resultat = &$connexion->Execute($query);
					
			if (!$resultat) 
				print $connexion->ErrorMsg();
		
			header("Location: index.php?module=mod_items");
			break;
		
		case 'modif':
			$query = "SELECT * FROM ".$db_prefix."_items WHERE it_id=".$_REQUEST["id"];
			$resultat = &$connexion->Execute($query);			
			
			// reassign all the values to the template
				
			$query1 = "SHOW FIELDS FROM ".$db_prefix."_items";
					
			$resultat1 = &$connexion->Execute($query1);
					
			if (!$resultat1) 
				print $connexion->ErrorMsg();
						
			// assign the value to the template
			while(!$resultat1->EOF)
			{
				$field = $resultat1->fields['Field'];
				
				$template->assign($field, $resultat->fields[$field]);			
					
				$resultat1->MoveNext();
			}	
			
			
			$query2 = "SELECT ca_name, ca_id FROM ".$db_prefix."_cat";
			$resultat2 = &$connexion->Execute($query2);
			$select = $resultat2->GetMenu2("it_cat_FK", $resultat->fields["it_cat_FK"],false);
			
			$template->assign('it_cat_FK', $select);
			$template->assign('currency', $GLOBALS["currency"]);
			
			$template_include = "itemedit";
			break;
		
		case 'save':
			// check that all required fields are filled		
			if(!isset($_REQUEST["it_price"]) || $_REQUEST["it_price"]=="" || !isset($_REQUEST["it_name"]) && $_REQUEST["it_name"]=="" || !isset($_REQUEST["it_description"]) && $_REQUEST["it_description"]=="")
			{	
				$error = true;
				$message = "Les champs prix, nom et description ne peuvent pas être laissés vide !";
				
				$template->assign('error', $error);
				$template->assign('message', $message);
				
				if(isset($_REQUEST["id"]))
					$template_include = "itemedit";
				else
					$template_include = "itemadd";
				
				// reassign all the values to the template
				
				$query1 = "SHOW FIELDS FROM ".$db_prefix."_items";
						
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
		
				$query2 = "SELECT ca_name, ca_id FROM ".$db_prefix."_cat";
				$resultat2 = &$connexion->Execute($query2);
				$select = $resultat2->GetMenu2("it_cat_FK", $_REQUEST["it_cat_FK"],true);
			
				$template->assign('it_cat_FK', $select);
				$template->assign('currency', $GLOBALS["currency"]);
			}
			else // if everything is OK, save and go back to the user page	
			{
				if(!isset($_REQUEST["it_activated"]) || $_REQUEST["it_activated"] != 1)
					$_REQUEST["it_activated"] = 0;
					
				if(!isset($_REQUEST["it_frontpage"]) || $_REQUEST["it_frontpage"] != 1)
					$_REQUEST["it_frontpage"] = 0;
				
				if(isset($_REQUEST["id"]))
					$query = "UPDATE ".$db_prefix."_items SET it_name='".$_REQUEST["it_name"]."', it_description='".$_REQUEST["it_description"]."', it_price='".$_REQUEST["it_price"]."', it_quantity='".$_REQUEST["it_quantity"]."', it_cat_FK='".$_REQUEST["it_cat_FK"]."', it_activated='".$_REQUEST["it_activated"]."', it_frontpage='".$_REQUEST["it_frontpage"]."' WHERE it_id='".$_REQUEST["id"]."'";
				else
					$query = "INSERT INTO ".$db_prefix."_items (it_name, it_description, it_price, it_quantity, it_cat_FK, it_activated, it_frontpage) VALUES (".$connexion->qstr($_REQUEST["it_name"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["it_description"],get_magic_quotes_gpc()).", ".$_REQUEST["it_price"].", ".$_REQUEST["it_quantity"].", ".$_REQUEST["it_cat_FK"].", ".$_REQUEST["it_activated"].", ".$_REQUEST["it_frontpage"].")";

				$resultat = &$connexion->Execute($query);
			
				if (!$resultat)
				{
					print $connexion->ErrorMsg();
				}					
				header("Location: index.php?module=mod_items");
				exit();
			}
			
			$template_name = "itemedit";
			break;
		
		// display the cat choose of the items
		default:
			$liste = null;
		
			if(isset($_REQUEST["action"]) AND $_REQUEST["action"] == "recherche")
			{
				$query = "SELECT ca_id FROM ".$db_prefix."_cat WHERE ca_name LIKE '".$_REQUEST["ca_name"]."%'";

				$resultat = &$connexion->Execute($query);
				
				if(!$resultat)
					$error = $connexion->ErrorMsg();
				else
				{
					$query = "SELECT it_id, it_name, it_cat_FK, ca_name FROM ".$db_prefix."_items,".$db_prefix."_cat WHERE it_id LIKE '".$_REQUEST["it_id"]."%' AND it_name LIKE '".$_REQUEST["it_name"]."%' AND ";
					
					if($resultat->RecordCount() != 0)
					{
						$query .= "(";
						
						while(!$resultat->EOF)
						{
							$query .= " it_cat_FK ='".$resultat->fields["ca_id"]."' OR";
							
							$resultat->MoveNext();	
						}
						
						$query = substr($query, 0, strlen($query)-3);
						
						$query .= ") ";
					}
						
					$query .= " AND it_cat_FK = ca_id ORDER BY ca_id, it_id";	
				}
			}
			else
				$query = "SELECT it_id, it_name, it_cat_FK, it_activated, ca_name FROM ".$db_prefix."_items,".$db_prefix."_cat WHERE it_cat_FK = ca_id ORDER BY ca_id, it_id";

			$resultat = &$connexion->Execute($query);
						
			if(!$resultat) 
			{
				$error = $connexion->ErrorMsg();
			}
			else
			{
				$template->assign('numberOfItems', $resultat->RecordCount());
				$template->assign('items', $resultat->GetArray());	
			}
			
			$template_include = "itemlist";
			break;
	}

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
		
$template->assign('template', $template_include);	

if($error_access)
	$template->display('./templates/core.tpl');
else
	$template->display('./templates/admin.tpl');					
}
?>