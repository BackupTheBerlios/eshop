<div align="center">
	Quel est le nombre d'éléments par ligne dans le fichier CSV ?
	<br />
	<br />
	<form action="index.php?module=mod_csv&action=importcsv&param=selectfields" method="post" enctype="multipart/form-data" name="selectfields">
			<input type="hidden" name="type" value="{$type}" />
			Nombre champs : <input type="text" size="2" value="5" name="number"/>
			<br />
			<br />
		<input class="submit" type="submit" name="Submit" value="> Suite >" />
	</form>
</div>