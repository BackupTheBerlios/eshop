<?php /* Smarty version 2.6.2, created on 2004-07-06 19:40:42
         compiled from ./pages/items.tpl */ ?>
<div id="cat" class="chemin"> <?php echo $this->_tpl_vars['categorie']; ?>
</div>
<br />
<?php if ($this->_tpl_vars['affiche_cat'] == 'true'): ?>
<div class="rep"><?php echo $this->_tpl_vars['contenu']; ?>
</div>
<?php endif; ?>
<br />
<?php if ($this->_tpl_vars['affiche_liste'] == 'true'): ?>

<div class="liste">
<?php echo $this->_tpl_vars['art_titre']; ?>

<?php if ($this->_tpl_vars['nbr_pages'] > 1): ?>
<div class="pages">
<?php echo $this->_tpl_vars['pages']; ?>

</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['liste']; ?>

<?php if ($this->_tpl_vars['nbr_pages'] > 1): ?>
<div class="pages">
<?php echo $this->_tpl_vars['pages']; ?>

</div>
<?php endif; ?>
</div>

<?php endif; ?>


