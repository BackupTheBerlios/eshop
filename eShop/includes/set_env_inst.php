<?

/**
* set_env_inst.php
* @ File description :  set all the environement (smarty, session and AdoDb) for
*						the installation process
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../erreur.html"));

/* do all the includes for the libs */

// include of the configuration
include( "./includes/config.inc.php" );

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
$connexion->debug = false;
$connexion->Connect($db_host, $db_login, $db_pass, $db_name);

/* default visitor is not loged */
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

?>