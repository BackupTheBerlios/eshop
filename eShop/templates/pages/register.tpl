<form action="index.php?module=mod_registration&action=register2" method="post" enctype="multipart/form-data" name="registration">
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Inscription</div></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Informations personnelles </strong></td>
  </tr>
  <tr>
    <td width="248" class="alignleft">Nom</td>
    <td width="242" class="alignleft"><input type="text" name="nom" {if $error}value="{$nom}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Pr&eacute;nom</td>
    <td class="alignleft"><input type="text" name="prenom" {if $error}value="{$prenom}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse e-mail</td>
    <td class="alignleft"><input type="text" name="email" {if $error}value="{$email}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Soci&eacute;t&eacute;</td>
    <td class="alignleft"><input type="text" name="societe" {if $error}value="{$societe}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse</td>
    <td class="alignleft"><textarea name="adresse" cols="17">{if $error}{$adresse}{/if}</textarea></td>
  </tr>
  <tr>
    <td class="alignleft">Code Postal </td>
    <td class="alignleft"><input type="text" name="npa" {if $error}value="{$npa}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Ville</td>
    <td class="alignleft"><input type="text" name="ville" {if $error}value="{$ville}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Pays</td>
    <td class="alignleft">{$select_pays}</td>
  </tr>
  <tr>
    <td colspan="2" class="alignleft" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Informations du compte </strong></td>
  </tr>
  <tr>
    <td class="alignleft">Nom d'utilisateur </td>
    <td class="alignleft"><input type="text" name="login" {if $error}value="{$login}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Mot de passe </td>
    <td class="alignleft"><input type="password" name="pass" {if $error}value="{$pass}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">R&eacute;p&eacute;tez le mot de passe </td>
    <td class="alignleft"><input type="password" name="pass-verif" {if $error}value="{$pass-verif}"{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Inscription &agrave; la lettre d'informations</td>
    <td class="alignleft"><input type="checkbox" name="newsletter" value="yes" {if $newsletter}checked="checked"{/if}/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Envoyer" />
       <input class="submit" type="reset" name="Submit2" value="R&eacute;initialiser" />
    </div></td>
  </tr>
</table>
</form>