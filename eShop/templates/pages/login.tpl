	<form action="index.php?module=mod_auth&action=login" method="post">
		<div class="login">
		<div style="text-align:center;">Authentification</div>
		{if $login_error}
			<div style="text-align:center; color:red;">{$error}</div>
		{/if}
		<div style="text-align:center;">
		<p>
		<label for="user_id">Identifiant</label>
			<input name="user_login" id="user_id" type="text" maxlength="32"/>
		</p>
		<p>
		<label for="user_pwd">Mot de passe</label>
			<input name="user_pwd" id="user_pwd" type="password" />
		</p>
		</div>
		<div style="text-align:center;"><input class="submit" type="submit" value="ok"/></div>
		<p>
		<div style="text-align:center;"><a href="index.php?module=mod_registration&action=lostpwd1">Mot de passe et/ou identifiant perdu ?</a></div>
		</p>
		</div>
	</form>