<?php /* Smarty version 2.6.2, created on 2004-07-06 19:52:55
         compiled from ./pages_admin/itemedit.tpl */ ?>
<form action="index.php?module=mod_items&action=save&id=<?php echo $this->_tpl_vars['it_id']; ?>
" method="post" enctype="multipart/form-data" name="registration">
<table width="600" border="0">
  <tr>
    <td colspan="2"><div align="center">Edition de l'article <?php echo $this->_tpl_vars['it_name']; ?>
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
    <td class="alignleft"><?php echo $this->_tpl_vars['it_id']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Nom</td>
    <td class="alignleft"><input type="text" name="it_name" value="<?php echo $this->_tpl_vars['it_name']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Description</td>
    <td class="alignleft"><textarea name="it_description"><?php echo $this->_tpl_vars['it_description']; ?>
</textarea></td>
  </tr>
  <tr>
    <td class="alignleft">Prix</td>
    <td class="alignleft"><input type="text" name="it_price" value="<?php echo $this->_tpl_vars['it_price']; ?>
"/> <?php echo $this->_tpl_vars['currency']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Quantité</td>
    <td class="alignleft"><input type="text" name="it_quantity" value="<?php echo $this->_tpl_vars['it_quantity']; ?>
"/></td>
  </tr>
  <tr>
    <td class="alignleft">Catégorie</td>
    <td class="alignleft"><?php echo $this->_tpl_vars['it_cat_FK']; ?>
</td>
  </tr>
  <tr>
    <td class="alignleft">Activé ?</td>
    <td class="alignleft"><input type="checkbox" name="it_activated" value="1" <?php if ($this->_tpl_vars['it_activated'] == 1): ?>checked<?php endif; ?>/></td>
  </tr>
  <tr>
    <td class="alignleft">Affiché sur la première page ?</td>
    <td class="alignleft"><input type="checkbox" name="it_frontpage" value="1" <?php if ($this->_tpl_vars['it_frontpage'] == 1): ?>checked<?php endif; ?>/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input class="submit" type="submit" name="Submit" value="Modifier" />
    </div></td>
  </tr>
</table>
</form>