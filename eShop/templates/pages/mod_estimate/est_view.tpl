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
		<h3>Devis N° : {$est_num}</h3><br />
	</td>
</tr>
<tr>
	<td style="text-align: left;width: 100%;vertical-align: top;">
		<span style="white-space: nowrap;">TVA Intra-Communautaire : <strong>{$company_tva_intra_eu}</strong>.</span><br />
		<strong>{if $est_status < 3}<span style="color: red;">En cours...{else}<span style="color: green;">Traité{/if}</span></strong>
	</td>
	<td style="text-align: left;white-space: nowrap;">
		{if $us_company != ""}<strong>{$us_company}</strong><br />{/if}
		{$us_first_name} {$us_name}<br />
		{$us_address}<br />
		{$us_NPA} {$us_city}<br />
		{$us_country}<br />
		{$us_email}<br />
		<br />
		<strong>{$est_date|date_format:"%d-%m-%Y"}</strong>
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
{section name=items loop=$nb_items}
<tr>
    <td style="text-align: center;">{$values[items][0]}</td>
    <td>{$values[items][1]}</td>
    <td style="text-align: right;">{$values[items][2]|number_format:2:",":" "} {$currency}</td>
    <td style="text-align: center;">{$values[items][3]}</td>
    <td style="text-align: right;">{$values[items][4]|number_format:2:",":" "} {$currency}</td>
</tr>
{/section}
<tr>
	<td colspan="3" style="text-align: center;background-color: transparent;border-style: solid;border-color: #000000;border-width: 1px 0px 0px 0px;">&nbsp;</td>
	<td style="text-align: left;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;"><strong>Total (HT)</strong></td>
	<td style="text-align: right;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;">{$est_ttc_price/1.196|number_format:2:",":" "} {$currency}</td>
</tr>
<tr>
	<td colspan="3" style="text-align: center;background-color: transparent;border-style: solid;border-color: #000000;border-width: 0px 0px 0px 0px;">&nbsp;</td>
	<td style="text-align: left;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;"><strong>Total (TTC)</strong></td>
	<td style="text-align: right;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;">{$est_ttc_price|number_format:2:",":" "} {$currency}</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
</table>