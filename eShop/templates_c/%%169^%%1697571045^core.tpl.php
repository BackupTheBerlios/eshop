<?php /* Smarty version 2.6.2, created on 2004-08-20 16:25:38
         compiled from ./templates/core.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title><?php echo $this->_tpl_vars['title']; ?>
</title>
		<!-- 2002-2004 PRETRE THIERRY | EMOURGEON RAPHAEL -->
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=iso-8859-1" />
		<meta http-equiv="content-script-type" content="text/javascript" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta content="<?php echo $this->_tpl_vars['description']; ?>
" name="description" />
		<meta content="<?php echo $this->_tpl_vars['keywords']; ?>
" name="keywords" />
		<meta content="Thierry Prêtre / Raphaël Emourgeon / Christian KAKESA" name="author" />           
		<link rel="stylesheet" type="text/css" media="screen" title="Style défini par l'utilisateur" href="./style/<?php echo $this->_tpl_vars['css']; ?>
.css" />
		<link rel="alternate stylesheet" type="text/css" href="./style/red.css" media="screen" title="rouge" />
		<link rel="alternate stylesheet" type="text/css" href="./style/blue.css" media="screen" title="bleu" />
		<link rel="alternate stylesheet" type="text/css" href="./style/silver.css" media="screen" title="silver" />
  </head>
	<body id="e-shop">
	<div align="center">
	<div id="scroll"></div>
	<?php if ($this->_tpl_vars['is_not_logged']): ?>
		<div id="head_menu">
			<a href="index.php">Accueil</a> | <a href="index.php?module=mod_auth">Connexion</a> | <a href="index.php?module=mod_registration&action=register1">Inscription</a> | <a href="index.php?module=mod_cart">Panier (<?php echo $this->_tpl_vars['articles']; ?>
)</a>
		</div>
	<?php else: ?>	
		<div id="log_menu">
			<div id="log-info">
				<a href="index.php">Accueil</a> | <a href="index.php?module=mod_account">Mon compte</a> | <a href="index.php?module=mod_cart">Panier (<?php echo $this->_tpl_vars['articles']; ?>
)</a> | <a href="index.php?module=mod_auth&action=logout">Déconnexion</a>
			</div>
			<div id="log-user">
				<?php if ($this->_tpl_vars['level'] > 5): ?>
				<a href="index.php?module=mod_admin">Admin</a> |
				<?php endif; ?>
				Utilisateur : <?php echo $this->_tpl_vars['user']; ?>
 | Id : <?php echo $this->_tpl_vars['id']; ?>

			</div>

		</div>
	<?php endif; ?>
		<div id="title">
		</div>
		<div id="container">
			<div id="menu">
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  	</div>
		  	<div id="center">
		  				  		<?php if ($this->_tpl_vars['template'] == 'error'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'message'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/message.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'main'): ?>
	  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/main.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  			<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'login'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/login.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'register'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/register.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'lostpwd'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/lostpwd.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'items'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/items.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'cart'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/cart.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'account'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/account.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'resultsearch'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/resultsearch.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'estimate'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/mod_estimate/estimate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'user_estimate'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/mod_estimate/user_estimate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'est_view'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/mod_estimate/est_view.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  	</div>
		  	<?php if ($this->_tpl_vars['template'] == 'main' && $this->_tpl_vars['numberOfItems'] > 0): ?>
	  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/itemsfrontpage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  		<?php endif; ?>
		</div> 
		<div id="footer">
			<span class="mini"><a href="http://www.linux-france.org/article/these/gpl.html">Licence GPL</a> - Auteurs : Raphaël Emourgeon, Prêtre Thierry & Christian KAKESA<?php if ($this->_tpl_vars['benchmark_activation'] == 'on'): ?> - Exec. time : <?php echo $this->_tpl_vars['benchmark'];  endif; ?></span>
		</div>
	</div>
	</body>
</html>