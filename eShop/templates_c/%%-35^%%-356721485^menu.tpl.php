<?php /* Smarty version 2.6.2, created on 2004-08-16 18:30:25
         compiled from ./pages/menu.tpl */ ?>
<?php if (! $this->_tpl_vars['is_not_logged']): ?>
<h1>Mon E-Shop</h1>
<ul>
	<li><a href="./index.php?module=mod_cart">Mon panier</a></li>
	<li><a href="index.php?module=mod_account">Mes informations</a></li>
	<?php if ($this->_tpl_vars['mod_estimate']): ?>
	<li><a href="index.php?module=mod_estimate">Mes devis</a></li>
	<?php endif; ?>
</ul>
<br />
<?php endif; ?>
<h1>Catégories</h1>
<ul>
	<?php if (isset($this->_sections['number'])) unset($this->_sections['number']);
$this->_sections['number']['name'] = 'number';
$this->_sections['number']['loop'] = is_array($_loop=$this->_tpl_vars['numberOfCat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['number']['show'] = true;
$this->_sections['number']['max'] = $this->_sections['number']['loop'];
$this->_sections['number']['step'] = 1;
$this->_sections['number']['start'] = $this->_sections['number']['step'] > 0 ? 0 : $this->_sections['number']['loop']-1;
if ($this->_sections['number']['show']) {
    $this->_sections['number']['total'] = $this->_sections['number']['loop'];
    if ($this->_sections['number']['total'] == 0)
        $this->_sections['number']['show'] = false;
} else
    $this->_sections['number']['total'] = 0;
if ($this->_sections['number']['show']):

            for ($this->_sections['number']['index'] = $this->_sections['number']['start'], $this->_sections['number']['iteration'] = 1;
                 $this->_sections['number']['iteration'] <= $this->_sections['number']['total'];
                 $this->_sections['number']['index'] += $this->_sections['number']['step'], $this->_sections['number']['iteration']++):
$this->_sections['number']['rownum'] = $this->_sections['number']['iteration'];
$this->_sections['number']['index_prev'] = $this->_sections['number']['index'] - $this->_sections['number']['step'];
$this->_sections['number']['index_next'] = $this->_sections['number']['index'] + $this->_sections['number']['step'];
$this->_sections['number']['first']      = ($this->_sections['number']['iteration'] == 1);
$this->_sections['number']['last']       = ($this->_sections['number']['iteration'] == $this->_sections['number']['total']);
?>
		<li><a href="./index.php?module=mod_main&cat=<?php echo $this->_tpl_vars['cat'][$this->_sections['number']['index']][0]; ?>
"><?php echo $this->_tpl_vars['cat'][$this->_sections['number']['index']][1]; ?>
</a></li>
	<?php endfor; endif; ?> 	  				  						
</ul>
<?php if ($this->_tpl_vars['is_not_logged']): ?>
<h1>Login</h1>
	<form action="index.php?module=mod_auth&action=login" method="post">
		<div style="text-align:center;">Authentification</div>
		<?php if ($this->_tpl_vars['login_error']): ?>
			<div style="text-align:center; color:red;"><?php echo $this->_tpl_vars['error']; ?>
</div>
		<?php endif; ?>
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
<?php endif; ?>	
<h1>Recherche</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
<h1>Thème</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./pages/theme.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	