<?php /* Smarty version 2.6.2, created on 2004-08-14 07:17:03
         compiled from ./pages/theme.tpl */ ?>
<form action="index.php?module=mod_themes&action=change" method="post">
	<select name="eshopstyle">
		<option value="red" <?php if ($this->_tpl_vars['css'] == 'red'): ?>selected<?php endif; ?>>Rouge</option>
		<option value="blue" <?php if ($this->_tpl_vars['css'] == 'blue'): ?>selected<?php endif; ?>>Bleu</option>
		<option value="silver" <?php if ($this->_tpl_vars['css'] == 'silver'): ?>selected<?php endif; ?>>Silver</option>
	</select>
	<input type="submit" value="Changer" class="submit">
</form>