<?php /* Smarty version 2.6.2, created on 2004-08-18 23:25:45
         compiled from ./pages/register.tpl */ ?>
<form action="index.php?module=mod_registration&action=register2" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Inscription</div></td>
  </tr>
  <?php if ($this->_tpl_vars['error']): ?>
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;"><?php echo $this->_tpl_vars['message']; ?>
</div></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td colspan="2" class="framedline"><strong>Informations personnelles </strong></td>
  </tr>
  <tr>
    <td width="248" class="alignleft">Nom</td>
    <td width="242" class="alignleft"><input type="text" name="nom" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['nom']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Pr&eacute;nom</td>
    <td class="alignleft"><input type="text" name="prenom" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['prenom']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse e-mail</td>
    <td class="alignleft"><input type="text" name="email" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['email']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Soci&eacute;t&eacute;</td>
    <td class="alignleft"><input type="text" name="societe" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['societe']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Adresse</td>
    <td class="alignleft"><textarea name="adresse" cols="17"><?php if ($this->_tpl_vars['error']):  echo $this->_tpl_vars['adresse'];  endif; ?></textarea></td>
  </tr>
  <tr>
    <td class="alignleft">Code Postal </td>
    <td class="alignleft"><input type="text" name="npa" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['npa']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Ville</td>
    <td class="alignleft"><input type="text" name="ville" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['ville']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Pays</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['select_pays']; ?>
</td>
  </tr>
  <tr>
    <td colspan="2" class="framedline"><strong>Informations du compte </strong></td>
  </tr>
  <tr>
    <td class="alignleft">Nom d'utilisateur </td>
    <td class="alignleft"><input type="text" name="login" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['login']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Mot de passe </td>
    <td class="alignleft"><input type="password" name="pass" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['pass']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">R&eacute;p&eacute;tez le mot de passe </td>
    <td class="alignleft"><input type="password" name="pass-verif" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['pass']-$this->_tpl_vars['erif']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Inscription &agrave; la lettre d'informations</td>
    <td class="alignleft"><input type="checkbox" name="newsletter" value="yes" <?php if ($this->_tpl_vars['newsletter']): ?>checked="checked"<?php endif; ?>/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Envoyer" />
       <input class="submit" type="reset" name="Submit2" value="R&eacute;initialiser" />
    </div></td>
  </tr>
</table>
</form>