<form action="index.php?module=mod_cat&action=recherche" method="post" enctype="multipart/form-data">
<table width="600" border="0">
  <tr>
    <td colspan="2" class="framedline"><strong>Liste des catégories</strong></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
  <tr>
  	<td><input type="text" name="ca_id" value="{$cat_id}"/></td>
  	<td><input type="text" name="ca_name" value="{$cat_name}"/></td>
  	<td><input class="submit" type="submit" value="Rechercher" /></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>ID</td>
    <td>Nom</td>
    <td>Edition/Suppression</td>
  </tr> 
  {* using PHP in order to do the on *}
  {section name=categories loop=$numberOfCat}
  <tr  {if $smarty.section.categories.index%2 eq 0 }class="tab_ligne"{/if}>
  	<td>{$cat[categories][0]}</td>
  	<td>{$cat[categories][1]}</td>
  	<td align="center"><a href="./index.php?module=mod_cat&action=modifcat&id={$cat[categories][0]}" title="Modifier"><img src="./images/button_edit.png" border="0" /></a> / <a href="index.php?module=mod_cat&action=deletecat&id={$cat[categories][0]}" onClick="if(confirm('Etes vous sûr de vouloir supprimer la catégorie :  {$cat[categories][1]} ?')){literal}{return true;}else{return false;}"{/literal} title="Supprimer"><img src="./images/button_drop.png" border=0 /></td>
  </tr>
  {/section}
</table>
</form>
