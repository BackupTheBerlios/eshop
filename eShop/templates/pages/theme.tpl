<form action="index.php?module=mod_themes&action=change" method="post">
	<select name="eshopstyle">
		<option value="red" {if $css eq "red"}selected{/if}>Rouge</option>
		<option value="blue" {if $css eq "blue"}selected{/if}>Bleu</option>
	</select>
	<input type="submit" value="Changer" class="submit">
</form>