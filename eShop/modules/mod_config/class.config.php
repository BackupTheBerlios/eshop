<?php

/**
* class.config.php
* @ File description :  class to allow user to modifiy & save the configuration
*						the class load/edit/check value 
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: class.config.php,v 1.6 2004/08/24 01:16:56 setcode Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

class Config
{
	var $name = null;
	var $values = null;
	var $autorizedSpecialChar = null;
	var $canBeEmpty = null;
	
	function Config() 
	{
		$this->name = array(
			'db_type'		=>'Type de base de données',
			'db_host'		=>'Hôte',
			'db_login'		=>'Nom d\'utilisateur',
			'db_pass'		=>'Mot de passe',
			'db_name'		=>'Nom de la base de données',
			'db_prefix'		=>'Préfixe des tables',
			'site_url'		=>'Adresse du site',
			'title'			=>'Titre',
			'keywords'		=>'Mots-clés',
			'description'		=>'Description',
			'company_name'		=>'Nom',
			'company_address'	=>'Adresse',
			'company_address2'	=>'Adresse2',
			'company_npa'	=>'Code Postal',
			'company_city'	=>'Ville',
			'company_mail'		=>'Adresse e-mail',
			'company_telephone'	=>'N° de téléphone',
			'company_FAX'	=>'N° de FAX',
			'company_contact'	=>'Nom du reponsable',
			'company_copyright'	=>'Informations de copyright',
			'company_tva_intra_eu'	=>'TVA Intre Communautaire',
			'editorial'			=>'Editorial',
			'editorial_title'	=>'Titre de l\'éditorial',
			'editorial_text'	=>'Contenu de l\'éditorial',
			'benchmark_activation'			=>'Affichage temps d\'exécution du script',
			'currency'			=>'Symbole monétaire',
			'taxe'				=>'TTC ou HT'
		);
		
		$this->autorizedSpecialChar = array (
			'db_type'		=>'false',
			'db_host'		=>'false',
			'db_login'		=>'false',
			'db_pass'		=>'true',
			'db_name'		=>'false',
			'db_prefix'		=>'false',
			'site_url'		=>'true',
			'title'			=>'false',
			'keywords'		=>'true',
			'description'		=>'true',
			'company_name'		=>'false',
			'company_address'	=>'true',
			'company_address2'	=>'true',
			'company_mail'		=>'false',
			'company_telephone'	=>'true',
			'company_contact'	=>'false',
			'company_copyright'	=>'true',
			'company_tva_intra_eu'	=>'true',
			'editorial'			=>'true',
			'editorial_title'	=>'true',
			'editorial_text'	=>'true',
			'benchmark_activation'			=>'true',
			'currency'		=> 'false',
			'taxe'		=> 'true'
			);
			
		$this->canBeEmpty = array (
			'db_type'		=>'false',
			'db_host'		=>'false',
			'db_login'		=>'false',
			'db_pass'		=>'true',
			'db_name'		=>'false',
			'db_prefix'		=>'false',
			'site_url'		=>'true',
			'title'			=>'true',
			'keywords'		=>'true',
			'description'		=>'true',
			'company_name'		=>'true',
			'company_address'	=>'true',
			'company_address2'	=>'true',
			'company_mail'		=>'true',
			'company_telephone'	=>'true',
			'company_contact'	=>'true',
			'company_copyright'	=>'true',
			'company_tva_intra_eu'	=>'true',
			'editorial'			=>'true',
			'editorial_title'	=>'true',
			'editorial_text'	=>'true',
			'benchmark_activation'			=>'true',
			'currency'		=> 'false',
			'taxe'	=>'true'
			);
		
		// 'valeur' => 'nom de la variable sans $ et sans ESPACE'	
		$this->values = array(
			'db_type'		=>'',
			'db_host'		=>'',
			'db_login'		=>'',
			'db_pass'		=>'',
			'db_name'		=>'',
			'db_prefix'		=>'',
			'site_url'		=>'',
			'title'			=>'',
			'keywords'		=>'',
			'description'		=>'',
			'company_name'		=>'',
			'company_address'	=>'',
			'company_address2'	=>'',
			'company_mail'		=>'',
			'company_telephone'	=>'',
			'company_contact'	=>'',
			'company_copyright'	=>'',
			'company_tva_intra_eu'	=>'',
			'editorial'			=>'',
			'editorial_title'	=>'',
			'editorial_text'	=>'',
			'benchmark_activation'			=>'',
			'currency'		=> '',
			'taxe'	=>'',
		);
	}

	function getVarText() 
	{
		$txt = '';
		
		foreach ($this->values as $key=>$value) 
		{
			$txt .= "\$$key = '".addslashes($value)."';\n";
		}
		
		return $txt;
	}
	
	function bindGlobals() {
		foreach ($this->values as $key=>$value) 
		{
			if(isset($GLOBALS[$key]))
				$this->values[$key] = $GLOBALS[$key];
		}
	}
	
	function fillvalue($variable, $value)
	{
		$this->values[$variable] = $value;
	}
	
	function checkvar($value, $champs)
	{
		$error = false;
		
  		$value         = trim( strtolower( $value ) );
		$wrong	       = "&é~#'{([|è`\\ç^à°)]+=}¨£%µ?/§^\$ù*,;:!<> ";
		
  		$NbWrong      = strlen( $wrong );
 
	  	$i=0;
	  	while ( $i != $NbWrong )
	  	{
		    $car     = substr( $wrong, $i, 1 );
		    $vwr     = strpos( $value, $car, 0 );
		    if( $vwr != '' or $vwr != '0' )
		    {
				$err     = substr( $value, $vwr, 1);
				$error = true;
	    	}
	    $i++;
	  	}
	  	if($error)
	  		return $champs;
	  	else
	  		return $error;
	}
}

?>