<form action="index.php?module=mod_items&action=save&id={$it_id}" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Edition de l'article {$it_name}</div></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
  <tr>
    <td class="alignleft">ID</td>
    <td class="alignleft">{$it_id}</td>
  </tr>
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="it_name" value="{$it_name}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Description</td>
    <td class="alignleft"><textarea name="it_description">{$it_description}</textarea></td>
  </tr>
  <tr>
    <td class="alignleft">Prix</td>
    <td class="alignleft"><input type="text" name="it_price" value="{$it_price}"/> {$currency}</td>
  </tr>
  <tr>
    <td class="alignleft">Quantité</td>
    <td class="alignleft"><input type="text" name="it_quantity" value="{$it_quantity}"/></td>
  </tr>
  <tr>
    <td class="alignleft">Catégorie</td>
    <td class="alignleft">{$it_cat_FK}</td>
  </tr>
  <tr>
    <td class="alignleft">Activé ?</td>
    <td class="alignleft"><input type="checkbox" name="it_activated" value="1" {if $it_activated eq 1}checked{/if}/></td>
  </tr>
  <tr>
    <td class="alignleft">Affiché sur la première page ?</td>
    <td class="alignleft"><input type="checkbox" name="it_frontpage" value="1" {if $it_frontpage eq 1}checked{/if}/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Modifier" />
    </div></td>
  </tr>
</table>
</form>