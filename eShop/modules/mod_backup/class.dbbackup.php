<?

/**
* class.dbbackup.php
* @ File description :  class to create dump
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

class DbBackup
{
	var $conn = null;
	var $dbname = null;
	var $path = null;
	
	function DbBackup()
	{
		//include ("./includes/config.inc.php");
		$this->conn = @mysql_connect($GLOBALS["db_host"],$GLOBALS["db_login"],$GLOBALS["db_pass"]);
		$this->dbname = $GLOBALS["db_name"];
		
		if ($this->conn==false)  die("password / user or database name wrong");

	}
	
	function Savedb()
	{		
		// init the var
		$copyr = null;
		$dbname = null;
		$newfile = null;
		
		$tables = mysql_list_tables($this->dbname,$this->conn);
		$num_tables = @mysql_num_rows($tables);
		$i = 0;
		while($i < $num_tables) 
		{ 
		      $table = mysql_tablename($tables, $i);
		      $table = ltrim($table);
		      $newfile .= $this->get_def($dbname,$table);
		      $newfile .= "\n\n";
		      $newfile .= $this->get_content($dbname,$table);
		      $newfile .= "\n\n";
		      $i++;
		}	
		
		echo $newfile;
	}
	
	function Restoredb($filename){
		flush();
		set_time_limit(1000);
		$file=fread(fopen($filename, "r"), filesize($filename));
		$query=explode(";#%%\n",$file);
		for ($i=0;$i < count($query)-1;$i++) 
		{
			mysql_db_query($this->dbname, $query[$i], $this->conn) or die(mysql_error());
		}	
	}
			
	function get_def($dbname, $table) {
	    $def = "";
	    $def .= "DROP TABLE IF EXISTS $table;#%%\n";
	    $def .= "CREATE TABLE $table (\n";   
	    $result = mysql_db_query($this->dbname, "SHOW FIELDS FROM $table",$this->conn) or die("Table $table not existing in database");
	    while($row = mysql_fetch_array($result)) {
	        $def .= "    $row[Field] $row[Type]";
	        if ($row["Default"] != "") $def .= " DEFAULT '$row[Default]'";
	        if ($row["Null"] != "YES") $def .= " NOT NULL";
	       	if ($row["Extra"] != "") $def .= " $row[Extra]";
	        	$def .= ",\n";
	     }
	     $def = ereg_replace(",\n$","", $def);
	     $result = mysql_db_query($this->dbname, "SHOW KEYS FROM $table",$this->conn);
	     while($row = mysql_fetch_array($result)) {
	          $kname=$row["Key_name"];
	          if(($kname != "PRIMARY") && ($row[Non_unique] == 0)) $kname="UNIQUE|$kname";
	          if(!isset($index[$kname])) $index[$kname] = array();
	          $index[$kname][] = $row["Column_name"];
	     }
	     while(list($x, $columns) = @each($index)) {
	          $def .= ",\n";
	          if($x == "PRIMARY") $def .= "   PRIMARY KEY (" . implode($columns, ", ") . ")";
	          else if (substr($x,0,6) == "UNIQUE") $def .= "   UNIQUE ".substr($x,7)." (" . implode($columns, ", ") . ")";
	          else $def .= "   KEY $x (" . implode($columns, ", ") . ")";
	     }
	
	     $def .= "\n);#%%";
	     return (stripslashes($def));
	}
	
	function get_content($dbname, $table) {
	     $content="";
	     $result = mysql_db_query($this->dbname, "SELECT * FROM $table",$this->conn);
	     while($row = mysql_fetch_row($result)) {
	         $insert = "INSERT INTO $table VALUES (";
	         for($j=0; $j<mysql_num_fields($result);$j++) {
	            if(!isset($row[$j])) $insert .= "NULL,";
	            else if($row[$j] != "") $insert .= "'".addslashes($row[$j])."',";
	            else $insert .= "'',";
	         }
	         $insert = ereg_replace(",$","",$insert);
	         $insert .= ");#%%\n";
	         $content .= $insert;
	     }
	     return $content;
	}
}
?>