<?php /* Smarty version 2.6.2, created on 2004-08-20 17:12:32
         compiled from ./pages/mod_estimate/user_estimate.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', './pages/mod_estimate/user_estimate.tpl', 14, false),array('modifier', 'number_format', './pages/mod_estimate/user_estimate.tpl', 15, false),)), $this); ?>
<table id="ue_content" align="left" border="1">
		<tr>
			<th class="left" colspan="4"><span style="color: red;font-size:12pt;font-weight:bold;">En cours...</span></th>
		</tr>
		<tr>
			<th>N° devis</th>
			<th>Date</th>
			<th>Prix TTC</th>
			<th>Etat</th>
		</tr>	
	<?php if (isset($this->_sections['estimate'])) unset($this->_sections['estimate']);
$this->_sections['estimate']['name'] = 'estimate';
$this->_sections['estimate']['loop'] = is_array($_loop=$this->_tpl_vars['encours']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['estimate']['show'] = true;
$this->_sections['estimate']['max'] = $this->_sections['estimate']['loop'];
$this->_sections['estimate']['step'] = 1;
$this->_sections['estimate']['start'] = $this->_sections['estimate']['step'] > 0 ? 0 : $this->_sections['estimate']['loop']-1;
if ($this->_sections['estimate']['show']) {
    $this->_sections['estimate']['total'] = $this->_sections['estimate']['loop'];
    if ($this->_sections['estimate']['total'] == 0)
        $this->_sections['estimate']['show'] = false;
} else
    $this->_sections['estimate']['total'] = 0;
if ($this->_sections['estimate']['show']):

            for ($this->_sections['estimate']['index'] = $this->_sections['estimate']['start'], $this->_sections['estimate']['iteration'] = 1;
                 $this->_sections['estimate']['iteration'] <= $this->_sections['estimate']['total'];
                 $this->_sections['estimate']['index'] += $this->_sections['estimate']['step'], $this->_sections['estimate']['iteration']++):
$this->_sections['estimate']['rownum'] = $this->_sections['estimate']['iteration'];
$this->_sections['estimate']['index_prev'] = $this->_sections['estimate']['index'] - $this->_sections['estimate']['step'];
$this->_sections['estimate']['index_next'] = $this->_sections['estimate']['index'] + $this->_sections['estimate']['step'];
$this->_sections['estimate']['first']      = ($this->_sections['estimate']['iteration'] == 1);
$this->_sections['estimate']['last']       = ($this->_sections['estimate']['iteration'] == $this->_sections['estimate']['total']);
?>
		<tr>	
	   		<td class="center"><a id="est_link" href="index.php?module=mod_estimate&action=est_view&est_num=<?php echo $this->_tpl_vars['encours'][$this->_sections['estimate']['index']]['est_num']; ?>
"><?php echo $this->_tpl_vars['encours'][$this->_sections['estimate']['index']]['est_num']; ?>
</a></td>
	   		<td class="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['encours'][$this->_sections['estimate']['index']]['est_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</td>
			<td class="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['encours'][$this->_sections['estimate']['index']]['est_ttc_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ' ') : smarty_modifier_number_format($_tmp, 2, ",", ' ')); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</td>
	   		<td class="center"><img src="./images/red.png" height="10"/></td>
	   	</tr>
   	<?php endfor; endif; ?>
		<tr>
			<th class="left" colspan="4"><span style="color: green;font-size:12pt;font-weight:bold;">Traité</span></th>
		</tr>
		<tr>
			<th>N° devis</th>
			<th>Date</th>
			<th>Prix TTC</th>
			<th>Etat</th>
		</tr>
	<?php if (isset($this->_sections['traite'])) unset($this->_sections['traite']);
$this->_sections['traite']['name'] = 'traite';
$this->_sections['traite']['loop'] = is_array($_loop=$this->_tpl_vars['traite']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['traite']['show'] = true;
$this->_sections['traite']['max'] = $this->_sections['traite']['loop'];
$this->_sections['traite']['step'] = 1;
$this->_sections['traite']['start'] = $this->_sections['traite']['step'] > 0 ? 0 : $this->_sections['traite']['loop']-1;
if ($this->_sections['traite']['show']) {
    $this->_sections['traite']['total'] = $this->_sections['traite']['loop'];
    if ($this->_sections['traite']['total'] == 0)
        $this->_sections['traite']['show'] = false;
} else
    $this->_sections['traite']['total'] = 0;
if ($this->_sections['traite']['show']):

            for ($this->_sections['traite']['index'] = $this->_sections['traite']['start'], $this->_sections['traite']['iteration'] = 1;
                 $this->_sections['traite']['iteration'] <= $this->_sections['traite']['total'];
                 $this->_sections['traite']['index'] += $this->_sections['traite']['step'], $this->_sections['traite']['iteration']++):
$this->_sections['traite']['rownum'] = $this->_sections['traite']['iteration'];
$this->_sections['traite']['index_prev'] = $this->_sections['traite']['index'] - $this->_sections['traite']['step'];
$this->_sections['traite']['index_next'] = $this->_sections['traite']['index'] + $this->_sections['traite']['step'];
$this->_sections['traite']['first']      = ($this->_sections['traite']['iteration'] == 1);
$this->_sections['traite']['last']       = ($this->_sections['traite']['iteration'] == $this->_sections['traite']['total']);
?>
    	<tr>	
	   		<td class="center"><a id="est_link" href="index.php?module=mod_estimate&action=est_view&est_num=<?php echo $this->_tpl_vars['traite'][$this->_sections['traite']['index']]['est_num']; ?>
"><?php echo $this->_tpl_vars['traite'][$this->_sections['traite']['index']]['est_num']; ?>
</a></td>
    		<td class="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['traite'][$this->_sections['traite']['index']]['est_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</td>
	   		<td class="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['traite'][$this->_sections['traite']['index']]['est_ttc_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ' ') : smarty_modifier_number_format($_tmp, 2, ",", ' ')); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</td>
	   		<td class="center"><img src="./images/green.png" height="10"/></td>
	   	</tr>
	<?php endfor; endif; ?>
</table>