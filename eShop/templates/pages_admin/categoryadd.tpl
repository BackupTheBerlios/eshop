<form action="index.php?module=mod_cat&action=save" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Ajout d'une catégorie</div></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="ca_name" value="{$ca_name}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Sous-catégorie de</td>
    <td class="alignleft">{$ca_cat_FK}</td>
  </tr>
  <tr>
    <td class="alignleft">Description</td>
    <td class="alignleft"><textarea name="ca_description">{$ca_description}</textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Ajouter" />
    </div></td>
  </tr>
</table>
</form>