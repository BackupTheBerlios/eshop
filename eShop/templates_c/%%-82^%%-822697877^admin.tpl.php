<?php /* Smarty version 2.6.2, created on 2004-07-28 16:56:07
         compiled from ./templates/admin.tpl */ ?>
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
		<meta content="Thierry Prêtre / Raphaël Emourgeon" name="author" />   
		<link rel="stylesheet" type="text/css" media="screen" title="Style défini par l'utilisateur" href="./style/<?php echo $this->_tpl_vars['css']; ?>
.css" />     
		<link rel="stylesheet" type="text/css" href="./style/red.css" media="screen" title="rouge" />     
		<link rel="stylesheet" type="text/css" href="./style/blue.css" media="screen" title="bleu" />
  </head>
	<body id="e-shop">
	<div align="center">
	<div id="scroll"></div>
	<?php if ($this->_tpl_vars['is_not_logged']): ?>
		<div id="head_menu">
			<a href="index.php?module=mod_auth">Connexion</a> | <a href="index.php?module=mod_registration&action=register1">Inscription</a> | <a href="index.php?module=mod_cart">Panier(<?php echo $this->_tpl_vars['articles']; ?>
)</a>
		</div>
	<?php else: ?>	
		<div id="log_menu">
			<div id="log-info">
				<a href="index.php">Accueil</a> | <a href="index.php?module=mod_account">Mon compte</a> | <a href="index.php?module=mod_cart">Panier (<?php echo $this->_tpl_vars['articles']; ?>
)</a> | <a href="index.php?module=mod_auth&action=logout">Déconnexion</a>
			</div>
			<div id="log-user">
				Utilisateur : <?php echo $this->_tpl_vars['user']; ?>
 | Id : <?php echo $this->_tpl_vars['id']; ?>

			</div>
	
		</div>
	<?php endif; ?>
		<div id="title">
		</div>
		<div id="container">
			<div id="menu">
				<h1>Site</h1>
				<ul>
					<li><a href="./index.php?module=mod_admin">Accueil/Stats</a>
					<li><a href="./index.php?module=mod_config">Configuration</a></li>
					<li>Templates</li>
					<li><a href="./index.php?module=mod_header">Logo</a></li>
					<li>Newsletter</li>	
				</ul>
		  		<h1>Articles</h1>
		  		<ul>
		  			<li><a href="./index.php?module=mod_items">Edition/Suppression</a></li>
		  			<li><a href="./index.php?module=mod_items&action=new">Ajout</a></li>
		  			<li><a href="./index.php?module=mod_csv&action=importcsv&type=items">Import</a></li>			
		  		</ul>
		  		<h1>Catégories</h1>
		  		<ul>
		  			<li><a href="./index.php?module=mod_cat">Edition/Suppression</a></li>
		  			<li><a href="./index.php?module=mod_cat&action=new">Ajout</a></li>			
		  		</ul>
		  		<h1>Utilisateurs</h1>
		  		<ul>
		  			<li><a href="./index.php?module=mod_user">Edition/Suppression</a></li>
		  			<li><a href="./index.php?module=mod_csv&action=importcsv&type=users">Import</a></li>		
		  		</ul>
		  		<h1>Système</h1>
		  		<ul>
		  			<?php if ($this->_tpl_vars['db_type'] == 'mysql'): ?>
			  			<li><a href="./index.php?module=mod_backup&action=savedb">Sauvegarde</a></li>			
			  			<li><a href="./index.php?module=mod_backup&action=restoredb">Restauration</a></li>  	
		  			<?php endif; ?>
		  			<li><a href="./index.php?module=mod_csv&action=exportcsv">Export CSV</a></li>  				  						
		  		</ul>
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
		  		<?php if ($this->_tpl_vars['template'] == 'configuration'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/configuration.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'accueil'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/accueil.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
	  			<?php if ($this->_tpl_vars['template'] == 'userlist'): ?>
	  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/userlist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  			<?php endif; ?>
	  			<?php if ($this->_tpl_vars['template'] == 'useredit'): ?>
	  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/useredit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  			<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'importcsv1'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/importcsv1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'importcsv2'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/importcsv2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'categorylist'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/categorylist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'itemlist'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/itemlist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>		  		
		  		<?php if ($this->_tpl_vars['template'] == 'categoryedit'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/categoryedit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'itemedit'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/itemedit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'itemadd'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/itemadd.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'categoryadd'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/categoryadd.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  		<?php if ($this->_tpl_vars['template'] == 'header'): ?>
		  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages_admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		  		<?php endif; ?>
		  	</div>
		</div> 
		<div id="footer">
			<span class="mini"><a href="http://www.linux-france.org/article/these/gpl.html">Licence GPL</a> - Auteurs : Raphaël Emourgeon & Prêtre Thierry<?php if ($this->_tpl_vars['benchmark_activation'] == 'on'): ?>- Exec. time : <?php echo $this->_tpl_vars['benchmark'];  endif; ?></span>
		</div>
	</div>
	</body>
</html>