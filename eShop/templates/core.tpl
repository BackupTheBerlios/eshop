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
		<link rel="stylesheet" type="text/css" media="screen" title="Style défini par l'utilisateur" href="./style/{$css}.css" />
		<link rel="alternate stylesheet" type="text/css" href="./style/red.css" media="screen" title="rouge" />
		<link rel="alternate stylesheet" type="text/css" href="./style/blue.css" media="screen" title="bleu" />     
  </head>
	<body id="e-shop">
	<div align="center">
	<div id="scroll"></div>
	{if $is_not_logged}
		<div id="head_menu">
			<a href="index.php">Accueil</a> | <a href="index.php?module=mod_auth">Connexion</a> | <a href="index.php?module=mod_registration&action=register1">Inscription</a> | <a href="index.php?module=mod_cart">Panier ({$articles})</a>
		</div>
	{else}	
		<div id="log_menu">
			<div id="log-info">
				<a href="index.php">Accueil</a> | <a href="index.php?module=mod_account">Mon compte</a> | <a href="index.php?module=mod_cart">Panier ({$articles})</a> | <a href="index.php?module=mod_auth&action=logout">Déconnexion</a>
			</div>
			<div id="log-user">
				{if $level>5}
				<a href="index.php?module=mod_admin">Admin</a> |
				{/if}
				Utilisateur : {$user} | Id : {$id}
			</div>

		</div>
	{/if}
		<div id="title">
		</div>
		<div id="container">
			<div id="menu">
		  			{include file="./pages/menu.tpl"}
		  	</div>
		  	<div id="center">
		  		{* no switch in smarty so need to do loads of switch for the different main part *}
		  		{if $template eq "error"}
		  			{include file="./pages/error.tpl"}
		  		{/if}
		  		{if $template == "message"}
		  			{include file="./pages/message.tpl"}
		  		{/if}
		  		{if $template == "main"}
	  				{include file="./pages/main.tpl"}
	  			{/if}
		  		{if $template == "login"}
		  			{include file="./pages/login.tpl"}
		  		{/if}
		  		{if $template == "register"}
		  			{include file="./pages/register.tpl"}
		  		{/if}
		  		{if $template == "lostpwd"}
		  			{include file="./pages/lostpwd.tpl"}
		  		{/if}
		  		{if $template == "items"}
		  			{include file="./pages/items.tpl"}
		  		{/if}
		  		{if $template == "cart"}
		  			{include file="./pages/cart.tpl"}
		  		{/if}
		  		{if $template == "account"}
		  			{include file="./pages/account.tpl"}
		  		{/if}
		  		{if $template == "resultsearch"}
		  			{include file="./pages/resultsearch.tpl"}
		  		{/if}
		  	</div>
		  	{if $template == "main" && $numberOfItems > 0}
	  			{include file="./pages/itemsfrontpage.tpl"}
	  		{/if}
		</div> 
		<div id="footer">
			<span class="mini"><a href="http://www.linux-france.org/article/these/gpl.html">Licence GPL</a> - Auteurs : Raphaël Emourgeon & Prêtre Thierry{if $benchmark_activation eq "on"}- Exec. time : {$benchmark}{/if}</span>
		</div>
	</div>
	</body>
</html>