<?

/**
* set_env.php
* @ File description :  set all the environement (smarty, session and AdoDb)
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: set_env.php,v 1.3 2004/07/29 13:15:56 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../erreur.html"));

/* do all the includes for the libs */

// include for benchmark library
if($benchmark_activation == "on")
	include("./lib/benchmark/timer.lib.php" );

// start the benchmark as soon as possible
if($benchmark_activation == "on")
	$benchmark = new Timer();

// include for the smarty library
include("./includes/config.smarty.inc.php" );

// include for the ksession library
include("./lib/session/session.php");

// include for the adodb library
include("./lib/adodb/adodb.inc.php");

/* init the template */
$template = new Smarty_eshop;
		
/* do the global assignement */		
$template->assign('title', $title);
$template->assign('keywords', $keywords);
$template->assign('description', $description);

/* creating the database connexion */
$connexion = &ADONewConnection($db_type);
$connexion->Connect($db_host, $db_login, $db_pass, $db_name);

/* default visitor is not login */
$is_not_logged = true;

/* init session */
$session = &new SESSION;

// creating a new session if needed
if(SESSION_STATUT == "NONE")
{
       $session->create();
}
else
{	
	// test if the user is registered
	if($session->is_registered("login"))
	{
		$is_not_logged = false;
	}
}

// assign the number of items in the cart

$currentTime = time();

if(isset($_COOKIE["eshopcart"]) && $_COOKIE["eshopcart"]!==null)
{
	$query = "SELECT sum(bi_quantity) FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE  bi_basket_FK=".$_COOKIE["eshopcart"]."";

	if(!$resultat = &$connexion->Execute($query))
		echo $connexion->ErrorMsg();

	if($resultat->fields["sum(bi_quantity)"] > 0)
		$template->assign('articles', $resultat->fields["sum(bi_quantity)"]);
	else
		$template->assign('articles', 0);
		
	// update the current cart use time
	$query = "UPDATE ".$GLOBALS["db_prefix"]."_basket SET ba_last_use='$currentTime' WHERE  ba_id=".$_COOKIE["eshopcart"]."";
	
	if(!$resultat = &$connexion->Execute($query))
		echo $connexion->ErrorMsg();
}
else
	$template->assign('articles', 0);
	
// delete cart and content of the carts who haven't use for 15 days
$time15days = 3600 * 24 * 15;

$query = "DELETE FROM ".$db_prefix."_basket, ".$db_prefix."_basket_items USING ".$db_prefix."_basket, ".$db_prefix."_basket_items WHERE (ba_last_use+$time15days < $currentTime) AND ba_id = bi_basket_FK; ";    
	
if(!$resultat = &$connexion->Execute($query))
	echo $connexion->ErrorMsg();

$template->assign('benchmark_activation', $benchmark_activation);

// assign the value of the style cookie
if(isset($_COOKIE["eshopstyle"]) && $_COOKIE["eshopstyle"]!==null)
{
	$template->assign('css', $_COOKIE["eshopstyle"]);
}
else
{
	$template->assign('css', "red");
}

?>