<?php /* Smarty version 2.6.2, created on 2004-07-06 19:48:40
         compiled from ./pages_admin/accueil.tpl */ ?>
<div align="center">Bienvenue dans la zone d'administration</div>
<br />
<div align="left">Voici les statistiques actuelles :</div>
<table summary="Statistiques" id="stats">
  <tr>
    <th width="10%" align="left">Nombre d'articles</th>
    <th width="10%" align="center"><?php echo $this->_tpl_vars['items']; ?>
</th>
  </tr>
  <tr>
    <th width="10%" align="left">Nombre de catégories</th>
    <th width="10%" align="center"><?php echo $this->_tpl_vars['cat']; ?>
</th>
  </tr>
  <tr>
    <th width="10%" align="left">Nombre d'utilisateurs ayant validé leur compte</th>
    <th width="10%" align="center"><?php echo $this->_tpl_vars['user_validated']; ?>
</th>
  </tr>
  <tr>
    <th width="10%" align="left">Nombre d'utilisateurs n'ayant pas validé leur compte</th>
    <th width="10%" align="center"><?php echo $this->_tpl_vars['user_not_validated']; ?>
</th>
  </tr>
</table>
<div align="center">
<b>TOP 5 des ventes</b>
<table summary="top5ventes" id="top5" width="40%">
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['sold_item_name0']; ?>
</th>
    <th><?php echo $this->_tpl_vars['sold_item_value0']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['sold_item_name1']; ?>
</th>
    <th><?php echo $this->_tpl_vars['sold_item_value1']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['sold_item_name2']; ?>
</th>
    <th><?php echo $this->_tpl_vars['sold_item_value2']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['sold_item_name3']; ?>
</th>
    <th><?php echo $this->_tpl_vars['sold_item_value3']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['sold_item_name4']; ?>
</th>
    <th><?php echo $this->_tpl_vars['sold_item_value4']; ?>
</th>
  </tr>
</table>
</div>
<div align="center">
<b>TOP 5 articles ayant le plus faible stock</b>
<table summary="top5stock" id="top5" width="40%">
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['stock_item_name0']; ?>
</th>
    <th><?php echo $this->_tpl_vars['stock_item_value0']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['stock_item_name1']; ?>
</th>
    <th><?php echo $this->_tpl_vars['stock_item_value1']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['stock_item_name2']; ?>
</th>
    <th><?php echo $this->_tpl_vars['stock_item_value2']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['stock_item_name3']; ?>
</th>
    <th><?php echo $this->_tpl_vars['stock_item_value3']; ?>
</th>
  </tr>
  <tr>
    <th align="left"><?php echo $this->_tpl_vars['stock_item_name4']; ?>
</th>
    <th><?php echo $this->_tpl_vars['stock_item_value4']; ?>
</th>
  </tr>
</table>
</div>