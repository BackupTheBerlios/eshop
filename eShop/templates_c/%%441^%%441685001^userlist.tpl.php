<?php /* Smarty version 2.6.2, created on 2004-07-06 20:57:39
         compiled from ./pages_admin/userlist.tpl */ ?>
<form action="index.php?module=mod_user&action=recherche" method="post" enctype="multipart/form-data">
<table width="600" border="0">
  <tr>
    <td colspan="2" style="border-top:thin solid #723; border-bottom:thin solid #723;"><strong>Liste des utilisateurs</strong></td>
  </tr>
  <tr>
  	<td><input type="text" name="us_id" value="<?php echo $this->_tpl_vars['us_id']; ?>
"/></td>
  	<td><input type="text" name="us_login" value="<?php echo $this->_tpl_vars['us_login']; ?>
"/></td>
  	<td><input type="text" name="us_name" value="<?php echo $this->_tpl_vars['us_name']; ?>
"/></td>
  	<td><input class="submit" type="submit" value="Rechercher" /></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>ID</td>
    <td>Login</td>
    <td>Nom</td>
    <td>Edition/Suppression</td>
  </tr> 
  <?php if (isset($this->_sections['users'])) unset($this->_sections['users']);
$this->_sections['users']['name'] = 'users';
$this->_sections['users']['loop'] = is_array($_loop=$this->_tpl_vars['numberOfUsers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['users']['show'] = true;
$this->_sections['users']['max'] = $this->_sections['users']['loop'];
$this->_sections['users']['step'] = 1;
$this->_sections['users']['start'] = $this->_sections['users']['step'] > 0 ? 0 : $this->_sections['users']['loop']-1;
if ($this->_sections['users']['show']) {
    $this->_sections['users']['total'] = $this->_sections['users']['loop'];
    if ($this->_sections['users']['total'] == 0)
        $this->_sections['users']['show'] = false;
} else
    $this->_sections['users']['total'] = 0;
if ($this->_sections['users']['show']):

            for ($this->_sections['users']['index'] = $this->_sections['users']['start'], $this->_sections['users']['iteration'] = 1;
                 $this->_sections['users']['iteration'] <= $this->_sections['users']['total'];
                 $this->_sections['users']['index'] += $this->_sections['users']['step'], $this->_sections['users']['iteration']++):
$this->_sections['users']['rownum'] = $this->_sections['users']['iteration'];
$this->_sections['users']['index_prev'] = $this->_sections['users']['index'] - $this->_sections['users']['step'];
$this->_sections['users']['index_next'] = $this->_sections['users']['index'] + $this->_sections['users']['step'];
$this->_sections['users']['first']      = ($this->_sections['users']['iteration'] == 1);
$this->_sections['users']['last']       = ($this->_sections['users']['iteration'] == $this->_sections['users']['total']);
?>
  <tr  <?php if ($this->_sections['categories']['index']%2 == 0): ?>class="tab_ligne"<?php endif; ?>>
  	<td><?php echo $this->_tpl_vars['user'][$this->_sections['users']['index']][0]; ?>
</td>
  	<td><?php echo $this->_tpl_vars['user'][$this->_sections['users']['index']][1]; ?>
</td>
  	<td><?php echo $this->_tpl_vars['user'][$this->_sections['users']['index']][2]; ?>
</td>
  	<td align="center"><a href="./index.php?module=mod_user&action=modifuser&id=<?php echo $this->_tpl_vars['user'][$this->_sections['users']['index']][0]; ?>
" title="Modifier"><img src="./images/button_edit.png" border="0" /></a> / <a href="index.php?module=mod_user&action=deleteusercat&id=<?php echo $this->_tpl_vars['user'][$this->_sections['users']['index']][0]; ?>
" onClick="if(confirm('Etes vous sûr de vouloir supprimer l'utilisateur :  <?php echo $this->_tpl_vars['user'][$this->_sections['users']['index']][1]; ?>
 ?'))<?php echo '{return true;}else{return false;}"'; ?>
 title="Supprimer"><img src="./images/button_drop.png" border=0 /></td>
  </tr>
  <?php endfor; endif; ?>
</table>
</form>