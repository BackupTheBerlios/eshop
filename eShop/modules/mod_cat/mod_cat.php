<?php
/**
* mod_cat.php
* @ File description :  category management
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
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
	
	$liste = null;
		
	switch($_REQUEST["action"])
	{
		case "new" :
			$query2 = "SELECT ca_name, ca_id FROM ".$db_prefix."_cat";
			$resultat2 = &$connexion->Execute($query2);
			$select = $resultat2->GetMenu2("ca_cat_FK", $resultat->fields["it_cat_FK"],true);
			
			$template->assign('ca_cat_FK', $select);
		
			$template_name = "categoryadd";
			break;
		
		case "save" :
			if(!isset($_REQUEST["ca_name"]) || $_REQUEST["ca_name"]=="")
			{	
				$error = true;
				$message = "Le champs nom ne peut pas être laissé vide !";
				
				$template->assign('error', $error);
				$template->assign('message', $message);

				if(isset($_REQUEST["ca_description"]))
					$template->assign("ca_description", $_REQUEST["ca_description"]);
				
				if(isset($_REQUEST["ca_id"]))
					$template->assign("ca_id", $_REQUEST["id"]);
			
				if(isset($_REQUEST["id"]))
				{
					$template_name = "categoryedit";
					$query = "SELECT ca_name, ca_id FROM ".$db_prefix."_cat WHERE ca_id!=".$_REQUEST["id"];
				}
				else
				{
					$template_name = "categoryadd";
					$query = "SELECT ca_name, ca_id FROM ".$db_prefix."_cat";
				}

				$resultat = &$connexion->Execute($query);
				
				if (!$resultat) 
					print $connexion->ErrorMsg();
				
				if(!isset($_REQUEST["ca_cat_FK"]))
					$_REQUEST["ca_cat_FK"] = 0;
				
				$select = $resultat->GetMenu2("ca_cat_FK", $_REQUEST["ca_cat_FK"],true);
				
				$template->assign('ca_cat_FK',$select);
				
				$template_name = "categoryadd";
			}
			else
			{
				if ($_REQUEST["ca_cat_FK"] == "")
				{
					$ca_cat_FK = 0; 
					$niveau=0;
				}
				else
				{
					$ca_cat_FK = $_REQUEST["ca_cat_FK"];
					$query_FK = "SELECT ca_level FROM ".$db_prefix."_cat WHERE ca_id=".$_REQUEST["ca_cat_FK"];
					$resultat = &$connexion->Execute($query_FK);
					$niveau = $resultat->fields["ca_level"] + 1;
				}
				
				if(isset($_REQUEST["id"]))
				{
					$query = "UPDATE ".$db_prefix."_cat SET ca_level=".$niveau.", ca_name=".$connexion->qstr($_REQUEST["ca_name"],get_magic_quotes_gpc()).", ca_cat_FK=".$ca_cat_FK.", ca_description=".$connexion->qstr($_REQUEST["ca_description"],get_magic_quotes_gpc())." WHERE ca_id=".$_REQUEST["id"];
					
					// update all the subcategories level ?!?
				}
				else
					$query = "INSERT INTO ".$db_prefix."_cat (ca_name, ca_description, ca_level, ca_cat_FK) VALUES (".$connexion->qstr($_REQUEST["ca_name"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["ca_description"],get_magic_quotes_gpc()).", ".$niveau.", ".$_REQUEST["ca_cat_FK"].")";
				
				$resultat = $connexion->Execute($query);
				
				if (!$resultat) 
					print $connexion->ErrorMsg();
				
				header("Location:index.php?module=mod_cat");
				exit();
			}
			break;
			
		case "modifcat" :
			$query = "SELECT * FROM ".$db_prefix."_cat WHERE ca_id=".$_REQUEST["id"];
			$resultat = &$connexion->Execute($query);			
			
			$template->assign('ca_level',$resultat->fields["ca_level"]);
			$template->assign('ca_id',$resultat->fields["ca_id"]);
			$template->assign('ca_name',$resultat->fields["ca_name"]);
			$template->assign('ca_description',$resultat->fields["ca_description"]);
			
			$query2 = "SELECT ca_name, ca_id FROM ".$db_prefix."_cat WHERE ca_id!=".$resultat->fields["ca_id"];
			$resultat2 = &$connexion->Execute($query2);
			$select = $resultat2->GetMenu2("ca_cat_FK", $resultat->fields["ca_cat_FK"],true);
			
			$template->assign('ca_cat_FK',$select);
			$template_name = "categoryedit";
			$template->assign('us_id', $resultat->fields["ca_id"]);	
			break;
			
		case "deletecat":
			$message_error = "";
			$query_FK = "SELECT * FROM ".$db_prefix."_cat WHERE ca_cat_FK=".$_REQUEST["id"];
			$resultat_FK = &$connexion->Execute($query_FK); 
			if($resultat_FK->RecordCount()>0)
			{
				$message_error .= 'Impossible de supprimer une catégorie dont d\'autres sont dépendantes<br />Supprimer d\'abord les catégories dépendantes de cette catégorie.<br /><a href="'.$_SERVER["HTTP_REFERER"].'">retour</a>';
			}
			else
			{
				$query = "SELECT * FROM ".$db_prefix."_cat WHERE ca_id=".$_REQUEST["id"];
				$resultat = &$connexion->Execute($query);
				$message_error .= 'Catégorie '.$resultat->fields["ca_name"].' a été suprimée<br /><a href="'.$_SERVER["HTTP_REFERER"].'">retour</a>';
				$query_del = "DELETE FROM ".$db_prefix."_cat WHERE ca_id=".$_REQUEST["id"];
				$resultat_del = &$connexion->Execute($query_del);
				$query_upd_items = "UPDATE ".$db_prefix."_items SET it_activated=0 WHERE it_cat_FK=".$_REQUEST["id"];
				$resultat_upd = &$connexion->Execute($query_upd_items);
				
			}
			$template->assign('error',true);
			$template->assign('message',$message_error);
			$template_name = "message";
			break;
			
		default:
			if(isset($_REQUEST["action"]) AND $_REQUEST["action"] == "recherche")
				$query = "SELECT ca_id, ca_name, ca_level FROM ".$db_prefix."_cat WHERE ca_id LIKE '".$_REQUEST["ca_id"]."%' AND ca_name LIKE '".$_REQUEST["ca_name"]."%' AND ca_level LIKE '".$_REQUEST["ca_level"]."%' ORDER BY ca_level";
			else
				$query = "SELECT ca_id, ca_name, ca_level FROM ".$db_prefix."_cat ORDER BY ca_level";
				
			$resultat = &$connexion->Execute($query);
						
			if(!$resultat) 
			{
				$error = $connexion->ErrorMsg();
			}
			else
			{
				$template->assign('numberOfCat', $resultat->RecordCount());
				$template->assign('cat', $resultat->GetArray());	
			}
			
			$template_name = "categorylist";
			break;	
	}	
	
	$template->assign('template', $template_name);
	
	// assign the benchmark
	if($benchmark_activation == "on")
		$template->assign('benchmark', $benchmark->ReturnTimer(3));
		
	$template->display('./templates/admin.tpl');
}
?>