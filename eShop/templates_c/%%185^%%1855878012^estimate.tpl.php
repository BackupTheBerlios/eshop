<?php /* Smarty version 2.6.2, created on 2004-08-18 19:39:29
         compiled from ./pages/mod_estimate/estimate.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', './pages/mod_estimate/estimate.tpl', 48, false),)), $this); ?>
<table id="estimate" style="width: 600px;border-style: none;border-size: 0px auto;">
<tr>
	<td style="text-align: left;white-space: nowrap;">
		<h3>
			<?php echo $this->_tpl_vars['company_name']; ?>

		</h3>
		<br />
		<?php echo $this->_tpl_vars['company_address']; ?>
<br />
		<?php if ($this->_tpl_vars['company_address2'] != null):  echo $this->_tpl_vars['company_address2']; ?>
<br /><?php endif; ?>
		<?php echo $this->_tpl_vars['company_npa']; ?>
 <?php echo $this->_tpl_vars['company_city']; ?>
<br />
		<?php echo $this->_tpl_vars['company_telephone']; ?>
<br />
		<?php echo $this->_tpl_vars['company_fax']; ?>
<br />
		<?php echo $this->_tpl_vars['company_mail']; ?>

	</td>
	<td style="width: 100%;text-align: left;white-space: nowrap;vertical-align: top;">
		<h3>Devis N° : <?php if ($this->_tpl_vars['validate']):  echo $this->_tpl_vars['est_num'];  else: ?><span style="color: rgb(255, 0, 0);">à valider</span><?php endif; ?></h3><br />
	</td>
</tr>
<tr>
	<td style="text-align: left;width: 100%;vertical-align: top;">
		<span style="white-space: nowrap;">TVA Intra-Communautaire : <strong><?php echo $this->_tpl_vars['company_tva_intra_eu']; ?>
</strong>.</span>
	</td>
	<td style="text-align: left;white-space: nowrap;">
		<strong><?php echo $this->_tpl_vars['user_info'][0][1]; ?>
</strong><br />
		<?php echo $this->_tpl_vars['user_info'][0][2]; ?>
 <?php echo $this->_tpl_vars['user_info'][0][3]; ?>
<br />
		<?php echo $this->_tpl_vars['user_info'][0][4]; ?>
<br />
		<?php echo $this->_tpl_vars['user_info'][0][5]; ?>
 <?php echo $this->_tpl_vars['user_info'][0][6]; ?>
<br />
		<?php echo $this->_tpl_vars['user_info'][0][7]; ?>
<br />
		<?php echo $this->_tpl_vars['user_info'][0][8]; ?>
<br />
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
</table>
<table id="estimate" style="width: 600px;border-style: none;border-size: 0px auto;border-collapse: collapse;">
<tr>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Code</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Désignation</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Prix unitaire</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;">Quantité</td>
	<td style="text-align: center;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;">Total (TTC)</td>
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
<tr>
    <td style="text-align: center;"><?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][0]; ?>
</td>
    <td><?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][1]; ?>
</td>
    <td style="text-align: right;"><?php echo ((is_array($_tmp=$this->_tpl_vars['values'][$this->_sections['items']['index']][2])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ' ') : smarty_modifier_number_format($_tmp, 2, ",", ' ')); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</td>
    <td style="text-align: center;"><?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][3]; ?>
</td>
    <td style="text-align: right;"><?php echo ((is_array($_tmp=$this->_tpl_vars['values'][$this->_sections['items']['index']][4])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ' ') : smarty_modifier_number_format($_tmp, 2, ",", ' ')); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</td>
</tr>
<?php $this->assign('totalTtc', ($this->_tpl_vars['totalTtc']+$this->_tpl_vars['values'][$this->_sections['items']['index']][4])); ?>
 <?php endfor; endif; ?>
<tr>
	<td colspan="3" style="text-align: center;background-color: transparent;border-style: solid;border-color: #000000;border-width: 1px 0px 0px 0px;">&nbsp;</td>
	<td style="text-align: left;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;"><strong>Total (HT)</strong></td>
	<td style="text-align: right;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalTtc']/1.196)) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ' ') : smarty_modifier_number_format($_tmp, 2, ",", ' ')); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</td>
</tr>
<tr>
	<td colspan="3" style="text-align: center;background-color: transparent;border-style: solid;border-color: #000000;border-width: 0px 0px 0px 0px;">&nbsp;</td>
	<td style="text-align: left;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 0px 1px 1px;"><strong>Total (TTC)</strong></td>
	<td style="text-align: right;background-color: #999999;border-style: solid;border-color: #000000;border-width: 1px 1px 1px 1px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalTtc'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ' ') : smarty_modifier_number_format($_tmp, 2, ",", ' ')); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<tr>
	<?php if (! $this->_tpl_vars['validate']): ?>
	<td>
		<form action="index.php?module=mod_estimate" method="post">
			<input type="text" name="action" value="confirm" size="40" maxlength="40" style="display: none;"/>
			<input type="text" name="ttc" value="<?php echo $this->_tpl_vars['totalTtc']; ?>
" size="40" maxlength="40" style="display: none;"/>
			<input type="submit" value="Valider" class="submit" />
		</form>
	</td>	
	<?php endif; ?>
</tr>
</table>