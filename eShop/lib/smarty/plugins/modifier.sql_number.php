<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty sql_number modifier plugin
 *
 * Type:     modifier<br>
 * Name:     sql_number<br>
 * Purpose:  format number to put in sql database
 * @link http://smarty.php.net/manual/en/language.modifier.sql.number.php
 *          sql_number (Smarty online manual) not implemented
 * @param float
 * @return string
 */

function smarty_modifier_sql_number($number)
{
    $number = preg_replace("/\s/", "", $number);
	if(preg_match("/([\d+\.]{1,})(\d{3})(,)(\d+)/", $number))
    	{
			$number = preg_replace("/\./", "", $number);
			$number = preg_replace("/(\d{1,})(,)(\d+)/", "\$1.\$3", $number);
			//echo "It's matched 1<br />";
			return $number;
    	}
    	elseif(preg_match("/([\d+,]{1,})(\d{3})(\.)(\d+)/", $number))
    	{
			$number = preg_replace("/,/", "", $number);
			$number = preg_replace("/(\d{1,})(\.)(\d+)/", "\$1\$2\$3", $number);
			//echo "It's matched 2<br />";
			return $number;
    	}
    	elseif(preg_match("/(\d+)(,|\.)(\d+)/", $number))
    	{
			$number = preg_replace("/(\d+)(,|\.)(\d+)/", "\$1.\$3", $number);
			//echo "It's matched 3<br />";
			return $number;
    	}
    	else
    	{
    		return false;
    	}
}

?>
