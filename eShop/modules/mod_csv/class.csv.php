<?

/**
* class.csv.php
* @ File description :  class to export data in CSV file format
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: class.csv.php,v 1.3 2004/07/29 13:15:59 kilgore Exp $
**/

class csv
{
	public $conversions;
	public $verification;
	public $valeurs;
	public $numberOfSelect;
	
	function csv($type, $number)
	{
		$this->numberOfSelect = $number;
		
		if($type=="items")
		{			
			$this->conversions = array (
			'Vide | Non pris en charge'	=> '',
			'Nom' 						=> 'it_name',
			'Description' 				=> 'it_description',
			'Prix'						=> 'it_price',
			'Quantité' 					=> 'it_quantity',
			'Nombre vendus'				=> 'it_number_sold',
			'Catégorie'					=> 'it_cat_FK');
			
			$this->verification = array (
			'it_name'			=> '',
			'it_description' 	=> '',
			'it_price' 			=> '',
			'it_quantity'		=> '',
			'it_number_sold' 	=> '',
			'it_cat_FK'			=> '');
			
			$this->valeurs = array('Vide | Non pris en charge','Nom', 'Description', 'Prix', 'Quantité', 'Nombre vendus', 'Catégorie');
								
		}
		else
		{
			$this->conversions = array (
			'Vide | Non pris en charge'	=> '',
			'Login' 					=> 'us_login',
			'Nom' 						=> 'us_name',
			'Prénom' 					=> 'us_first_name',
			'Email'						=> 'us_email',
			'Société' 					=> 'us_company',
			'Adresse' 					=> 'us_address',
			'Code postal' 				=> 'us_NPA',
			'Ville' 					=> 'us_city',
			'Pays' 						=> 'us_country',
			'Newsletter' 				=> 'us_newsletter',
			'Date d\'enregistrement' 	=> 'us_register_date',
			'Niveau' 					=> 'us_level');
			
			$this->verification = array (
			'us_login'						=> '',
			'us_name' 						=> '',
			'us_first_name' 				=> '',
			'us_email' 						=> '',
			'us_company'					=> '',
			'us_address' 					=> '',
			'us_NPA' 						=> '',
			'us_city' 						=> '',
			'us_country' 					=> '',
			'us_newsletter' 				=> '',
			'us_register_date' 				=> '',
			'us_level' => '');
			
			$this->valeurs = array('Vide | Non pris en charge','Login', 'Nom', 'Prénom', 'Email', 'Société', 'Adresse', 'Code postal', 'Ville', 'Pays', 'Newsletter', 'Date d\'enregistrement', 'Niveau');
		}		
	}
	
					
	function selectCSV($numero)
	{	
		$select = "<select name=\"champs".$numero."\">\n";
		foreach ($this->valeurs as $value)
			$select .= "\t<option value=\"".$this->conversions[$value]."\">".$value."</option>\n";
		$select .= "</select>\n";
		
		return $select;
	}
	
	function selectArray()
	{
		$selectarray = array();
		
		for($i=0; $i< $this->numberOfSelect; $i++)
			$selectarray[$i] = $this->selectCSV($i);
			
		return $selectarray;	
	}
	
	function numberOfElements()
	{
		return $this->numberOfSelect;
	}
}
?>