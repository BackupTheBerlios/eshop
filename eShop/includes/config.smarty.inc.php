<?

/**
* config.smarty.inc.php
* @ File description : Configuration file for Smarty (extended from the original Smarty object)
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: config.smarty.inc.php,v 1.2 2004/07/10 20:32:07 kilgore Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../erreur.html"));

require('./lib/smarty/Smarty.class.php');

class Smarty_eshop extends Smarty {
	function Smarty_eshop() {
		// calling the parent constructor
		$this->Smarty();
		$this->template_dir = './templates/';
		$this->compile_dir = './templates_c/';
		$this->config_dir = './configs/';
		$this->cache_dir = './cache/';
		$this->caching = false;
		//$this->assign(’app_name’,’eShop’);
	}
}

?>