<?php

/**
* step1.inc.php
* @ File description :  first step of the installation process
*						display few informations about the installation process
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: step1.inc.php,v 1.2 2004/07/10 20:32:06 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));
	
if(isset($_REQUEST["action"]))
	header("Location:index.php?module=mod_install&step=2");	

$template->assign('nbr_step_tot', $nbr_step_tot);
// En-tête de l'étape
$step_header .= "Bienvenue";

?>