<?php /* Smarty version 2.6.2, created on 2004-07-06 19:49:54
         compiled from ./pages_admin/categoryadd.tpl */ ?>
<form action="index.php?module=mod_cat&action=save" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Ajout d'une catégorie</div></td>
  </tr>
  <?php if ($this->_tpl_vars['error']): ?>
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;"><?php echo $this->_tpl_vars['message']; ?>
</div></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="ca_name" value="<?php echo $this->_tpl_vars['ca_name']; ?>
"/></td>
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
      <input class="submit" type="submit" name="Submit" value="Ajouter" />
    </div></td>
  </tr>
</table>
</form>