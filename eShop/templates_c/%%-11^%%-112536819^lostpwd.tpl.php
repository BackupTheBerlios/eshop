<?php /* Smarty version 2.6.2, created on 2004-07-06 19:41:31
         compiled from ./pages/lostpwd.tpl */ ?>
<form action="index.php?module=mod_registration&action=lostpwd2" method="post" enctype="multipart/form-data" name="lostpass">
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Récupération de votre identifiant et votre mot de passe</div></td>
  </tr>
  <?php if ($this->_tpl_vars['error']): ?>
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;"><?php echo $this->_tpl_vars['message']; ?>
</div></td>
  </tr>
  <?php endif; ?>
<tr><td height="8"></td></tr>
  <tr>
    <td width="248">Adresse e-mail :</td>
    <td width="242"><input type="text" name="email" <?php if ($this->_tpl_vars['error']): ?>value="<?php echo $this->_tpl_vars['nom']; ?>
"<?php endif; ?>/></td>
  </tr>
  <tr><td height="15"></td></tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Envoyer" />
    </div></td>
  </tr>
</table>
</form>