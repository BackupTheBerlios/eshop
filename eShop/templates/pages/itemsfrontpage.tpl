<div id="frontpageitems">
	{section name=number loop=$numberOfItems}
		<div class="frontpage">
			<h1><a href="./index.php?module=mod_main&cat={$values[number][4]}&art_id={$values[number][3]}">{$values[number][0]|truncate:20:"...":true}</a></h1>
			<h2>{$values[number][2]} {$currency}</h2>
			{$values[number][1]|truncate:55:"...":true}
		</div>	
	{/section}
</div>