<?php /* Smarty version 2.6.2, created on 2004-07-06 19:55:18
         compiled from ./pages_admin/categoryedit.tpl */ ?>
<form action="index.php?module=mod_cat&action=save&id=<?php echo $this->_tpl_vars['ca_id']; ?>
" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Edition de la catégorie <?php echo $this->_tpl_vars['login']; ?>
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
    <td class="alignleft"><?php echo $this->_tpl_vars['ca_id']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="ca_name" value="<?php echo $this->_tpl_vars['ca_name']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Level</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['ca_level']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Sous-catégorie de</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['ca_cat_FK']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Description</td>
    <td class="alignleft"><textarea name="ca_description"><?php echo $this->_tpl_vars['ca_description']; ?>
</textarea></td>
  </tr>

  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Modifier" />
    </div></td>
  </tr>
</table>
</form>