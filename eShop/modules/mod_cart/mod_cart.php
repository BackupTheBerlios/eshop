<?

/**
* mod_cart.php
* @ File description :  management of the shopping cart
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_cart.php,v 1.3 2004/07/29 13:15:59 kilgore Exp $
**/

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

// var declarations
$template_include = null;

if(!isset($_REQUEST["action"]))
	$_REQUEST["action"]=null;

switch($_REQUEST["action"])
{
	case 'remove':
		$query_item_delete = "DELETE FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE bi_basket_FK='".$_COOKIE['eshopcart']."' AND bi_item_FK='".$_REQUEST["item"]."';";
		
		if(!$resultat = &$connexion->Execute($query_item_delete))
			echo $connexion->ErrorMsg();
			
		header("Location:index.php?module=mod_cart");
		exit();	
		break;
	
	case 'pullone':
		$query_item_update = "UPDATE ".$GLOBALS["db_prefix"]."_basket_items SET bi_quantity = bi_quantity-1 WHERE bi_basket_FK='".$_COOKIE['eshopcart']."' AND bi_item_FK='".$_REQUEST["item"]."';";
				
		if(!$resultat = &$connexion->Execute($query_item_update))
			echo $connexion->ErrorMsg();
			
		header("Location:index.php?module=mod_cart");
		exit();		
		break;
	
	case 'addone':
		$query_item_update = "UPDATE ".$GLOBALS["db_prefix"]."_basket_items SET bi_quantity = bi_quantity+1 WHERE bi_basket_FK='".$_COOKIE['eshopcart']."' AND bi_item_FK='".$_REQUEST["item"]."';";
				
		if(!$resultat = &$connexion->Execute($query_item_update))
			echo $connexion->ErrorMsg();
			
		header("Location:index.php?module=mod_cart");
		exit();	
		break;
	
	case 'add':
		// test if the cookie exist
		if(isset($_COOKIE["eshopcart"]) && $_COOKIE["eshopcart"]!==null)
		{
			// if the item is already in DB => increment the quantity  
			$query_item_selection = "SELECT * FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE bi_basket_FK='".$_COOKIE["eshopcart"]."' AND bi_item_FK='".$_REQUEST["item"]."';";
			
			if(!$resultat = &$connexion->Execute($query_item_selection))
				echo $connexion->ErrorMsg();
				
			if($resultat-> RowCount() > 0)
			{
				// update the quantity	
				$query_item_update = "UPDATE ".$GLOBALS["db_prefix"]."_basket_items SET bi_quantity = bi_quantity+1 WHERE bi_basket_FK='".$_COOKIE['eshopcart']."' AND bi_item_FK='".$_REQUEST["item"]."';";
				
				if(!$resultat = &$connexion->Execute($query_item_update))
					echo $connexion->ErrorMsg();
			}
			else // add the item in the DB
			{
				// else, add the item in the cart (DB)
				$query_item_add = "INSERT INTO ".$GLOBALS["db_prefix"]."_basket_items (bi_basket_FK, bi_item_FK) VALUES ('".$_COOKIE['eshopcart']."', '".$_REQUEST["item"]."');";
				
				if(!$resultat = &$connexion->Execute($query_item_add))
					echo $connexion->ErrorMsg();
			}
		}
		else	// the cookie doesn't exist
		{
			// create a new cart ID for the user
			$query_cart_creation = "INSERT INTO ".$GLOBALS["db_prefix"]."_basket (ba_session) VALUES ('".$session->getId()."');";
			
			if(!$resultat = &$connexion->Execute($query_cart_creation))
				echo $connexion->ErrorMsg();
			
			// create the cookie
			setcookie('eshopcart', $connexion->Insert_ID(), (time() + 3600*24*7));
			
			// else, add the item in the cart (DB)
			$query_item_add = "INSERT INTO ".$GLOBALS["db_prefix"]."_basket_items (bi_basket_FK, bi_item_FK) VALUES ('".$connexion->Insert_ID()."', '".$_REQUEST["item"]."');";
			
			if(!$resultat = &$connexion->Execute($query_item_add))
				echo $connexion->ErrorMsg();
		}	

		header("Location:index.php?module=mod_main&cat=".$_REQUEST["cat"]."&art_id=".$_REQUEST["item"]."");
		exit();

		break;
		
	default:
		if(isset($_COOKIE["eshopcart"]) && $_COOKIE["eshopcart"]!==null)
		{
			$query = "SELECT sum(bi_quantity) FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE  bi_basket_FK=".$_COOKIE["eshopcart"]."";

			if(!$resultat = &$connexion->Execute($query))
				echo $connexion->ErrorMsg();
				
			if($resultat->fields["sum(bi_quantity)"] == 0)
			{
				$message = "Aucun élément dans votre panier !";
				$template->assign("message", $message);
				
				$template_include = "message";	
			}
			else
			{
				$query = "SELECT bi_quantity, bi_item_FK, it_name, it_description, it_quantity FROM ".$GLOBALS["db_prefix"]."_basket_items, ".$GLOBALS["db_prefix"]."_items WHERE  bi_basket_FK=".$_COOKIE["eshopcart"]." AND bi_item_FK = it_id";

				if(!$resultat = &$connexion->Execute($query))
					echo $connexion->ErrorMsg();
				
				$tableau = $resultat->GetArray();
				
				$query = "SELECT COUNT(bi_item_FK) FROM ".$GLOBALS["db_prefix"]."_basket_items WHERE  bi_basket_FK=".$_COOKIE["eshopcart"]."";

				if(!$resultat = &$connexion->Execute($query))
					echo $connexion->ErrorMsg();

				$template->assign("numberOfItems", $resultat->fields["COUNT(bi_item_FK)"]);
				$template->assign("values",$tableau);

				$template_include = "cart";
			}
		}
		else
		{
			$message = "Aucun élément dans votre panier !";
			$template_include = "message";
			
			$template->assign("message", $message);
		}
		break;	
}
/*
 *   INSERTION DU MENU
 */
 
include './modules/mod_main/menu.php';

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
	
$template->assign('template', $template_include);
	
$template->display('./templates/core.tpl');

// close the connexion to the DB
$connexion->Close();

?>