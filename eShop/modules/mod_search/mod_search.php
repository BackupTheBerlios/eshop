<?

/**
* mod_search.php
* @ File description :  search module
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

$nbr_art_per_page = 10;

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

// in all cases we assign this value

$template->assign('is_not_logged', $is_not_logged);

if($session->is_registered("level"))
	$template->assign('level', $_SESSION["level"]);

if($session->is_registered("login"))
	$template->assign('user', $_SESSION["login"]);

if($session->is_registered("id"))	
	$template->assign('id', $_SESSION["id"]);
	
$template_include = "resultsearch"; 

$template->assign('template', $template_include);
$error = "";
if(isset($_REQUEST["search"]))
{
	if($_REQUEST["search"] != "")
	{
		if(isset($_REQUEST["num_page"]))
			$num_page = $_REQUEST["num_page"];
		else
			$num_page = 1;
			
		$template->assign('string',$_REQUEST["search"] );
		// Lister les articles
		$liste = "";
		$art_titre = "";
		$query_cat_search = "SELECT ca_id FROM ".$db_prefix."_cat WHERE ca_name LIKE '%".$_REQUEST["search"]."%'";
		$recordSet_cat_search = &$connexion->Execute($query_cat_search);
		if($recordSet_cat_search->RecordCount() > 0)
			$query_artOfCat = "SELECT it_id, it_name, it_price,  it_quantity, it_cat_FK  FROM ".$db_prefix."_items WHERE (it_name LIKE '%".$_REQUEST["search"]."%' OR it_description LIKE '%".$_REQUEST["search"]."%' OR it_cat_FK=".$recordSet_cat_search->fields["ca_id"].") AND it_activated=1 ORDER BY it_name";
		else
			$query_artOfCat = "SELECT it_id, it_name, it_price,  it_quantity, it_cat_FK FROM ".$db_prefix."_items WHERE (it_name LIKE '%".$_REQUEST["search"]."%' OR it_description LIKE '%".$_REQUEST["search"]."%') AND it_activated=1 ORDER BY it_name";
			
		$recordSet_artOfCat = &$connexion->SelectLimit($query_artOfCat, $nbr_art_per_page, ($num_page-1)*$nbr_art_per_page);
	
		if (!$recordSet_artOfCat) 
			echo $connexion->ErrorMsg();
		else
		{
			$template->assign('numberOfItems', $recordSet_artOfCat->RecordCount());
			$template->assign('items', $recordSet_artOfCat->GetArray());
		}
	}
}


// add cat menu
 
include './modules/mod_main/menu.php';

// assign the benchmark
if($benchmark_activation == "on")
$template->assign('benchmark', $benchmark->ReturnTimer(3));
	
$template->display('./templates/core.tpl');

// close the connexion to the DB
$connexion->Close();

?>