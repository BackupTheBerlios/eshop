<form action="index.php?module=mod_user&action=saveedition&id={$us_id}" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Edition de l'utilisateur {$login}</div></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
  <tr>
    <td class="alignleft">ID</td>
    <td class="alignleft">{$us_id}</td>
  </tr>
  <tr>
    <td class="alignleft">Login</td>
    <td class="alignleft"><input type="text" name="us_login" value="{$us_login}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Email</td>
    <td class="alignleft"><input type="text" name="us_email" value="{$us_email}"/></td>
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
    <td class="alignleft">Newsletter</td>
    <td class="alignleft"><input type="checkbox" name="us_newsletter" value="1" {if $us_newsletter eq 1}checked{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Niveau</td>
    <td class="alignleft">{$us_level}</td>
  </tr>
  <tr>
    <td class="alignleft">Catégorie de prix</td>
    <td class="alignleft">{$us_price_cat}</td>
  </tr>
  <tr>
    <td class="alignleft">Activation</td>
    <td class="alignleft"><input type="checkbox" name="us_activated" value="1" {if $us_activated eq 1}checked{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Date de dernière connexion</td>
    <td class="alignleft">{$us_last_log|date_format:"%d/%m/%Y"}</td>
  </tr>
  <tr>
    <td class="alignleft">IP de la dernière connexion</td>
    <td class="alignleft">{$us_last_ip}</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Modifier" />
    </div></td>
  </tr>
</table>
</form>