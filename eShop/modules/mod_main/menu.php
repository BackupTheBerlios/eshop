<?php

/**
* menu.php
* @ File description :  create the menu (from cat) & assign it to the template
* @ Authors : 2004 T. Pr�tre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: menu.php,v 1.5 2004/08/17 13:36:59 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

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