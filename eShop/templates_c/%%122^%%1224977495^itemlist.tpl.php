<?php /* Smarty version 2.6.2, created on 2004-08-17 01:45:18
         compiled from ./pages_admin/itemlist.tpl */ ?>
<form action="index.php?module=mod_items&action=recherche" method="post" enctype="multipart/form-data">
<table width="600" border="0">
  <tr>
    <td colspan="2" class="framedline"><strong>Liste des articles</strong></td>
  </tr>
  <?php if ($this->_tpl_vars['error']): ?>
  <tr>
  	<td colspan="2"><div align="center" style="text-align:center; color:red;"><?php echo $this->_tpl_vars['message']; ?>
</div></td>
  </tr>
  <?php endif; ?>
  <tr>
  	<td><input type="text" name="it_id" value="<?php echo $this->_tpl_vars['it_id']; ?>
"/></td>
  	<td><input type="text" name="it_name" value="<?php echo $this->_tpl_vars['it_name']; ?>
"/></td>
  	<td><input type="text" name="ca_name" value="<?php echo $this->_tpl_vars['ca_name']; ?>
"/></td>
  	<td><input class="submit" type="submit" value="Rechercher" /></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>ID</td>
    <td>Nom</td>
    <td>Catégorie</td>
    <td>Activation</td>
    <td>Edition/Suppression</td>
  </tr> 
  <?php if (isset($this->_sections['items'])) unset($this->_sections['items']);
$this->_sections['items']['name'] = 'items';
$this->_sections['items']['loop'] = is_array($_loop=$this->_tpl_vars['numberOfItems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['items']['show'] = true;
$this->_sections['items']['max'] = $this->_sections['items']['loop'];
$this->_sections['items']['step'] = 1;
$this->_sections['items']['start'] = $this->_sections['items']['step'] > 0 ? 0 : $this->_sections['items']['loop']-1;
if ($this->_sections['items']['show']) {
    $this->_sections['items']['total'] = $this->_sections['items']['loop'];
    if ($this->_sections['items']['total'] == 0)
        $this->_sections['items']['show'] = false;
} else
    $this->_sections['items']['total'] = 0;
if ($this->_sections['items']['show']):

            for ($this->_sections['items']['index'] = $this->_sections['items']['start'], $this->_sections['items']['iteration'] = 1;
                 $this->_sections['items']['iteration'] <= $this->_sections['items']['total'];
                 $this->_sections['items']['index'] += $this->_sections['items']['step'], $this->_sections['items']['iteration']++):
$this->_sections['items']['rownum'] = $this->_sections['items']['iteration'];
$this->_sections['items']['index_prev'] = $this->_sections['items']['index'] - $this->_sections['items']['step'];
$this->_sections['items']['index_next'] = $this->_sections['items']['index'] + $this->_sections['items']['step'];
$this->_sections['items']['first']      = ($this->_sections['items']['iteration'] == 1);
$this->_sections['items']['last']       = ($this->_sections['items']['iteration'] == $this->_sections['items']['total']);
?>
  <tr  <?php if ($this->_sections['items']['index']%2 == 0): ?>class="tab_ligne"<?php endif; ?>>
  	<td><?php echo $this->_tpl_vars['items'][$this->_sections['items']['index']][0]; ?>
</td>
  	<td><?php echo $this->_tpl_vars['items'][$this->_sections['items']['index']][1]; ?>
</td>
  	<td><?php echo $this->_tpl_vars['items'][$this->_sections['items']['index']][4]; ?>
</td>
  	<td align="center">
  		<?php if ($this->_tpl_vars['items'][$this->_sections['items']['index']][3] == 1): ?>
  			<img src="./images/green.png" />
  		<?php else: ?>
  			<img src="./images/red.png" />
  		<?php endif; ?>	
  	</td>
  	<td align="center"><a href="./index.php?module=mod_items&action=modif&id=<?php echo $this->_tpl_vars['items'][$this->_sections['items']['index']][0]; ?>
" title="Modifier"><img src="./images/button_edit.png" border="0" /></a> / <a href="index.php?module=mod_items&action=delete&id=<?php echo $this->_tpl_vars['items'][$this->_sections['items']['index']][0]; ?>
" onClick="if(confirm('Etes vous sûr de vouloir supprimer l\'objet :  <?php echo $this->_tpl_vars['items'][$this->_sections['items']['index']][1]; ?>
 ?'))<?php echo '{return true;}else{return false;}"'; ?>
 title="Supprimer"><img src="./images/button_drop.png" border=0 /></td>
  </tr>
  <?php endfor; endif; ?>
</table>
</form>