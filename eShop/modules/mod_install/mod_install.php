<?php

/**
* mod_install.php
* @ File description :  main file of the installation module
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_install.php,v 1.2 2004/07/10 20:32:06 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

// Send variable in local variable
$step = $_REQUEST["step"];
$nbr_step_tot = 5;

// include for the smarty library
include( "./includes/config.smarty.inc.php" );


/* init the template */
$template = new Smarty_eshop;

/* do the global assignement */		
$step_header =  "Installation du E-shop : ";
$step_container = "";
$step_footer = "Etape ".$step." sur ".$nbr_step_tot;
$body_option = "";

include 'step'.($step).'.inc.php';

// Boutons suivant et précédent

$step_container .= '<label class="defile">';
if($step > 1)
{
	$step_container .= '<a title="Précédent" href="javascript:window.history.back()"><-Précédent</a>';
}
$step_container .= ' | ';

if($step < $nbr_step_tot)
{
	$step_container .= '<a title="Suivant" href="JavaScript:document.server_info.submit()">Suivant-></a>';
}
if($step == $nbr_step_tot)
{
	$step_container .= '<a title="Suivant" href="JavaScript:document.server_info.submit()">TERMINER - ></a>';
}

$step_container .= '</label>';

$template->assign('title', "Installation de E-Shop");
$template->assign('body_option', $body_option);
$template->assign('step_header', $step_header);
$template->assign('step_footer', $step_footer);
$template->assign('step_container', $step_container);
$template->assign('step', $step);
$template->assign('sending', $_SERVER["PHP_SELF"]);

$template->display('./templates/install/install.tpl');


?>