<?php /* Smarty version 2.6.2, created on 2004-07-06 21:15:05
         compiled from ./pages/resultsearch.tpl */ ?>
<?php if ($this->_tpl_vars['string'] == ""): ?>
	<label class="error">Vous devez spécifier un texte à rechercher !</label>
<?php else: ?>
	Résultat de la recherche avec <b>"<?php echo $this->_tpl_vars['string']; ?>
"</b>
	<?php if ($this->_tpl_vars['numberOfItems'] > 0): ?>
	<table>
		<tr class="premiere">
			<td width="4px">Id</td>
			<td width="350px">Nom</td>
			<td width="100px">Stock (pcs)</td>
			<td width="100px">Prix</td>	
		</tr>
		<?php if (isset($this->_sections['search'])) unset($this->_sections['search']);
$this->_sections['search']['name'] = 'search';
$this->_sections['search']['loop'] = is_array($_loop=$this->_tpl_vars['numberOfItems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['search']['show'] = true;
$this->_sections['search']['max'] = $this->_sections['search']['loop'];
$this->_sections['search']['step'] = 1;
$this->_sections['search']['start'] = $this->_sections['search']['step'] > 0 ? 0 : $this->_sections['search']['loop']-1;
if ($this->_sections['search']['show']) {
    $this->_sections['search']['total'] = $this->_sections['search']['loop'];
    if ($this->_sections['search']['total'] == 0)
        $this->_sections['search']['show'] = false;
} else
    $this->_sections['search']['total'] = 0;
if ($this->_sections['search']['show']):

            for ($this->_sections['search']['index'] = $this->_sections['search']['start'], $this->_sections['search']['iteration'] = 1;
                 $this->_sections['search']['iteration'] <= $this->_sections['search']['total'];
                 $this->_sections['search']['index'] += $this->_sections['search']['step'], $this->_sections['search']['iteration']++):
$this->_sections['search']['rownum'] = $this->_sections['search']['iteration'];
$this->_sections['search']['index_prev'] = $this->_sections['search']['index'] - $this->_sections['search']['step'];
$this->_sections['search']['index_next'] = $this->_sections['search']['index'] + $this->_sections['search']['step'];
$this->_sections['search']['first']      = ($this->_sections['search']['iteration'] == 1);
$this->_sections['search']['last']       = ($this->_sections['search']['iteration'] == $this->_sections['search']['total']);
?>
		<tr>
			<td><?php echo $this->_tpl_vars['items'][$this->_sections['search']['index']][0]; ?>
</td>
			<td><a href="?module=mod_main&cat=<?php echo $this->_tpl_vars['items'][$this->_sections['search']['index']][4]; ?>
&art_id=<?php echo $this->_tpl_vars['items'][$this->_sections['search']['index']][0]; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['search']['index']][1]; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['items'][$this->_sections['search']['index']][2]; ?>
</td>
			<td><?php echo $this->_tpl_vars['items'][$this->_sections['search']['index']][3]; ?>
</td>
		</tr>
		<?php endfor; endif; ?>
	</table>
	<?php else: ?>
		Aucun résultat trouvé !
	<?php endif; ?>
<?php endif; ?>