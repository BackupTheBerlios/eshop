<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>{$title}</title>
		<!-- 2002-2004 PRETRE THIERRY | EMOURGEON RAPHAEL -->
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=iso-8859-1" />
		<meta http-equiv="content-script-type" content="text/javascript" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta content="Thierry Prêtre / Raphaël Emourgeon" name="author" />        
		<link rel="stylesheet" type="text/css" href="./style/main-style.css" media="screen" title="bleu" />     
  </head>
 <body align="center" {$body_option}>
 	<div class="inst_header">
 		{$step_header}		
  	</div>
 	<div class="inst_container" id="install">
 		<form name="server_info" action="{$sending}">
		<input type="hidden" name="module" value="mod_install">
		<input type="hidden" name="action" value="verif">
		<input type="hidden" name="step" value="{$step}">
 		{if $step == 1}
 			{include file="./install/step1.tpl"}
 		{/if}
 		{if $step == 2}
 			{include file="./install/step2.tpl"}
 		{/if}
 		{if $step == 3}
 			{include file="./install/step3.tpl"}
 		{/if}
 		{if $step == 4}
 			{include file="./install/step4.tpl"}
 		{/if}
 		{if $step == 5}
 			{include file="./install/step5.tpl"}
 		{/if}
 		{$step_container}
 		</form>
 	</div>
 	<div class="inst_footer">
 		{$step_footer}
 	</div>
 </body>
</html>