<?php /* Smarty version 2.6.2, created on 2004-08-16 16:11:05
         compiled from ./pages/cart.tpl */ ?>
<table width="600" border="0">
  <tr>
    <td colspan="2" class="framedline"><strong>Mon panier</strong></td>
  </tr>
  <tr style="font-weight:bold;">
    <td>Quantité</td>
    <td>Nom</td>
    <td>Description</td>
    <td>Quantité/Suppression</td>
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
	    <td><?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][0]; ?>
</td>
	    <td><?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][2]; ?>
</td>
	    <td><?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][3]; ?>
</td>
	    <td align="center"><?php if ($this->_tpl_vars['values'][$this->_sections['items']['index']][0]+1 <= $this->_tpl_vars['values'][$this->_sections['items']['index']][4]): ?><a href="./index.php?module=mod_cart&action=addone&item=<?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][1]; ?>
"/><img src="./images/button_plus.png" border=0 /></a><?php endif; ?> <?php if (( $this->_tpl_vars['values'][$this->_sections['items']['index']][0]-1 ) > 0): ?><a href="./index.php?module=mod_cart&action=pullone&item=<?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][1]; ?>
"/><img src="./images/button_moins.png" border=0 /></a><?php endif; ?> <a href="./index.php?module=mod_cart&action=remove&item=<?php echo $this->_tpl_vars['values'][$this->_sections['items']['index']][1]; ?>
"/><img src="./images/button_drop.png" border=0 /></a></td>
	</tr>
  <?php endfor; endif; ?>
</table>
<table width="600" border="0">
	<tr>
		<td>
			<a href="./index.php?module=mod_estimate">
				<div id="estimatebutton"></div>
			</a>
		</td>
		<td>
			<a href="./index.php?module=mod_order&action=confirm">
				<div id="orderbutton"></div>
			</a>
		</td>
	<tr>
</table>