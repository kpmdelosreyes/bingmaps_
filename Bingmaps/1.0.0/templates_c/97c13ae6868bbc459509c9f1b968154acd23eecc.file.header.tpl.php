<?php /* Smarty version Smarty-3.0.6, created on 2011-12-09 10:39:53
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14617287074ee174f90f32a1-07200764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1323398391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14617287074ee174f90f32a1-07200764',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Bing Map</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

            
            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jquery')->value;?>
"></script>
            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('emulation')->value;?>
"></script>
           <script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3"></script>
            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
js/bingmap.front.js"></script>
           <![if !IE]><script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
js/atlascompat.js"></script><![endif]>
	   
    </head>
    <body>
