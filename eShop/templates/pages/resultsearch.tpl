{if $string eq ""}
	<label class="error">Vous devez spécifier un texte à rechercher !</label>
{else}
	Résultat de la recherche avec <b>"{$string}"</b>
	{if $numberOfItems > 0}
	<table>
		<tr class="premiere">
			<td width="4px">Id</td>
			<td width="350px">Nom</td>
			<td width="100px">Stock (pcs)</td>
			<td width="100px">Prix</td>	
		</tr>
		{section name=search loop=$numberOfItems}
		<tr>
			<td>{$items[search][0]}</td>
			<td><a href="?module=mod_main&cat={$items[search][4]}&art_id={$items[search][0]}">{$items[search][1]}</a></td>
			<td>{$items[search][2]}</td>
			<td>{$items[search][3]}</td>
		</tr>
		{/section}
	</table>
	{else}
		Aucun résultat trouvé !
	{/if}
{/if}