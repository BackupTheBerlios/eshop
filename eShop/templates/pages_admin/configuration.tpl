<form action="index.php?module=mod_config&action=saveconfig" method="post" enctype="multipart/form-data" name="registration">
<table border="0">
  <tr>
    <td colspan="2"><div align="center">Edition de la configuration</div></td>
  </tr>
  {if $save}
  <tr>
  	<td colspan="2"><div align="center"  {if $error}style="text-align:center; color:red;"{/if}>{$message}</div></td>
  </tr>
  {/if}
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Base de données</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Type de base de données</td>
    <td class="alignleft"><input type="text" name="db_type" value="{$db_type}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Hôte</td>
    <td class="alignleft"><input type="text" name="db_host" value="{$db_host}"/> (généralement localhost)</td>
  </tr>
  <tr>
    <td class="alignleft">Nom d'utilisateur</td>
    <td class="alignleft"><input type="text" name="db_login" value="{$db_login}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Mot de passe</td>
    <td class="alignleft"><input type="text" name="db_pass" value="{$db_pass}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Nom de la base de données</td>
    <td class="alignleft"><input type="text" name="db_name" value="{$db_name}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Préfixe des tables</td>
    <td class="alignleft"><input type="text" name="db_prefix" value="{$db_prefix}"/></td>
  </tr>
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Général</strong></td>
  </tr>  
  <tr>
    <td class="alignleft">Afficher le temps d'exécution du script dans le footer ?</td>
    <td class="alignleft"><input type="checkbox" name="benchmark_activation" value="on" {if $benchmark_activation eq "on"}checked{/if}/></td>
  </tr>
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Balises META</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse du site</td>
    <td class="alignleft"><input type="text" name="site_url" value="{$site_url}" size="40"/> (terminée par un /)</td>
  </tr>
  <tr>
    <td class="alignleft">Titre</td>
    <td class="alignleft"><input type="text" name="title" value="{$title}" size="40"/></td>
  </tr>
  <tr>
    <td class="alignleft">Description</td>
    <td class="alignleft"><textarea name="description" cols="37">{$description}</textarea></td>
  </tr>
  <tr>
    <td class="alignleft">Mots-clés</td>
    <td class="alignleft"><input type="text" name="keywords" value="{$keywords}" size="40"/></td>
  </tr>
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Editorial</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Activer l'éditorial ?</td>
    <td class="alignleft"><input type="checkbox" name="editorial" value="on" {if $editorial eq "on"}checked{/if}/></td>
  </tr>  
  <tr>
    <td class="alignleft">Titre</td>
    <td class="alignleft"><input type="text" name="editorial_title" value="{$editorial_title}" size="40" /></td>
  </tr>   
  <tr>
    <td class="alignleft">Contenu</td>
    <td class="alignleft"><textarea name="editorial_text" cols="37">{$editorial_text}</textarea></td>
  </tr>   
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Informations sur la société</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="company_name" value="{$company_name}" size="40"/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse e-mail</td>
    <td class="alignleft"><input type="text" name="company_mail" value="{$company_mail}" size="40"/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse</td>
    <td class="alignleft"><input type="text" name="company_address" value="{$company_address}" size="40"/></td>
  </tr>
  <tr>
    <td class="alignleft">N° de téléphone</td>
    <td class="alignleft"><input type="text" name="company_telephone" value="{$company_telephone}" size="40"/></td>
  </tr>
  <tr>
    <td class="alignleft">Nom du responsable</td>
    <td class="alignleft"><input type="text" name="company_contact" value="{$company_contact}" size="40"/></td>
  </tr>
  <tr>
    <td class="alignleft">Informations de copyright</td>
    <td class="alignleft"><input type="text" name="company_copyright" value="{$company_copyright}" size="40"/></td>
  </tr>
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Facturation</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Symbole monétaire (€, CHF...)</td>
    <td class="alignleft"><input type="text" name="currency" value="{$currency}" size="40"/></td>
  </tr>  
  <tr>
    <td colspan="2">
    	<div align="center">
      		<input class="submit" type="submit" name="Submit" value="Modifier" />
    	</div>
    </td>
  </tr>
</table>
</form>