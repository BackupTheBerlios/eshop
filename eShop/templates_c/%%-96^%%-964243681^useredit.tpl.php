<?php /* Smarty version 2.6.2, created on 2004-07-06 19:48:52
         compiled from ./pages_admin/useredit.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', './pages_admin/useredit.tpl', 69, false),)), $this); ?>
<form action="index.php?module=mod_user&action=saveedition&id=<?php echo $this->_tpl_vars['us_id']; ?>
" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Edition de l'utilisateur <?php echo $this->_tpl_vars['login']; ?>
</div></td>
  </tr>
  <?php if ($this->_tpl_vars['error']): ?>
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;"><?php echo $this->_tpl_vars['message']; ?>
</div></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td class="alignleft">ID</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['us_id']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Login</td>
    <td class="alignleft"><input type="text" name="us_login" value="<?php echo $this->_tpl_vars['us_login']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Email</td>
    <td class="alignleft"><input type="text" name="us_email" value="<?php echo $this->_tpl_vars['us_email']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="us_name" value="<?php echo $this->_tpl_vars['us_name']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Prénom</td>
    <td class="alignleft"><input type="text" name="us_first_name" value="<?php echo $this->_tpl_vars['us_first_name']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Société</td>
    <td class="alignleft"><input type="text" name="us_company" value="<?php echo $this->_tpl_vars['us_company']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse</td>
    <td class="alignleft"><textarea name="us_address"><?php echo $this->_tpl_vars['us_address']; ?>
</textarea></td>
  </tr>
  <tr>
    <td class="alignleft">Code postal</td>
    <td class="alignleft"><input type="text" name="us_NPA" value="<?php echo $this->_tpl_vars['us_NPA']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Ville</td>
    <td class="alignleft"><input type="text" name="us_city" value="<?php echo $this->_tpl_vars['us_city']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Pays</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['us_country']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Newsletter</td>
    <td class="alignleft"><input type="checkbox" name="us_newsletter" value="1" <?php if ($this->_tpl_vars['us_newsletter'] == 1): ?>checked<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Niveau</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['us_level']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Catégorie de prix</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['us_price_cat']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Activation</td>
    <td class="alignleft"><input type="checkbox" name="us_activated" value="1" <?php if ($this->_tpl_vars['us_activated'] == 1): ?>checked<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Date de dernière connexion</td>
    <td class="alignleft"><?php echo ((is_array($_tmp=$this->_tpl_vars['us_last_log'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">IP de la dernière connexion</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['us_last_ip']; ?>
</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Modifier" />
    </div></td>
  </tr>
</table>
</form>