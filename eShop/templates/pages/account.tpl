<form action="index.php?module=mod_account&action=save" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Mes informations</div></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
   <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Informations utilisateur</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Nom d'utilisateur</td>
    <td class="alignleft">{$us_login}</td>
  </tr>
  <tr>
    <td class="alignleft">Nouveau mot de passe</td>
    <td class="alignleft"><input type="password" name="us_new_password1"/></td>
  </tr>
  <tr>
    <td class="alignleft">Confirmer le mot de passe</td>
    <td class="alignleft"><input type="password" name="us_new_password2"/></td>
  </tr>
  <tr>
    <td class="alignleft">Email</td>
    <td class="alignleft"><input type="text" name="us_email" value="{$us_email}"/></td>
  </tr>
   <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Informations personnelles</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="us_name" value="{$us_name}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Prénom</td>
    <td class="alignleft"><input type="text" name="us_first_name" value="{$us_first_name}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Société</td>
    <td class="alignleft"><input type="text" name="us_company" value="{$us_company}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse</td>
    <td class="alignleft"><textarea name="us_address">{$us_address}</textarea></td>
  </tr>
  <tr>
    <td class="alignleft">Code postal</td>
    <td class="alignleft"><input type="text" name="us_NPA" value="{$us_NPA}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Ville</td>
    <td class="alignleft"><input type="text" name="us_city" value="{$us_city}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Pays</td>
    <td class="alignleft">{$us_country}</td>
  </tr>
   <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Autres options</strong></td>
  </tr>
  <tr>
    <td class="alignleft">Newsletter</td>
    <td class="alignleft"><input type="checkbox" name="us_newsletter" value="1" {if $us_newsletter eq 1}checked{/if}/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Mettre à jour" />
    </div></td>
  </tr>
</table>
</form>