<?

/**
* class.download.php
* @ File description :  class to force the download of a file
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: class.download.php,v 1.3 2004/07/29 13:15:55 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

class Download
{
	public $browser = null;

	function Download()
	{
		if ((ereg("Nav", getenv("HTTP_USER_AGENT"))) || (ereg("Gold", getenv("HTTP_USER_AGENT"))) ||
		(ereg("X11", getenv("HTTP_USER_AGENT"))) || (ereg("Mozilla", getenv("HTTP_USER_AGENT"))) ||
		(ereg("Netscape", getenv("HTTP_USER_AGENT")))
		AND (!ereg("MSIE", getenv("HTTP_USER_AGENT"))) AND (!ereg("Konqueror", getenv("HTTP_USER_AGENT"))))
			$this->browser = "Netscape";
		
		elseif (ereg("Opera", getenv("HTTP_USER_AGENT")))
			$this->browser = "Opera";
		
		elseif (ereg("MSIE", getenv("HTTP_USER_AGENT")))
			$this->browser = "MSIE";
		
		elseif (ereg("Lynx", getenv("HTTP_USER_AGENT")))
			$this->browser = "Lynx";
		
		elseif (ereg("WebTV", getenv("HTTP_USER_AGENT")))
			$this->browser = "WebTV";
		
		elseif (ereg("Konqueror", getenv("HTTP_USER_AGENT")))	
			$this->browser = "Konqueror";
		
		elseif ((eregi("bot", getenv("HTTP_USER_AGENT"))) || (ereg("Google", getenv("HTTP_USER_AGENT"))) ||
		(ereg("Slurp", getenv("HTTP_USER_AGENT"))) || (ereg("Scooter", getenv("HTTP_USER_AGENT"))) ||	
		(eregi("Spider", getenv("HTTP_USER_AGENT"))) || (eregi("Infoseek", getenv("HTTP_USER_AGENT"))))
			$this->browser = "Bot";
		else
			$this->browser = "Autre";
	}
	
	function Now($filename, $mime_type)
	{
		if(!isset($mime_type))
			$type = "application/octet-stream";
		
	        // Download
	        header('Content-Type: ' . $mime_type);
	        header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	        // IE need specific headers
	        if ($this->browser == 'MSIE') {
	            header('Content-Disposition: inline; filename="' . $filename . '"');
	            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	            header('Pragma: public');
	        } else {
	            header('Content-Disposition: attachment; filename="' . $filename . '"');
	            header('Pragma: no-cache');
	        }
	}
}

?>