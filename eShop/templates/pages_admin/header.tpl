{if $error}
	<div style="text-align:center; color:red;">{$message}</div>
{/if}
{if NOT $ok}
	<div align="center">
	Indiquez le chemin du nouveau logo (.jpg | 780 x 100 px)<br /><br />
		<form action="index.php?module=mod_header&action=change" method="post" enctype="multipart/form-data" name="changeheader">
			<input type="file" name="logo" />
			<br /><br />
			<input class="submit" type="submit" name="Submit" value="Modifier" />
		</form>
	</div>
{else}
	<div align="center">Logo modifié !</div>
{/if}