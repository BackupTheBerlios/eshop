<label class="error">{$error_msg}</label><br />
<b style="font-size:12; text-align: center;">Configuration de la base de données</b><br>		
<br />Voici les configuration requise pour la base de données :<br />
<br />
<br />
<table width="100%">
<tr><td width="50%">
Type de Base de données
</td><td width="50%">
<input type="text" name="type" value="{$type}"> (ex: mysql, mssql, etc)
</td></tr>
<tr><td width="50%"> 
Adresse du serveur
</td><td width="50%">	
<input type="text" name="server" value="{$server}"> (habituellement : localhost)
</td></tr>
<tr><td width="50%">
Nom d'utilisateur de la base
</td><td width="50%">
<input type="text" name="login" value="{$login}">
</td></tr>
<tr><td width="50%">
Mot de passe
</td><td width="50%">
<input type="password" name="password" value="{$password}">
</td></tr>
<tr><td width="50%">
Mot de passe (confirmation)
</td><td width="50%">	
<input type="password" name="password2" value="{$password2}">
</td></tr>
<tr><td width="50%">
Nom de la base
</td><td width="50%">
<input type="text" name="name" value="{$name}">
</td></tr>
<tr><td width="50%">
Prefix de vos table (au choix)
</td><td width="50%">
<input type="text" name="prefix" value="{$prefix}">
</td></tr>
</table>
<br />
<br />