<table id="ue_content" align="left" border="1">
		<tr>
			<th class="left" colspan="4"><span style="color: red;font-size:12pt;font-weight:bold;">En cours...</span></th>
		</tr>
		<tr>
			<th>N° devis</th>
			<th>Date</th>
			<th>Prix TTC</th>
			<th>Etat</th>
		</tr>	
	{section name=estimate loop=$encours}
		<tr>	
	   		<td class="center"><a id="est_link" href="index.php?module=mod_estimate&action=est_view&est_num={$encours[estimate].est_num}">{$encours[estimate].est_num}</a></td>
	   		<td class="center">{$encours[estimate].est_date|date_format:"%d-%m-%Y"}</td>
			<td class="right">{$encours[estimate].est_ttc_price|number_format:2:",":" "} {$currency}</td>
	   		<td class="center"><img src="./images/red.png" height="10"/></td>
	   	</tr>
   	{/section}
		<tr>
			<th class="left" colspan="4"><span style="color: green;font-size:12pt;font-weight:bold;">Traité</span></th>
		</tr>
		<tr>
			<th>N° devis</th>
			<th>Date</th>
			<th>Prix TTC</th>
			<th>Etat</th>
		</tr>
	{section name=traite loop=$traite}
    	<tr>	
	   		<td class="center"><a id="est_link" href="index.php?module=mod_estimate&action=est_view&est_num={$traite[traite].est_num}">{$traite[traite].est_num}</a></td>
    		<td class="center">{$traite[traite].est_date|date_format:"%d-%m-%Y"}</td>
	   		<td class="right">{$traite[traite].est_ttc_price|number_format:2:",":" "} {$currency}</td>
	   		<td class="center"><img src="./images/green.png" height="10"/></td>
	   	</tr>
	{/section}
</table>