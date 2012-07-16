<?php /* Smarty version Smarty-3.0.6, created on 2011-11-10 16:17:31
         compiled from "./templates/setup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15270772564ebb889b58aa16-63810590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21a8d11e79c8a778d5f09c7f204a632362d12d7d' => 
    array (
      0 => './templates/setup.tpl',
      1 => 1320913033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15270772564ebb889b58aa16-63810590',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
        <title>Administrator</title>
        <link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
/css/plugin.css" rel="stylesheet" type="text/css" media="screen" />	
        <link href="<?php echo $_smarty_tpl->getVariable('jqueryuicss')->value;?>
" rel="stylesheet" type="text/css" media="screen" />
       
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jquery')->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('emulation')->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jqueryuijs')->value;?>
"></script>
        <script language="javascript" src="<?php echo $_smarty_tpl->getVariable('sJsValidate')->value;?>
"></script>
        <script language="javascript" src="<?php echo $_smarty_tpl->getVariable('sPopUp')->value;?>
"></script>
        <script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
js/bingmap.admin.js"></script> 
        <!--[if IE 6]>
		<link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
/css/ie6.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
		
	<![endif]-->
	
    </head>

    <body>

        <input type="hidden" id="PLUGIN_NAME" value="<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
" /><!--pluginname-->
        <input type="hidden" id="PLUGIN_URL" value="<?php echo $_smarty_tpl->getVariable('PG_URL')->value;?>
" /><!--pluginurl-->

	<div id="PG_<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
_form_container" style="margin-left:10px;">
        <?php echo $_smarty_tpl->getVariable('sScriptCrossDomain')->value;?>
	
            <!-- message box -->			
            <div class="msg_suc_box">
                <p><span>Saved successfully.</span></p>
            </div>

            <!-- Plugin Name -->
           <h3 class="extension_plugin_name" style="display:inline-block;"><?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
</h3>
            <h3>Settings</h3>
            <!--<p> Plugin ID: <?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
 </p>-->
            <p class="require"><span class="neccesary">*</span> Required</p>
            
            <div id="pg_map_wrap">
                <div id="pg_map_outer" >
                            <div id="PG_<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
_map"  class="pg_map_inner" ></div>  
                </div>
            </div>
	 <!-- OPTION INPUT AREA -->
	    
	    <form id="PG_<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
_form" >
		 <table border="0" cellspacing="0" class="table_input_vr" >
			<colgroup>
			    <col width="115px" />
			    <col width="*" />
			</colgroup>
			<tr>
				<th><label for="map_key">Bingmaps API key</label><span class="neccesary">*</span></th>
				<td class="module_input_fix">
					<span><input type="text" id="pg_map_key" class="fix apikey"  /></span>
					<span class="input_msg_l" style="display:none;">e.g xn3UIFSOYdJWo-BkDA30BlNVnwGyb0000KlWq</span>
					<span class="input_msg_b">You can <a href="http://msdn.microsoft.com/en-us/library/ff428642.aspx" target="_blank">Create or view BingMaps key.</a>.</span>
				 </td>				
			</tr>
			<tr>
				<th><label for="pg_map_title">Map Title</label></th>
				<td>
					<span><input type="text" id="pg_map_title" class="fix" value="<?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_title'])){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_title'];?>
<?php }else{ ?>My Custom Bing Maps<?php }?>" /></span><span class="input_msg_b">Max 250 Characters.</span>
				 </td>				
			</tr>


			<tr>
				<th><label for="pg_location">Location</label><span class="neccesary">*</span></th>
				<td>
					<span><input type="text"  id="pg_location" class="fix" value="<?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_address'])){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_address'];?>
<?php }else{ ?>Los Angeles, CA<?php }?>" /> <input type="button" class="btn" value="Set Center" onclick="ClickGeocode();return false;" /></span>
					<span class="input_msg_b">Please enter The Address or Place name.</span>
                                       <input type="hidden" id="searchResult" name="searchResult" value="<?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_center_point'])){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_center_point'];?>
<?php }else{ ?>34.0522342, -118.2436849<?php }?>"/>
                                </td>				
			</tr>


			<tr>
			    <th><label for="pg_map_size">Size</label></th>
				<td class="padt2">
				<select title="select rows" class="rows" id="pg_map_size" onchange="setSize();">
				    <option value="300x300" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_size'])&&$_smarty_tpl->getVariable('aData')->value['pbm_size']=="300x300"){?>selected<?php }?>>Small (300 X 300)</option>
				    <option value="425x350" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_size'])&&$_smarty_tpl->getVariable('aData')->value['pbm_size']=="425x350"){?>selected<?php }?>>Medium (425 X 350)</option>
				    <option value="640x480" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_size'])&&$_smarty_tpl->getVariable('aData')->value['pbm_size']=="640x480"){?>selected<?php }?><?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_size'])){?>selected<?php }?>>Large (640 X 480)</option>
				    <option value="custom" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_size'])&&$_smarty_tpl->getVariable('aData')->value['pbm_size']=="custom"){?>selected<?php }?>> Custom </option>
				</select>
                                    <input class="btn" id="pg_<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
_preview" type="button" value="Preview" style="display:none;" onclick="customSetSize();" />

				<!-- Visible if Custom is selected -->

				<div id="custom_mapsize" class="selected_wrap" style="display:none">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><span class="neccesary">*</span><label for="custom_width">Width</label></td>
                                                <td>
                                                    <input id="custom_width" name="custom_width" class="fix2" type="text" size="2" maxlength="4" value="<?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_width'])){?>640<?php }else{ ?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_width'];?>
<?php }?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="neccesary">*</span><label for="custom_height">Height</label>&nbsp;</td>
                                                <td>
                                                    <input id="custom_height" name="custom_height" class="fix2" type="text" size="2" maxlength="4" value="<?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_height'])){?>480<?php }else{ ?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_height'];?>
<?php }?>" />
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div> 

			</tr>

			<tr>
			    <th class="padt1"><label for="PG_<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
_zoom">Zoom</label></th>
			    <td class="padt1">
                                <select title="select rows" class="rows" id="PG_<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
_zoom" onchange="SetZoom(this.value);">
                                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=22) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                                         <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_zoom'])){?><?php if ($_smarty_tpl->getVariable('aData')->value['pbm_zoom']==$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']){?>selected<?php }?><?php }else{ ?><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']=="8"){?>selected<?php }?><?php }?> > <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
 </option>
                                    <?php endfor; endif; ?>
                                </select>
			    </td>
			</tr>
			<tr>
			    <th><label for="map_type">Map Type</label></th>
				<td>
                                    <select id="map_type" class="u107" onchange="setmapType();">
                                        <option value="static" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_mapType'])&&$_smarty_tpl->getVariable('aData')->value['pbm_mapType']=="static"){?>selected<?php }?> <?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_mapType'])){?>selected<?php }?>>Static</option>
                                        <option value="dynamic" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_mapType'])&&$_smarty_tpl->getVariable('aData')->value['pbm_mapType']=="dynamic"){?>selected<?php }?>>Dynamic</option>
                                    </select>
                                 </td>
			</tr>

			<!-- Visible only when Dynamic option is Clicked -->
			<tr id="pushpin_details" class="pg_pushpin" style="display:none" >
				<th><label for="push_pin">Pushpin</label></th>
				<td class="pg_pushpin_td">
					<table  border="0" cellspacing="0" class="table_input_vr pg_pushpin_tbl">
						<colgroup>
						    <col width="115px" />
						    <col width="*" />
						</colgroup>
						<tr class="tr_title">
							<th class="th_title"><label for="title_pushpin">Title</label></th>
							<td class="td_title">
								<input type="text"  id="title_pushpin" class="fix" value="title" />
								<span class="input_msg_b">Max 60 Characters.</span>
							</td>
						</tr>
						<tr>
							<th><label for="desc_pushpin">Description</label></th>
							<td>
								<textarea row="50" col="80" id="desc_pushpin" class="fix" ></textarea>
								<span class="input_msg_b">Max 150 Characters.</span>
							</td>
						</tr>
						<tr>
							<th><label for="location_pushpin">Locationlink</label></th>
							<td>
								<input type="text"  id="location_pushpin" class="fix" value="34.0522342, -118.2436849" />
								<span class="input_msg_b">Link to Pushpin Title.</span>
							</td>
                                                       
						</tr>
                                                <tr>
							<td colspan="2" class="pg_btn_wrap">
								 <input type="button" class="btn btn_align" value="Enter" onclick="infoboxGetOptions();return false;" />
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
			    <th><label for="pg_map_view">View</label></th>
				<td>
                                    <select id="pg_map_view" class="u107" onchange="changeMapView(this.value)">
                                        <option value="1" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="1"){?>selected<?php }?><?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])){?>selected<?php }?>> Road </option>
                                        <option value="2" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="2"){?>selected<?php }?>> Aerial </option>
                                        <option value="3" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="3"){?>selected<?php }?>> Birdseye </option>
                                    </select>
                                 </td>
			    </th>
			</tr>
			<tr>
			    <th class="padt2"><label for="pg_map_dashboard">Dashboard</label></th>
			    <td class="padt2">
				<select title="select rows" class="rows" id="pg_map_dashboard">
				    <option value="1" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_dashboard'])&&$_smarty_tpl->getVariable('aData')->value['pbm_dashboard']=="1"){?>selected<?php }?><?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_dashboard'])){?>selected<?php }?>>Normal</option>
				    <option value="2" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_dashboard'])&&$_smarty_tpl->getVariable('aData')->value['pbm_dashboard']=="2"){?>selected<?php }?>>Small</option>
				    <option value="3" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_dashboard'])&&$_smarty_tpl->getVariable('aData')->value['pbm_dashboard']=="3"){?>selected<?php }?>>Tiny</option>
				    <option value="4" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_dashboard'])&&$_smarty_tpl->getVariable('aData')->value['pbm_dashboard']=="4"){?>selected<?php }?>>Hide</option>
				</select>
			    </td>
			</tr>
		</table>
	    </form>



	<div class="tbl_lb_wide_btn">
		<a href="#" class="btn_apply" title="Save changes" onclick="saveSettings();">Save</a>  
		<a href="#" class="add_link" title="Reset to default">Reset to Default</a>
	</div>
  </div>
	
      
    </body>
</html>