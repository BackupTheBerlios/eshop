<?php

/**
* menu.php
* @ File description :  create the menu (from cat) & assign it to the template
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: menu.php,v 1.4 2004/08/16 20:36:24 setcode Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

//assign active modules
$query = "SELECT * FROM ".$GLOBALS["db_prefix"]."_active_mod am WHERE am.am_status='1'";
if(!$resultat = &$connexion->Execute($query))
echo $connexion->ErrorMsg();
$active_mod = $resultat->GetArray();
$count = count($active_mod);
//print_r($active_mod);
//echo "<br >". $count;
if($count > 0)
{
	for($i = 0; $i < $count; ++$i)
	{
		$template->assign('mod_'.$active_mod[$i][am_name], true);
	}
}


$query = "SELECT ca_id, ca_name FROM ".$db_prefix."_cat WHERE ca_cat_FK=0";

$recordSet = &$connexion->Execute($query);

$menu = null;
$numberOfCat = null;

if (!$recordSet) 
	$menu = $connexion->ErrorMsg();
else
{
	$numberOfCat = $recordSet->RecordCount();
	$menu = $recordSet->GetArray();
}

include 'article.php';

$template->assign('numberOfCat', $numberOfCat);
$template->assign('cat', $menu);

?>