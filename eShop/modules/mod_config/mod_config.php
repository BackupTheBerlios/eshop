<?

/**
* mod_config.php
* @ File description :  allow user to edit the configuration of the eshop
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
		
	switch($_REQUEST["action"])
	{	
		// get the var from the form and put them in the array
		// then save everything in the file
		case 'saveconfig':
			$message = null;
			$error = false;
			
			include ("./modules/mod_config/class.config.php");
			
			$config = new Config();
			
			// load the value in the array
			$config->bindGlobals();

			// modify the values that have been modified in the form
			foreach ($config->values as $key=>$value)
			{	
				if(!isset($_REQUEST[$key]))
					$_REQUEST[$key] = "";
				
				// the field is empty
				if($config->canBeEmpty[$key] == "false" && empty($_REQUEST[$key]))
 				{
					$error = true;
					$message .= "Le champs : ".$config->name[$key]." ne peut pas être laissé vide !<br />";	
				}
				
				// the edito is activated and other fields are empty
				if(isset($_REQUEST["editorial"]) && $_REQUEST["editorial"]=="on")
				{
					if(empty($_REQUEST["editorial_text"]) && $key == "editorial_text")
					{
						$error = true;
						$message .= "Erreur dans le champs : ".$config->name[$key].". Ce champs ne peut pas contenir de caractères spéciaux.<br />";
					}
					
					if(empty($_REQUEST["editorial_title"]) && $key == "editorial_title")
					{
						$error = true;
						$message .= "Erreur dans le champs : ".$config->name[$key].". Ce champs ne peut pas contenir de caractères spéciaux.<br />";
					}
				}
			
				if(!$error)
				{
					if($_REQUEST[$key]!=$GLOBALS[$key])
					{
						if($config->autorizedSpecialChar[$key] == "false")
						{
							// test is the variable contains no illegal char
							if(!$config->checkvar($_REQUEST[$key], $key))
							{
								$config->fillvalue($key, $_REQUEST[$key]);
							}
							else
							{
								$error = true;
								$message .= "Erreur dans le champs : ".$config->name[$key].". Ce champs ne peut pas contenir de caractères spéciaux.<br />";
							}
						}
						else
						{
							$config->fillvalue($key, $_REQUEST[$key]);
						}
					}
				}
			}
			
			if(!$error)
			{
				$configfile = "<?php\n";
				$configfile .= "// configuration file \n";
				$configfile .= $config->getVarText();
				$configfile .= "?>";
				
				$error = false;
				
				if ($fp = fopen("./includes/config.inc.php", "w")) 
				{
					fputs($fp, $configfile, strlen($configfile));
					fclose ($fp);
				
					$message = "Mise à jour de la configuration réussie !";
				}else{
					$error = true;
					$message = "Erreur lors de la mise à jour de la configuration !";
				}
			}
			
			$template->assign('template', 'configuration');
		
			$template->assign('message', $message);
			$template->assign('error', $error);
			$template->assign('save', true);
			
			
			foreach ($config->values as $key=>$value)
			{
				if(isset($_REQUEST[$key]))
					$template->assign($key, $_REQUEST[$key]);	
				else
					$template->assign($key, "");
			}
			break;		
		
		// simply display the configuration form with the value loaded from the 
		// config.inc.php file
		default:
			$message = null;
			$error = false;	
	
			include ("./modules/mod_config/class.config.php");
			
			$config = new Config();
			
			// load the value in the array
			$config->bindGlobals();

			$template->assign('template', 'configuration');
			$template->assign('save', false);
		
			foreach ($config->values as $key=>$value)
			{		
				if(isset($GLOBALS[$key]))
					$template->assign($key, $GLOBALS[$key]);	
				else
					$template->assign($key, "");
			}
			break;
	}

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
			
$template->display('./templates/admin.tpl');						
}
?>