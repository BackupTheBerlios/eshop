<form action="index.php?module=mod_registration&action=lostpwd2" method="post" enctype="multipart/form-data" name="lostpass">
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Récupération de votre identifiant et votre mot de passe</div></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
<tr><td height="8"></td></tr>
  <tr>
    <td width="248">Adresse e-mail :</td>
    <td width="242"><input type="text" name="email" {if $error}value="{$nom}"{/if}/></td>
  </tr>
  <tr><td height="15"></td></tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Envoyer" />
    </div></td>
  </tr>
</table>
</form>