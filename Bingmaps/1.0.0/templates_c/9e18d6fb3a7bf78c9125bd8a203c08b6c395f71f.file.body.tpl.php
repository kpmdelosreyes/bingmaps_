<?php /* Smarty version Smarty-3.0.6, created on 2011-11-17 10:34:17
         compiled from "./templates/body.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14111902244ec472a9394e15-28692836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e18d6fb3a7bf78c9125bd8a203c08b6c395f71f' => 
    array (
      0 => './templates/body.tpl',
      1 => 1321496664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14111902244ec472a9394e15-28692836',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input type="hidden" id="credentials" value="<?php echo $_smarty_tpl->getVariable('bingKey')->value;?>
" />
<div style="width:<?php echo $_smarty_tpl->getVariable('width')->value;?>
px;display:inline-block;margin:0;padding:0;background:pink !important">
	<div style="width:<?php echo $_smarty_tpl->getVariable('width')->value;?>
px;height:<?php echo $_smarty_tpl->getVariable('height')->value;?>
px;margin:0;padding:5px 10px 55px 10px;display:inline-block;background:#eee;border:1px solid #ddd">
		<h3 id="pg_map_title" style="margin-bottom:10px;font-size:15px;font-family:tahoma, geneva, arial, sans-serif;font-weight:bold;"><?php echo $_smarty_tpl->getVariable('bing_title')->value;?>
</h3>
		<div id="PG_bingmaps_map" style="position:relative;"></div>
	</div>
 </div>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('map_info')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
    <input type="hidden" id="map_key" name="map_key" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['credential'];?>
" />
    <input type="hidden" id="center_point" name="center_point" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['center_point'];?>
" />
   
    <input type="hidden" id="map_location" name="map_location" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_location'];?>
" />
    <input type="hidden" id="map_size" name="map_size" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_size'];?>
" />
    <input type="hidden" id="height" name="height" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['height'];?>
" />
    <input type="hidden" id="width" name="width" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['width'];?>
" />
    <input type="hidden" id="map_zoom" name="map_zoom" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_zoom'];?>
" />
    <input type="hidden" id="map_view" name="map_view" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_view'];?>
" />
    <input type="hidden" id="map_dashboard" name="map_dashboard" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_dashboard'];?>
" />
          
    
<?php }} ?>


<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('map_info2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
    <input type="hidden" id="map_type" name="map_type" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_type'];?>
" />
    <input type="hidden" id="map_dyn_title" name="map_dyn_title" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_dyn_title'];?>
" />
    <input type="hidden" id="map_dyn_desc" name="map_dyn_desc" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['map_dyn_desc'];?>
" />

<?php }} ?>
    

