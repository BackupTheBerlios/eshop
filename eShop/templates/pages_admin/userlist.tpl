<form action="index.php?module=mod_user&action=recherche" method="post" enctype="multipart/form-data">
<table width="600" border="0">
  <tr>
    <td colspan="2" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Liste des utilisateurs</strong></td>
  </tr>
  <tr>
  	<td><input type="text" name="us_id" value="{$us_id}"/></td>
  	<td><input type="text" name="us_login" value="{$us_login}"/></td>
  	<td><input type="text" name="us_name" value="{$us_name}"/></td>
  	<td><input class="submit" type="submit" value="Rechercher" /></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>ID</td>
    <td>Login</td>
    <td>Nom</td>
    <td>Edition/Suppression</td>
  </tr> 
  {section name=users loop=$numberOfUsers}
  <tr  {if $smarty.section.categories.index%2 eq 0 }class="tab_ligne"{/if}>
  	<td>{$user[users][0]}</td>
  	<td>{$user[users][1]}</td>
  	<td>{$user[users][2]}</td>
  	<td align="center"><a href="./index.php?module=mod_user&action=modifuser&id={$user[users][0]}" title="Modifier"><img src="./images/button_edit.png" border="0" /></a> / <a href="index.php?module=mod_user&action=deleteusercat&id={$user[users][0]}" onClick="if(confirm('Etes vous sûr de vouloir supprimer l'utilisateur :  {$user[users][1]} ?')){literal}{return true;}else{return false;}"{/literal} title="Supprimer"><img src="./images/button_drop.png" border=0 /></td>
  </tr>
  {/section}
</table>
</form>
