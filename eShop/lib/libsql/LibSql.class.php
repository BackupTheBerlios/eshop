<?php
/**
 * Project:		LibSql : the php SQL library to convert php data to SQL Ansi data.
 * File: LibSql.class.php
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://libsql.kakesa.net/
 * @copyright Copyright &copy; 2004, Christian KAKESA.
 * @author Christian KAKESA <setcode@obios.fr>
 * @package libsql
 * @version 0.0.1b
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * $Id: LibSql.class.php,v 1.2 2004/08/20 05:20:16 setcode Exp $
 */

/**
 * This library provide to convert any php data to SQL Ansi data.
 * 
 * @package libsql
 * @access public
 * @static
 */
class LibSql
{
	
	/**
	 * Return the class name.
	 *
	 * @access public
	 * @static
	 *
	 * @return string
	 */
	function getClassName()
	{
		return "LibSql";
	}
	 
	/**
	 * Return the class version.
	 *
	 * @access public
	 * @static
	 *
	 * @return string
	 */
	function getVersion()
	{
		return "0.0.1b";
	}
	
	/**
	 * Convert number to SQL Ansi numerc data.
	 *
	 * <code>
	 * $number1 = "1 258 952,66";
	 * $number2 = "1 258 952.66";
	 * $number3 = "1.258.952,66";
	 * $number4 = "1,258,952.66";
	 * $number5 = "52,66";
	 * $number6 = "52.66";
	 * echo LibSql::Number($number1); 	//output : 1258952.66	| 1 258 952,66
	 * echo LibSql::Number($number2);	//output : 1258952.66	| 1 258 952.66
	 * echo LibSql::Number($number3);	//output : 1258952.66	| 1.258.952,66
	 * echo LibSql::Number($number4);	//output : 1258952.66	| 1,258,952.66
	 * echo LibSql::Number($number5);	//output : 52.66	| 52,66
	 * echo LibSql::Number($number6);	//output : 52.66	| 52.66
	 * </code>
	 *
	 * @access public
	 * @static
	 * @param string $number
	 * @return integer|float
	 */
	function Number($number)
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
}
?>