<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty number_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     number_format<br>
 * Purpose:  format number via number_format
 * @link http://smarty.php.net/manual/en/language.modifier.number.format.php
 *          number_format (Smarty online manual) not implemented
 * @param float
 * @param int
 * @param string
 * @param string
 * @return string
 */

function smarty_modifier_number_format($number, $decimal=2, $string_dec_point=",", $string_thousands_sep=" ")
{
    return number_format($number, $decimal, $string_dec_point, $string_thousands_sep);
}

?>
