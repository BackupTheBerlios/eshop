<table id="estimate" style="width: 600px;border-style: none;border-size: 0px auto;">
<tr>
	<td style="text-align: left;white-space: nowrap;">
		<h3>
			{$company_name}
		</h3>
		<br />
		{$company_address}<br />
		{if $company_address2 != null}{$company_address2}<br />{/if}
		{$company_npa} {$company_city}<br />
		{$company_telephone}<br />
		{$company_fax}<br />
		{$company_mail}
	</td>
	<td style="width: 100%;text-align: left;white-space: nowrap;vertical-align: top;">
		<h3>Devis N° : {if $validate}{$est_num}{else}<span style="color: rgb(255, 0, 0);">à valider</span>{/if}</h3><br />
	</td>
</tr>
<tr>
	<td style="text-align: left;width: 100%;vertical-align: top;">
		<span style="white-space: nowrap;">TVA Intra-Communautaire : <strong>{$company_tva_intra_eu}</strong>.</span>
	</td>
	<td style="text-align: left;white-space: nowrap;">
		<strong>{$user_info[0][1]}</strong><br />
		{$user_info[0][2]} {$user_info[0][3]}<br />
		{$user_info[0][4]}<br />
		{$user_info[0][5]} {$user_info[0][6]}<br />
		{$user_info[0][7]}<br />
		{$user_info[0][8]}<br />
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
</table>
<table id="estimate" style="width: 600px;border-style: none;border-size: 0px auto;border-collapse: collapse;">
<tr>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Code</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Désignation</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Prix unitaire</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Quantité</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;">Total (TTC)</td>
</tr>
{section name=items loop=$numberOfItems}
<tr>
    <td style="text-align: center;">{$values[items][0]}</td>
    <td>{$values[items][1]}</td>
    <td style="text-align: right;">{$values[items][2]|number_format:2:",":" "} {$currency}</td>
    <td style="text-align: center;">{$values[items][3]}</td>
    <td style="text-align: right;">{$values[items][4]|number_format:2:",":" "} {$currency}</td>
</tr>
{assign var="totalTtc" value="`$totalTtc+$values[items][4]`"}
 {/section}
<tr>
	<td colspan="3" style="text-align: center;background-color: transparent;border-style: solid;border-color: #000000;border-width: 1px 0px 0px 0px;">&nbsp;</td>
	<td style="text-align: left;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;"><strong>Total (HT)</strong></td>
	<td style="text-align: right;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;">{$totalTtc/1.196|number_format:2:",":" "} {$currency}</td>
</tr>
<tr>
	<td colspan="3" style="text-align: center;background-color: transparent;border-style: solid;border-color: #000000;border-width: 0px 0px 0px 0px;">&nbsp;</td>
	<td style="text-align: left;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;"><strong>Total (TTC)</strong></td>
	<td style="text-align: right;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;">{$totalTtc|number_format:2:",":" "} {$currency}</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<tr>
	{if !$validate}
	<td>
		<form action="index.php?module=mod_estimate" method="post">
			<input type="text" name="action" value="confirm" size="40" maxlength="40" style="display: none;"/>
			<input type="text" name="ttc" value="{$totalTtc}" size="40" maxlength="40" style="display: none;"/>
			<input type="submit" value="Valider" class="submit" />
		</form>
	</td>	
	{/if}
</tr>
</table>