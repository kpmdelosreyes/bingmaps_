<?php /* Smarty version Smarty-3.0.6, created on 2011-12-09 10:54:05
         compiled from "./templates/setup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1136977374ee1784d51a463-53703897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21a8d11e79c8a778d5f09c7f204a632362d12d7d' => 
    array (
      0 => './templates/setup.tpl',
      1 => 1323399242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1136977374ee1784d51a463-53703897',
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
        <script language="javascript" src="<?php echo $_smarty_tpl->getVariable('sCommonRoot')->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('emulation')->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jqueryuijs')->value;?>
"></script>
        <script language="javascript" src="<?php echo $_smarty_tpl->getVariable('sJsValidate')->value;?>
"></script>
        <script language="javascript" src="<?php echo $_smarty_tpl->getVariable('sPopUp')->value;?>
"></script>
        <script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3"></script>
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
js/bingmap.admin.js"></script> 
        <!--[if IE 6]>
		<link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
/css/ie6.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[endif]-->
	<!--[if IE 7]>
		<link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
/css/ie7.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->	
	<![if !IE]><script src="http://dev.virtualearth.net/mapcontrol/v6.3/js/atlascompat.js"></script><![endif]>
	<script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3"></script>
	
    </head>

    <body id="PG_Bingmaps_body">

        <input type="hidden" id="PLUGIN_NAME" value="<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
" /><!--pluginname-->
        <input type="hidden" id="PLUGIN_URL" value="<?php echo $_smarty_tpl->getVariable('PG_URL')->value;?>
" /><!--pluginurl-->
        <input type="hidden" id="directory" value="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
images/" />
        <input type="hidden" id="credentials" value="<?php echo $_smarty_tpl->getVariable('bingKey')->value;?>
" />
        
	<div id="PG_<?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
_form_container" style="margin-left:10px;">
        <?php echo $_smarty_tpl->getVariable('sScriptCrossDomain')->value;?>
	
            <!-- message box -->			
            <div class="msg_suc_box">
                <p><span>Saved successfully.</span></p>
            </div>

            <!-- Plugin Name -->
            
            <h3 style="display:inline-block;font-weight:normal">Plugin ID: <?php echo $_smarty_tpl->getVariable('PG_NAME')->value;?>
</h3>
            <p class="require"><span class="neccesary">*</span> Required</p>
            
            <div id="pg_map_wrap">
                <div id="pg_map_outer" >
                        <div id="PG_bingmaps_map"  class="pg_map_inner" ></div>  
				
			
			<!-- Arrow button for Minimap 
			<div id="minimap_arrow">
				<img src="images/mini_dwn_arrow.gif" alt="Open" />
				<!--<img src="images/mini_up_arrow.gif" alt="Close" />
			</div>-->
			 
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
				<th><label for="map_key">Bingmap API key</label><span class="neccesary">*</span></th>
				<td class="module_input_fix">
					<span><input type="text" id="pg_map_key" class="fix apikey" value = "<?php echo $_smarty_tpl->getVariable('bingKey')->value;?>
" /></span>
					<span class="input_msg_l" style="display:none;">e.g xn3UIFSOYdJWo-BkDA30BlNVnwGyb0000KlWq</span>
					<span class="input_msg_b">You can <a href="http://msdn.microsoft.com/en-us/library/ff428642.aspx" target="_blank">Create or view BingMaps key.</a></span>
				 </td>				
			</tr>
			<tr>
				<th><label for="pg_map_title">Title</label></th>
				<td>
					<span>
						<input type="text" id="pg_map_title" class="fix"  maxlength="100" value="<?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_title'])){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_title'];?>
<?php }else{ ?>My Custom Bing Maps<?php }?>" />
					</span>
					<span class="input_msg_b">Max 100 Characters.</span>
				 </td>				
			</tr>


			<tr>
				<th><label for="pg_location">Location</label><span class="neccesary">*</span></th>
				<td>
					<div class="suggestion_bx_wrap">
						<div class="s_input_bx">
						    <input type="text"  id="pg_location" class="fix" value="" onkeyup="FindSuggestions(this)" /> 
						    <div style='position:relative;z-index:100000'><span id='suggestionBox' style='display:none;'></span></div>
						</div>
                                            <span class="s_btn"><input type="button" class="btn" value="Search" onclick="Find();" /></span>
                                        </div>
					<div class="err_msg_b">Please enter The Address or Place name.</div>
                                        <span class="err_msg_c" style="display:none;">This field is required</span>
                                        <input type="hidden" id="center_point" name="searchResult" value=""/>
                                </td>				
			</tr>


			<tr>
				<th style="padding-top:40px"><label for="pg_map_size">Size</label></th>
				<td style="padding-top:40px">
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
                                        <option value="static" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_type'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_type']=="static"){?>selected<?php }?> <?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_type'])){?>selected<?php }?>>Static</option>
                                        <option value="dynamic" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_type'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_type']=="dynamic"){?>selected<?php }?>>Dynamic</option>
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
							<th class="th_title">
								<label for="title_pushpin">Title</label><span class="neccesary">*</span> 
								
							</th>
							<td class="td_title">
								<input type="text"  id="title_pushpin" class="fix" value="<?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_dyn_title'])){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_dyn_title'];?>
<?php }else{ ?>My Place<?php }?>" />
								<span class="err_msg_l" style="display:none;">This field is required</span>
								<span class="input_msg_b">Max 60 Characters.</span>
							</td>
						</tr>
						<tr>
							<th><label for="desc_pushpin">Description</label><span class="neccesary">*</span> </th>
							<td>
								<textarea row="50" col="80" id="desc_pushpin" class="fix" value="<?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_dyn_desc'])){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbm_dyn_desc'];?>
<?php }else{ ?>this is my place<?php }?>"></textarea>
								<span class="err_msg_2" style="display:none;">This field is required</span>
								<span class="input_msg_b">Max 150 Characters.</span>
							</td>
						</tr>
						<!--<tr>
							<th><label for="location_pushpin" style="display:none;">Locationlink</label></th>
							<td>
								<input type="text"  id="location_pushpin" class="fix" value="34.0522342, -118.2436849" />
								<span class="input_msg_b">Link to Pushpin Title.</span>
							</td>
                                                       
						</tr>-->
                                                <tr>
							<td colspan="2" class="pg_btn_wrap">
								 <input type="button" class="btn btn_align" value="Enter" onclick="ClickGeocode();return false;" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
			    <th class="padt2"><label for="pg_map_dashboard" >Dashboard</label></th>
			    <td class="padt2">
				<span class="db_rad_fix"><input type="radio"  id="radio_opt1" name = "dashboard" onclick="LoadNormal();" value="Normal" checked /><label for="radio_opt1">Normal</label></span>
                                <span class="db_rad_fix"><input type="radio"  id="radio_opt2" name = "dashboard" onclick="LoadSmall();" value="Small" /><label for="radio_opt2">Small</label></span>
                                <span class="db_rad_fix"><input type="radio"  id="radio_opt3" name = "dashboard" onclick="LoadTiny();" value="Tiny" /><label for="radio_opt3">Tiny</label></span>
                                <span class="db_rad_fix"><input type="radio"  id="radio_opt5" name = "dashboard" onclick="HideDashboard();" value="Hide" /><label for="radio_opt5">Hide Nav Control</label></span>
			</tr>
			<tr>
			    <th><label for="pg_map_view">View</label></th>
				<td>
                                    <select id="pg_map_view" class="u107" onchange="changeMapView(this.value)">
                                        <option value="1" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="1"){?>selected<?php }?><?php if (!isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])){?>selected<?php }?>> Road </option>
                                        <option value="2" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="2"){?>selected<?php }?>> Aerial </option>
                                        <option value="3" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="3"){?>selected<?php }?>> Birdseye </option>
                                        <option value="4" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="4"){?>selected<?php }?>> Hybrid </option>
                                        <option value="5" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="5"){?>selected<?php }?>> Shaded </option>
                                        <option value="6" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="6"){?>selected<?php }?>> Oblique  </option>
                                        <option value="7" <?php if (isset($_smarty_tpl->getVariable('aData',null,true,false)->value['pbm_map_view'])&&$_smarty_tpl->getVariable('aData')->value['pbm_map_view']=="7"){?>selected<?php }?>> BirdseyeHybrid </option>
                                       
                                    </select>
                                 </td>
			    </th>
			</tr>          
		</table>
	    </form>
		<!-- POPUP LAYER-->
		
                    <div class="pg_searchcontent_wrap" id="setCenter_popUp" style="display:none;"> 
                            <h3>Set Center</h3>
                            
                            <div class="msg_warn_box" style="display:none;"><p>asdfasdf</p></div>
                            <form class="pg_bingmap_searchcontent">
                                    <span id="pg_searchcontent_wrap">
                                            <label>Address or Place:</label>&nbsp;
                                            <input type="text" id="pg_bingmap_searchtext" class="pg_txtbox" name="pg_bingmap_searchtext" size="30" maxlength="300" validate="required" />
                                            <input class="btn_ly" type="button" value="Search" style="display:visible" onclick="Find();"/>
                                    </span>
                                    <div id="PG_bingmaps_map_veplacelistbody" class="pg_bingmap_searchresult"></div>	
                                    <div><a href="#" class="btn_ly" title="Set center" onclick="ClickGeocode();return false;">Set Center</a></div>
                            </form>
                    </div>
			

	<div class="tbl_lb_wide_btn">
		<a href="#" class="btn_apply" title="Save changes" onclick="saveSettings();">Save</a>  
		<a href="#" class="add_link" title="Reset to default" onclick="resetSetting();return false;">Reset to Default</a>
	</div>
  </div>
	
      
    </body>
</html>