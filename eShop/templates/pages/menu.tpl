{if !$is_not_logged}
<h1>Mon E-Shop</h1>
<ul>
	<li><a href="./index.php?module=mod_cart">Mon panier</a></li>
	<li><a href="index.php?module=mod_account">Mes informations</a></li>
	{if $mod_estimate}
	<li><a href="index.php?module=mod_estimate&action=user_estimate">Mes devis</a></li>
	{/if}
</ul>
<br />
{/if}
<h1>Catégories</h1>
<ul>
	{section name=number loop=$numberOfCat}
		<li><a href="./index.php?module=mod_main&cat={$cat[number][0]}">{$cat[number][1]}</a></li>
	{/section} 	  				  						
</ul>
{if $is_not_logged}
<h1>Login</h1>
	<form action="index.php?module=mod_auth&action=login" method="post">
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
	</form>
{/if}	
<h1>Recherche</h1>
{include file="./pages/search.tpl"}	
<h1>Thème</h1>
{include file="./pages/theme.tpl"}
	