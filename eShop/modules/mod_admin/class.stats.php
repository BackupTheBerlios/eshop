<?php

/**
* class.stats.php
* @ File description :  class to display stats in the admin
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: class.stats.php,v 1.3 2004/07/11 07:19:43 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

class Stats
{
	// adding a new comment to test the CVS mail functionnality !
	
	var $number_articles=null;
	var $number_categories=null;
	var $number_user_ok=null;
	var $number_user_validation=null;
	var $five_most_sold_articles=null;
	var $five_fewer_stock_articles=null;
	
	// Constructor
	// Load the informations from the DB
	
	function Stats() 
	{					
		// prepare the array
		
		$this->five_most_sold_articles_name = array(
			'1'			=>'',
			'2'			=>'',
			'3'			=>'',
			'4'			=>'',
			'5'			=>''
			);
			
		$this->five_most_sold_articles = array(
			'1'			=>'',
			'2'			=>'',
			'3'			=>'',
			'4'			=>'',
			'5'			=>''		
			);
			
		$this->five_fewer_stock_articles_name = array(
			'1'			=>'',
			'2'			=>'',
			'3'			=>'',
			'4'			=>'',
			'5'			=>''
			);
			
		$this->five_fewer_stock_articles = array(
			'1'			=>'',
			'2'			=>'',
			'3'			=>'',
			'4'			=>'',
			'5'			=>''
			);
		
		// got the values
		
		$query = "SELECT it_id FROM ".$GLOBALS["db_prefix"]."_items";
		
		$resultat = &$GLOBALS["connexion"]->Execute($query);
				
		if (!$resultat) 
			print $GLOBALS["connexion"]->ErrorMsg();
			
		$this->number_articles = $resultat->RecordCount();
		
		$query = "SELECT ca_id FROM ".$GLOBALS["db_prefix"]."_cat";
		
		$resultat = &$GLOBALS["connexion"]->Execute($query);
		
		if (!$resultat) 
			print $GLOBALS["connexion"]->ErrorMsg();
			
		$this->number_categories = $resultat->RecordCount();
		
		$query = "SELECT us_id FROM ".$GLOBALS["db_prefix"]."_users WHERE us_activated='1'";
		
		$resultat = &$GLOBALS["connexion"]->Execute($query);
		
		if (!$resultat) 
			print $GLOBALS["connexion"]->ErrorMsg();
			
		$this->number_user_ok = $resultat->RecordCount();
		
		$query = "SELECT us_id FROM ".$GLOBALS["db_prefix"]."_users WHERE us_activated='0'";
		
		$resultat = &$GLOBALS["connexion"]->Execute($query);
		
		if (!$resultat) 
			print $GLOBALS["connexion"]->ErrorMsg();
			
		$this->number_user_validation = $resultat->RecordCount();
		
		$query = "SELECT it_name, it_number_sold FROM ".$GLOBALS["db_prefix"]."_items ORDER BY  it_number_sold DESC LIMIT 5";

		$resultat = &$GLOBALS["connexion"]->Execute($query);
		
		if (!$resultat) 
			print $GLOBALS["connexion"]->ErrorMsg();
			
		for($i = 0; $i<5; $i++)
		{
			$this->five_most_sold_articles_name[$i] = $resultat->fields["it_name"];
			$this->five_most_sold_articles[$i] = $resultat->fields["it_number_sold"];
			$resultat->MoveNext();
		}
				
		$query = "SELECT it_name, it_quantity FROM ".$GLOBALS["db_prefix"]."_items ORDER BY it_quantity ASC LIMIT 5";
		
		$resultat = &$GLOBALS["connexion"]->Execute($query);
		
		if (!$resultat) 
			print $GLOBALS["connexion"]->ErrorMsg();
			
		for($i = 0; $i<5; $i++)
		{
			$this->five_fewer_stock_articles_name[$i] = $resultat->fields["it_name"];
			$this->five_fewer_stock_articles[$i] = $resultat->fields["it_quantity"];
			$resultat->MoveNext();
		}
	}
}

?>