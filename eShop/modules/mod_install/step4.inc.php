<?php

/**
* step4.inc.php
* @ File description :  step 4 of the installation process
*						ask the user about compagny informations
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
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
	$cpy_name = $_REQUEST["company_name"];
	$cpy_address = $_REQUEST["company_address"];
	$cpy_mail = $_REQUEST["company_mail"];
	$cpy_telephone = $_REQUEST["company_telephone"];
	$cpy_contact = $_REQUEST["company_contact"];
	$cpy_copyright = $_REQUEST["company_copyright"];
	
	//Controle si les champs sont bien remplis
	if($cpy_name == "")$error_msg .= 'Remplir le nom';
	elseif($cpy_address == "")$error_msg .= 'Remplir l\'adresse';
	elseif($cpy_mail == "")$error_msg .= 'Remplir l\'adresse e-mail';
	elseif($cpy_contact == "")$error_msg .= 'Remplir le contact';
	elseif($cpy_telephone == "")$error_msg .= 'Remplir le telephone';
	elseif($cpy_copyright == "")$error_msg .= 'Remplir le copyright';
	else	
	{
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
		$row->fillvalue('title', $title);
		$row->fillvalue('keywords', $keywords);
		$row->fillvalue('description', $description);
		$row->fillvalue('company_name', $cpy_name);
		$row->fillvalue('company_address', $cpy_address);
		$row->fillvalue('company_mail', $cpy_mail);
		$row->fillvalue('company_contact', $cpy_contact);
		$row->fillvalue('company_copyright', $cpy_copyright);
		$row->fillvalue('company_telephone', $cpy_telephone);
		$row->fillvalue('currency', 'CHF');
		
		$config = "<?php\n";
		$config .= "// configuration file \n";
		$config .= $row->getVarText();
		$config .= "?>";
		if ($fp = fopen("./includes/config.inc.php", "w")) 
		{
			fputs($fp, $config, strlen($config));
 			fclose ($fp);
		}
		
		header("Location:index.php?module=mod_install&step=5");	
	}

}
else
{
	// Récupération des données
	$cpy_name = "";
	$cpy_address = "";
	$cpy_mail = "";
	$cpy_telephone = "";
	$cpy_contact = "";
	$cpy_copyright = "";
}

$step_header .= 'Configuration du site</label>';

$template->assign('company_name', $cpy_name);
$template->assign('company_address', $cpy_address);
$template->assign('company_mail', $cpy_mail);
$template->assign('company_contact', $cpy_contact);
$template->assign('company_copyright', $cpy_copyright);
$template->assign('company_telephone', $cpy_telephone);

$template->assign('error_msg', $error_msg);

?>