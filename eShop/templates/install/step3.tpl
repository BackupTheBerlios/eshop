<label class="error">{$error_msg}</label><br />
<b style="font-size:12; text-align: center;">Configuration du site</b><br>		
<br />Entrez ici les données relatives au site web :<br />
<br />
<br />
<table width="100%">
<tr><td width="50%">
Adresse URL du site
</td><td width="50%">
<input type="text" name="site_url" value="{$site_url}"> (ex: http://www.monsite.ch/ | terminée par un /)
</td></tr>
<tr><td width="50%"> 
Titre du site
</td><td width="50%">	
<input type="text" name="site_title" value="{$site_title}"> (ex. Site officiel du SHC)
</td></tr>
<tr><td width="50%">
Description du site
</td><td width="50%">
<input type="text" name="site_des" value="{$site_des}">
</td></tr>
<tr><td width="50%">
Mots clés de référence (pour moteurs de recherches)
</td><td width="50%">
<textarea name="site_keywords">{$site_keywords}</textarea>
</td></tr>
</table>
<br />
<br />