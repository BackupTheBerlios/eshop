<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>{$title}</title>
		<!-- 2002-2004 PRETRE THIERRY | EMOURGEON RAPHAEL -->
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=iso-8859-1" />
		<meta http-equiv="content-script-type" content="text/javascript" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta content="{$description}" name="description" />
		<meta content="{$keywords}" name="keywords" />
		<meta content="Thierry Prêtre / Raphaël Emourgeon" name="author" />        
		<link rel="stylesheet" type="text/css" href="./style/main-style.css" media="screen" title="red" />     
		<link rel="stylesheet" type="text/css" href="./style/blue.css" media="screen" title="blue" />
     
  </head>
	<body id="e-shop">
	<div align="center">
	{if $is_not_logged}
		<div id="head_menu">
			<a href="index.php?module=mod_auth">Connexion</a> | <a href="index.php?module=mod_registration&action=register1">Inscription</a> | <a href="index.php?module=mod_cart">Panier({$articles})</a>
		</div>
	{else}	
		<div id="log_menu">
			<div id="log-info">
				<a href="index.php">Accueil</a> | <a href="index.php?module=mod_account">Mon compte</a> | <a href="index.php?module=mod_cart">Panier ({$articles})</a> | <a href="index.php?module=mod_auth&action=logout">Déconnexion</a>
			</div>
			<div id="log-user">
				Utilisateur : {$user} | Id : {$id}
			</div>
	
		</div>
	{/if}
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
		  			{if $db_type == "mysql"}
			  			<li><a href="./index.php?module=mod_backup&action=savedb">Sauvegarde</a></li>			
			  			<li><a href="./index.php?module=mod_backup&action=restoredb">Restauration</a></li>  	
		  			{/if}
		  			<li><a href="./index.php?module=mod_csv&action=exportcsv">Export CSV</a></li>  				  						
		  		</ul>
		  	</div>
		  	<div id="center">
		  		{* no switch in smarty so need to do loads of switch for the different main part *}
		  		{if $template eq "error"}
		  			{include file="./pages/error.tpl"}
		  		{/if}
		  		{if $template == "message"}
		  			{include file="./pages/message.tpl"}
		  		{/if}
		  		{if $template == "configuration"}
		  			{include file="./pages_admin/configuration.tpl"}
		  		{/if}
		  		{if $template == "accueil"}
		  			{include file="./pages_admin/accueil.tpl"}
		  		{/if}
	  			{if $template == "userlist"}
	  				{include file="./pages_admin/userlist.tpl"}
	  			{/if}
	  			{if $template == "useredit"}
	  				{include file="./pages_admin/useredit.tpl"}
	  			{/if}
		  		{if $template == "importcsv1"}
		  			{include file="./pages_admin/importcsv1.tpl"}
		  		{/if}
		  		{if $template == "importcsv2"}
		  			{include file="./pages_admin/importcsv2.tpl"}
		  		{/if}
		  		{if $template == "categorylist"}
		  			{include file="./pages_admin/categorylist.tpl"}
		  		{/if}
		  		{if $template == "itemlist"}
		  			{include file="./pages_admin/itemlist.tpl"}
		  		{/if}		  		
		  		{if $template == "categoryedit"}
		  			{include file="./pages_admin/categoryedit.tpl"}
		  		{/if}
		  		{if $template == "itemedit"}
		  			{include file="./pages_admin/itemedit.tpl"}
		  		{/if}
		  		{if $template == "itemadd"}
		  			{include file="./pages_admin/itemadd.tpl"}
		  		{/if}
		  		{if $template == "categoryadd"}
		  			{include file="./pages_admin/categoryadd.tpl"}
		  		{/if}
		  		{if $template == "header"}
		  			{include file="./pages_admin/header.tpl"}
		  		{/if}
		  	</div>
		</div> 
		<div id="footer">
			<span class="mini"><a href="http://www.linux-france.org/article/these/gpl.html">Licence GPL</a> - Auteurs : Raphaël Emourgeon & Prêtre Thierry{if $benchmark_activation eq "on"}- Exec. time : {$benchmark}{/if}</span>
		</div>
	</div>
	</body>
</html>