<?php /* Smarty version 2.6.2, created on 2004-08-20 07:37:36
         compiled from ./pages/itemsfrontpage.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', './pages/itemsfrontpage.tpl', 4, false),array('modifier', 'number_format', './pages/itemsfrontpage.tpl', 5, false),)), $this); ?>
<div id="frontpageitems">
	<?php if (isset($this->_sections['number'])) unset($this->_sections['number']);
$this->_sections['number']['name'] = 'number';
$this->_sections['number']['loop'] = is_array($_loop=$this->_tpl_vars['numberOfItems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['number']['show'] = true;
$this->_sections['number']['max'] = $this->_sections['number']['loop'];
$this->_sections['number']['step'] = 1;
$this->_sections['number']['start'] = $this->_sections['number']['step'] > 0 ? 0 : $this->_sections['number']['loop']-1;
if ($this->_sections['number']['show']) {
    $this->_sections['number']['total'] = $this->_sections['number']['loop'];
    if ($this->_sections['number']['total'] == 0)
        $this->_sections['number']['show'] = false;
} else
    $this->_sections['number']['total'] = 0;
if ($this->_sections['number']['show']):

            for ($this->_sections['number']['index'] = $this->_sections['number']['start'], $this->_sections['number']['iteration'] = 1;
                 $this->_sections['number']['iteration'] <= $this->_sections['number']['total'];
                 $this->_sections['number']['index'] += $this->_sections['number']['step'], $this->_sections['number']['iteration']++):
$this->_sections['number']['rownum'] = $this->_sections['number']['iteration'];
$this->_sections['number']['index_prev'] = $this->_sections['number']['index'] - $this->_sections['number']['step'];
$this->_sections['number']['index_next'] = $this->_sections['number']['index'] + $this->_sections['number']['step'];
$this->_sections['number']['first']      = ($this->_sections['number']['iteration'] == 1);
$this->_sections['number']['last']       = ($this->_sections['number']['iteration'] == $this->_sections['number']['total']);
?>
		<div class="frontpage">
			<h1><a href="./index.php?module=mod_main&cat=<?php echo $this->_tpl_vars['values'][$this->_sections['number']['index']][4]; ?>
&art_id=<?php echo $this->_tpl_vars['values'][$this->_sections['number']['index']][3]; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['values'][$this->_sections['number']['index']][0])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a></h1>
			<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['values'][$this->_sections['number']['index']][2])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", "") : smarty_modifier_number_format($_tmp, 2, ".", "")); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</h2>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['values'][$this->_sections['number']['index']][1])) ? $this->_run_mod_handler('truncate', true, $_tmp, 55, "...", true) : smarty_modifier_truncate($_tmp, 55, "...", true)); ?>

		</div>	
	<?php endfor; endif; ?>
</div>