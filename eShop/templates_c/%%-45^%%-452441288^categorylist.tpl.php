<?php /* Smarty version 2.6.2, created on 2004-07-28 14:00:53
         compiled from ./pages_admin/categorylist.tpl */ ?>
<form action="index.php?module=mod_cat&action=recherche" method="post" enctype="multipart/form-data">
<table width="600" border="0">
  <tr>
    <td colspan="2" class="framedline"><strong>Liste des catégories</strong></td>
  </tr>
  <?php if ($this->_tpl_vars['error']): ?>
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;"><?php echo $this->_tpl_vars['message']; ?>
</div></td>
  </tr>
  <?php endif; ?>
  <tr>
  	<td><input type="text" name="ca_id" value="<?php echo $this->_tpl_vars['cat_id']; ?>
"/></td>
  	<td><input type="text" name="ca_name" value="<?php echo $this->_tpl_vars['cat_name']; ?>
"/></td>
  	<td><input class="submit" type="submit" value="Rechercher" /></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>ID</td>
    <td>Nom</td>
    <td>Edition/Suppression</td>
  </tr> 
    <?php if (isset($this->_sections['categories'])) unset($this->_sections['categories']);
$this->_sections['categories']['name'] = 'categories';
$this->_sections['categories']['loop'] = is_array($_loop=$this->_tpl_vars['numberOfCat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['categories']['show'] = true;
$this->_sections['categories']['max'] = $this->_sections['categories']['loop'];
$this->_sections['categories']['step'] = 1;
$this->_sections['categories']['start'] = $this->_sections['categories']['step'] > 0 ? 0 : $this->_sections['categories']['loop']-1;
if ($this->_sections['categories']['show']) {
    $this->_sections['categories']['total'] = $this->_sections['categories']['loop'];
    if ($this->_sections['categories']['total'] == 0)
        $this->_sections['categories']['show'] = false;
} else
    $this->_sections['categories']['total'] = 0;
if ($this->_sections['categories']['show']):

            for ($this->_sections['categories']['index'] = $this->_sections['categories']['start'], $this->_sections['categories']['iteration'] = 1;
                 $this->_sections['categories']['iteration'] <= $this->_sections['categories']['total'];
                 $this->_sections['categories']['index'] += $this->_sections['categories']['step'], $this->_sections['categories']['iteration']++):
$this->_sections['categories']['rownum'] = $this->_sections['categories']['iteration'];
$this->_sections['categories']['index_prev'] = $this->_sections['categories']['index'] - $this->_sections['categories']['step'];
$this->_sections['categories']['index_next'] = $this->_sections['categories']['index'] + $this->_sections['categories']['step'];
$this->_sections['categories']['first']      = ($this->_sections['categories']['iteration'] == 1);
$this->_sections['categories']['last']       = ($this->_sections['categories']['iteration'] == $this->_sections['categories']['total']);
?>
  <tr  <?php if ($this->_sections['categories']['index']%2 == 0): ?>class="tab_ligne"<?php endif; ?>>
  	<td><?php echo $this->_tpl_vars['cat'][$this->_sections['categories']['index']][0]; ?>
</td>
  	<td><?php echo $this->_tpl_vars['cat'][$this->_sections['categories']['index']][1]; ?>
</td>
  	<td align="center"><a href="./index.php?module=mod_cat&action=modifcat&id=<?php echo $this->_tpl_vars['cat'][$this->_sections['categories']['index']][0]; ?>
" title="Modifier"><img src="./images/button_edit.png" border="0" /></a> / <a href="index.php?module=mod_cat&action=deletecat&id=<?php echo $this->_tpl_vars['cat'][$this->_sections['categories']['index']][0]; ?>
" onClick="if(confirm('Etes vous sûr de vouloir supprimer la catégorie :  <?php echo $this->_tpl_vars['cat'][$this->_sections['categories']['index']][1]; ?>
 ?'))<?php echo '{return true;}else{return false;}"'; ?>
 title="Supprimer"><img src="./images/button_drop.png" border=0 /></td>
  </tr>
  <?php endfor; endif; ?>
</table>
</form>