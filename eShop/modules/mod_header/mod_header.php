<?

/**
* mod_header.php
* @ File description :  allow user to change the header (jpg file)
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
	
	$template->assign('template', 'message');
	
	include("./modules/mod_main/menu.php");
	
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
		
	$ok = false;
	$error = false;
	$message = null;

	switch($_REQUEST["action"])
	{		
		case 'change':
				// check if one file is specified
				if($HTTP_POST_FILES["logo"]["name"]=="")
				{
					$error = true;
					$message = "Vous devez spécifier un fichier !";
				}
				else
				{
					// check the file format
					if(substr($HTTP_POST_FILES["logo"]["name"], strlen($HTTP_POST_FILES["logo"]["name"])-3, strlen($HTTP_POST_FILES["logo"]["name"])) != "jpg")
					{
						$error = true;
						$message = "Mauvais format de fichier !";
					}
					else
					{
						$file = "shop.jpg";

         				$destination = "images/".$file;
         			
         				// delete the file if it already exist in the rep
         			
         				if(file_exists($destination))
         					unlink($destination);
				
						// check the pic size					
						$picInfos = getimagesize($HTTP_POST_FILES["logo"]["tmp_name"]);
							
						if($picInfos[0] != 780 OR $picInfos[1] != 100)
						{
							$message = "Mauvaise taille d'image !";
							$error = true;								
						}

				
						// move the uploaded file to the destination rep
				
						if(!$error)
						{
							if(!move_uploaded_file($HTTP_POST_FILES["logo"]["tmp_name"], $destination))
							{								
								$message = "Erreur lors du déplacement";
								$error = true;
							}
							else
							{
								$ok = true;
							}
						}
					}
				}
			break;
		
		// display the upload form
		default:
			
			break;
	}

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
	
$template->assign('error', $error);
$template->assign('message', $message);
$template->assign('ok', $ok);
$template->assign('template', "header");	
$template->display('./templates/admin.tpl');						
}
?>