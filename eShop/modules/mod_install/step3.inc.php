<?php

/**
* step3.inc.php
* @ File description :  third step of the installation process
*						ask the user about site configuration
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: step3.inc.php,v 1.2 2004/07/10 20:32:06 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

$step = $_REQUEST["step"];
$error_msg = "";

//Récup données du fichier

require_once("./includes/config.inc.php");

require_once("./includes/set_env_inst.php");

// Vérification des données de la base
if(isset($_REQUEST["action"]))
{
	// Récupération des données
	$site_url = $_REQUEST["site_url"];
	$site_title = $_REQUEST["site_title"];
	$site_des = $_REQUEST["site_des"];
	$site_keywords = $_REQUEST["site_keywords"];
	
	//Controle si les champs sont bien remplis
	if($site_url == "")$error_msg .= 'Remplir l\'URL du site';
	elseif($site_title == "")$error_msg .= 'Remplir le titre du site';
	elseif($site_des == "")$error_msg .= 'Remplir la description du site';
	elseif($site_keywords == "")$error_msg .= 'Remplir les mots clés';
	else	
	{
		$title = $site_title;
		$keywords = $site_keywords;
		$description = $site_des;
		$site_url = $site_url;	
		
		//Insertion dans le fichier de config
		include './modules/mod_config/class.config.php';
		$row = new Config();
				
		$row->fillvalue('db_type', $db_type);
		$row->fillvalue('db_host', $db_host);
		$row->fillvalue('db_login', $db_login);
		$row->fillvalue('db_pass', $db_pass);
		$row->fillvalue('db_name', $db_name);
		$row->fillvalue('db_prefix', $db_prefix);
		$row->fillvalue('site_url', $site_url);
		$row->fillvalue('title', $site_title);
		$row->fillvalue('keywords', $keywords);
		$row->fillvalue('description', $description);
		
		
		$config = "<?php\n";
		$config .= "// configuration file \n";
		$config .= $row->getVarText();
		$config .= "?>";
		if ($fp = fopen("./includes/config.inc.php", "w")) 
		{
			fputs($fp, $config, strlen($config));
 			fclose ($fp);
		}
		
		header("Location:index.php?module=mod_install&step=4");	
	}

}
else
{
	// Récupération des données
	$site_url = "";
	$site_title = "";
	$site_des = "";
	$site_keywords = "";
}

$step_header .= 'Configuration du site</label>';

$template->assign('site_url', $site_url);
$template->assign('site_title', $site_title);
$template->assign('site_des', $site_des);
$template->assign('site_keywords', $site_keywords);

$template->assign('error_msg', $error_msg);

?>