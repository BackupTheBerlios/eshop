<form action="index.php?module=mod_items&action=recherche" method="post" enctype="multipart/form-data">
<table width="600" border="0">
  <tr>
    <td colspan="2" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Liste des articles</strong></td>
  </tr>
  {if $error}
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;">{$message}</div></td>
  </tr>
  {/if}
  <tr>
  	<td><input type="text" name="it_id" value="{$it_id}"/></td>
  	<td><input type="text" name="it_name" value="{$it_name}"/></td>
  	<td><input type="text" name="ca_name" value="{$ca_name}"/></td>
  	<td><input class="submit" type="submit" value="Rechercher" /></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>ID</td>
    <td>Nom</td>
    <td>Catégorie</td>
    <td>Activation</td>
    <td>Edition/Suppression</td>
  </tr> 
  {section name=items loop=$numberOfItems}
  <tr  {if $smarty.section.items.index%2 eq 0 }class="tab_ligne"{/if}>
  	<td>{$items[items][0]}</td>
  	<td>{$items[items][1]}</td>
  	<td>{$items[items][4]}</td>
  	<td align="center">
  		{if $items[items][3] eq 1 }
  			<img src="./images/green.png" />
  		{else}
  			<img src="./images/red.png" />
  		{/if}	
  	</td>
  	<td align="center"><a href="./index.php?module=mod_items&action=modif&id={$items[items][0]}" title="Modifier"><img src="./images/button_edit.png" border="0" /></a> / <a href="index.php?module=mod_items&action=delete&id={$items[items][0]}" onClick="if(confirm('Etes vous sûr de vouloir supprimer l\'objet :  {$items[items][1]} ?')){literal}{return true;}else{return false;}"{/literal} title="Supprimer"><img src="./images/button_drop.png" border=0 /></td>
  </tr>
  {/section}
</table>
</form>
