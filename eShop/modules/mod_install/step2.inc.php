<?php

/**
* step2.inc.php
* @ File description :  step 2 of the installation process
*						ask the user for the DB config
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: step2.inc.php,v 1.3 2004/08/11 12:53:45 setcode Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

$step = $_REQUEST["step"];
$error_msg = "";

// Vérification des données de la base
if(isset($_REQUEST["action"]))
{
	
	// Récupération des données
	$action = $_REQUEST["action"];
	$type = $_REQUEST["type"];
	$server = $_REQUEST["server"];
	$login = $_REQUEST["login"];
	$password = $_REQUEST["password"];
	$password2 = $_REQUEST["password2"];
	$name = $_REQUEST["name"];
	$prefix = $_REQUEST["prefix"];
	
	//Controle si les champs sont bien remplis
	if($type == "")$error_msg .= 'Remplir le type de la BdD';
	elseif($server == "")$error_msg .= 'Remplir le serveur de la BdD';
	elseif($login == "")$error_msg .= 'Remplir le nom d\'utilisateur de la BdD';
	elseif($password != $password2)$error_msg .= 'Mot de passe de correspond pas';
	elseif($name == "")$error_msg .= 'Remplir le nom de la table';
	elseif($prefix == "")$error_msg .= 'Remplir le prefix de vos tables';
	else	
	{		
			
			// Comme dans le fichier config
			
			$db_type = $type;
			$db_host = $server;
			$db_login = $login;
			$db_pass = $password;
			$db_name = $name;
			$db_prefix = $prefix;
			$title = "";
			$keywords = "";
			$description = "";
			
			require_once("./includes/set_env_inst.php");
			
			$query = "SELECT * FROM prefix_users";
			$resultat = &$connexion->Execute($query);
				
			if($resultat) 
			{
				$error_msg = $connexion->ErrorMsg();
			}
			if($error_msg == "")
			{
				include './modules/mod_config/class.config.php';
				
				$row = new Config();
				
				$row->fillvalue('db_type', $type);
				$row->fillvalue('db_host', $server);
				$row->fillvalue('db_login', $login);
				$row->fillvalue('db_pass', $password);
				$row->fillvalue('db_name', $name);
				$row->fillvalue('db_prefix', $prefix);
				
				
				$config = "<?php\n";

				$config .= "// configuration file \n";
				$config .= $row->getVarText();

				$config .= "?>";
				if ($fp = fopen("./includes/config.inc.php", "w")) 
				{
					fputs($fp, $config, strlen($config));

					fclose ($fp);
				}
				
				header("Location:index.php?module=mod_install&step=3");	
			}
			
			
	}
	
}	
else
{
	
			$action = "";
			$type = "";
			$server = "";
			$login = "";
			$password = "";
			$password2 = "";
			$name = "";
			$prefix = "";
	
}

$step_header .= 'Configuration de la base de données</label>';

include('./includes/config.inc.php');

$template->assign('action', $action);
$template->assign('type', $type);
$template->assign('server', $server);
$template->assign('login', $login);
$template->assign('password', $password);
$template->assign('password2', $password2);
$template->assign('name', $name);
$template->assign('prefix', $prefix);
$template->assign('error_msg', $error_msg);

?>