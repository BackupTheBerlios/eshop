<div align="center">
	Choisissez le fichier .csv � importer depuis votre disque dur :
	<br />
	<br />
	<form action="index.php?module=mod_csv&action=importcsv&param=execute" method="post" enctype="multipart/form-data" name="importcsv">
		<input type="file" name="csvfile" />
		<input type="hidden" name="type" value="{$type}" />
		<input type="hidden" name="number" value="{$selectnumber}" />
		<br />
		<br />
		{section name=number loop=$selectnumber}
			Colonne {$smarty.section.number.index_next} : {$select[number]}<br /><br />
		{/section}
		<div align="left">
			<br />
			<br />
			La premi�re ligne ne contient pas de donn�es ? <input type="checkbox" name="firstlinehascontent" value="yes" />
			<br />
			<br />
			Caract�re de s�paration des colonnes : <input type="text" name="separationcolumns" size="4" value="\t"/>(\t pour une tabulation)
			<br />
			<br />
			Caract�re entourant les donn�es : <input type="text" name="enclosure" size="1" value="'" /> (g�n�ralement un guillemet simple ou rien)
			<br />
			<br />
		</div>
		<input class="submit" type="submit" name="Submit" value="Importer" />
	</form>
</div>