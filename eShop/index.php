<?php

/**
* index.php
* @ File description :  main file of the application
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

define( "_DIRECT_ACCESS", 1 );

// test to know if the application has already been installed
if (!isset($_REQUEST["step"]) && (file_exists( "./includes/config.inc.php" ))) 
{
	include_once("./includes/config.inc.php");
	
	if(isset($db_type) && isset($db_host) && isset($db_login) && isset($db_pass) && isset($db_name))
	{	
		// include for the adodb library

		include("./lib/adodb/adodb.inc.php");
		
		/* creating the database connexion */

		$connexion = &ADONewConnection($db_type);
		$connection->debug = false;
		if($connexion->Connect($db_host, $db_login, $db_pass, $db_name))
		{
			$query = "SELECT * FROM ".$db_prefix."_users WHERE us_login='admin'";
			if(!($resultat = $connexion->Execute($query)) || $resultat->RowCount() == 0)
			{
				header( "Location: index.php?module=mod_install&step=1" );
				exit();
			}	
		}
		else
		{
			header( "Location: index.php?module=mod_install&step=1" );
			exit();
		}
		
	}
	else
	{
		header( "Location: index.php?module=mod_install&step=1" );
		exit();
	}
}

if(isset($_REQUEST["module"]))
{
	/* switch to the file of the corresponding module */
	
	$rep = "./modules/";
	$dir = opendir($rep);
	
	/** 
	 * boolean variable to return if the module exist or not
	 */
	 
	$exist = false;
	
	while ($f = readdir($dir)) 
	{	
			if($_REQUEST["module"]==$f)
			{
					$exist = true;
					include('./modules/'.$_REQUEST["module"].'/'.$_REQUEST["module"].'.php');
			}
	} 
	
	if($exist == false)
	{
		include('./error.php');
	}
}
else
{
	include('./modules/mod_main/mod_main.php');
}

?>