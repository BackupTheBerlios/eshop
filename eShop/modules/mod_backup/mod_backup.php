<?

/**
* mod_backup.php
* @ File description :  allow user to save & restore the database
* @ Authors : 2004 T. Pr�tre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_backup.php,v 1.2 2004/07/10 20:32:06 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

$template->assign('is_not_logged', $is_not_logged);
$template->assign('db_type', $GLOBALS["db_type"]);

// check if the user got the authorisation
if($_SESSION["level"]<5)
{
	$message = "Vous n'avez pas les droits n�cessaires pour acc�der � cette page !";
	$error = true;
	
	$template->assign('template', message);
	
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
		
	switch($_REQUEST["action"])
	{	
		// get the var from the form and put them in the array
		// then save everything in the file
		case 'savedb':
			$message = null;
			$error = false;
			
			if(!isset($_REQUEST["param"]))
				$_REQUEST["param"]=null;
			
			switch($_REQUEST["param"])
			{
				case 'now':
					include ("./modules/mod_backup/class.dbbackup.php");
					include ("./modules/mod_backup/class.download.php");
	
					$download = new Download();
					$download->Now("backup.sql","");
					
					// creating the new DbBackup object
					$savedb = new DbBackup();
					$savedb->Savedb();
						
					// need to do an exit because of the file
					exit;
						
					break;
					
				default:
					$message = "Cliquez sur le bouton ci-dessous pour sauvegarder la base de donn�es :";
					$message .= "<br />";
					$message .= "<br />";
					$message .= "<form name=\"form1\" id=\"form1\" method=\"post\" action=\"./index.php?module=mod_backup&action=savedb&param=now\">";
					$message .= "<input class=\"submit\" type=\"submit\" value=\"T�l�charger le fichier\" />";
					$message .= "</form>";
					$message .= "<br />Le fichier r�sultant doit �tre mis en lieu s�r sur votre disque dur.";
					break;
			}
				
			$template->assign('template', 'message');
			$template->assign('message', $message);
			$template->assign('error', $error);		
			break;

		// restoredb
		// allow user to quickly restore the DB from a local dump (or distant dump)
		
		case 'restoredb':
			$message = null;
			$error = false;
		
			if(!isset($_REQUEST["param"]))
				$_REQUEST["param"]=null;
		
			switch($_REQUEST["param"])
			{
				case 'restore':
					include ("./modules/mod_backup/class.dbbackup.php");
					
					if($HTTP_POST_FILES["dump"]["name"]=="")
					{
						$error = true;
						$message = "Vous devez sp�cifier un fichier !<br /><br /><a href=\"./index.php?module=mod_backup&action=restoredb\">Retour</a>";
					}
					else
					{	
						if($HTTP_POST_FILES["dump"]["error"]!=0)
						{
							$error = true;
							$message = "Erreur lors de l'upload du fichier !";
						}else
						{
							if($HTTP_POST_FILES["dump"]["name"]!="backup.sql")
							{
								$error = true;
								$message = "Le fichier ne porte pas le nom backup.sql.<br /><br />Si vous avez modifi� le nom du fichier, merci de le renommer en \"backup.sql\".<br />Si ce fichier n'est pas issu du syst�me de sauvegarde du e-shop vous risquez d'endommager irr�m�diablement l'application.<br /><br /><a href=\"./index.php?module=mod_backup&action=restoredb\">Retour</a>";
							}
							else
							{
								$restoredb = new DbBackup();
											
								// call the function which restore the DB
								$restoredb->Restoredb($HTTP_POST_FILES["dump"]["tmp_name"]);
							
								$message = "La base de donn�es a �t� restaur�e avec succ�s !";
								$error = false;		
							}
						}
					}
					break;
					
				default:
					$error = false;
					$message = "Choisissez le fichier .sql � restaurer depuis votre disque dur :\n";
					$message .= "<br /><br />\n";
					$message .= "<form action=\"index.php?module=mod_backup&action=restoredb&param=restore\" method=\"post\" enctype=\"multipart/form-data\" name=\"restoredb\">\n";
					$message .= "<input type=\"file\" name=\"dump\" />";
					$message .= "<br /><br />\n";
					$message .= "<input class=\"submit\" type=\"submit\" name=\"Submit\" value=\"Restaurer\" />\n";
					$message .= "</form>\n";
					$message .= "Ce fichier doit avoir �t� export� depuis la zone d'administration !\n";
					break;	
			}	
			
			$template->assign('template', 'message');
			
			$template->assign('message', $message);
			$template->assign('error', $error);		
			break;	
			
		default:
			$template->assign('template', 'message');
			
			$template->assign('message', "Pas assez de param�tres !");
			$template->assign('error', 'true');	
			break;	
	}

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
$template->display('./templates/admin.tpl');	


}	
?>