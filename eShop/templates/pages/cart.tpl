<table width="600" border="0">
  <tr>
    <td colspan="2" class="framedline"><strong>Mon panier</strong></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>Quantité</td>
    <td>Nom</td>
    <td>Description</td>
    <td>Quantité/Suppression</td>
  </tr>
  {section name=items loop=$numberOfItems}
	<tr>
	    <td>{$values[items][0]}</td>
	    <td>{$values[items][2]}</td>
	    <td>{$values[items][3]}</td>
	    <td align="center">{if $values[items][0]+1 <= $values[items][4]}<a href="./index.php?module=mod_cart&action=addone&item={$values[items][1]}"/><img src="./images/button_plus.png" border=0 /></a>{/if} {if ($values[items][0]-1) > 0}<a href="./index.php?module=mod_cart&action=pullone&item={$values[items][1]}"/><img src="./images/button_moins.png" border=0 /></a>{/if} <a href="./index.php?module=mod_cart&action=remove&item={$values[items][1]}"/><img src="./images/button_drop.png" border=0 /></a></td>
	</tr>
  {/section}
</table>
<a href="./index.php?module=mod_order&action=confirm"><div id="orderbutton"></div></a>
