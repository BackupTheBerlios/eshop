<?php

/**
* step5.inc.php
* @ File description :  step 5 of the installation process
*						end of the installation
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: step5.inc.php,v 1.2 2004/07/10 20:32:06 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

$step = $_REQUEST["step"];
$error_msg = "";
if(isset($_REQUEST["action"]))
{
	require_once("./includes/set_env_inst.php");
	$filename = './modules/mod_install/install.sql';
	
	if($file2=fopen($filename,"r"))
	{
		$file=fread($file2, filesize($filename));
		$file= str_replace("prefix", $db_prefix, $file);
		$query=explode(";#%%\n",$file);
		for ($i=0;$i < count($query)-1;$i++) 
		{
			$resultat = &$connexion->Execute($query[$i]);
			//mysql_db_query($this->dbname, $query[$i], $this->conn) or die(mysql_error());
		}	
		
		$error_msg .= $connexion->ErrorMsg();
		
		header("Location:index.php");
	}
	else
	{
		$error_msg .= "Erreur d'ouverture de fichier install.sql<br />Recommencez l'installation du e-shop...";
	}
}

$template->assign('error_msg', $error_msg);

?>