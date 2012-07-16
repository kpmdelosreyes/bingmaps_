<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
        <title>Administrator</title>
        <link href="{$sPgDir}/css/plugin.css" rel="stylesheet" type="text/css" media="screen" />	
        <link href="{$jqueryuicss}" rel="stylesheet" type="text/css" media="screen" />
       
        
        <script type="text/javascript" src="{$jquery}"></script>
        <script language="javascript" src="{$sCommonRoot}"></script>
        <script type="text/javascript" src="{$emulation}"></script>
        <script type="text/javascript" src="{$jqueryuijs}"></script>
        <script language="javascript" src="{$sJsValidate}"></script>
        <script language="javascript" src="{$sPopUp}"></script>
        <script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3"></script>
        
        <script type="text/javascript" src="{$sPgDir}js/bingmap.admin.js"></script> 
        <!--[if IE 6]>
		<link href="{$sPgDir}/css/ie6.css" rel="stylesheet" type="text/css" media="screen" />
	<!--[endif]-->
	<!--[if IE 7]>
		<link href="{$sPgDir}/css/ie7.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->	
	<![if !IE]><script src="http://dev.virtualearth.net/mapcontrol/v6.3/js/atlascompat.js"></script><![endif]>
	<script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3"></script>
	
    </head>

    <body id="PG_Bingmaps_body">

        <input type="hidden" id="PLUGIN_NAME" value="{$PG_NAME}" /><!--pluginname-->
        <input type="hidden" id="PLUGIN_URL" value="{$PG_URL}" /><!--pluginurl-->
        <input type="hidden" id="directory" value="{$sPgDir}images/" />
        <input type="hidden" id="credentials" value="{$bingKey}" />
        
	<div id="PG_{$PG_NAME}_form_container" style="margin-left:10px;">
        {$sScriptCrossDomain}	
            <!-- message box -->			
            <div class="msg_suc_box">
                <p><span>Saved successfully.</span></p>
            </div>

            <!-- Plugin Name -->
            
            <h3 style="display:inline-block;font-weight:normal">Plugin ID: {$PG_NAME}</h3>
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
	    
	    <form id="PG_{$PG_NAME}_form" >
		 <table border="0" cellspacing="0" class="table_input_vr" >
			<colgroup>
			    <col width="115px" />
			    <col width="*" />
			</colgroup>
			<tr>
				<th><label for="map_key">Bingmap API key</label><span class="neccesary">*</span></th>
				<td class="module_input_fix">
					<span><input type="text" id="pg_map_key" class="fix apikey" value = "{$bingKey}" /></span>
					<span class="input_msg_l" style="display:none;">e.g xn3UIFSOYdJWo-BkDA30BlNVnwGyb0000KlWq</span>
					<span class="input_msg_b">You can <a href="http://msdn.microsoft.com/en-us/library/ff428642.aspx" target="_blank">Create or view BingMaps key.</a></span>
				 </td>				
			</tr>
			<tr>
				<th><label for="pg_map_title">Title</label></th>
				<td>
					<span>
						<input type="text" id="pg_map_title" class="fix"  maxlength="100" value="{if isset($aData.pbm_title)}{$aData.pbm_title}{else}My Custom Bing Maps{/if}" />
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
				    <option value="300x300" {if isset($aData.pbm_size) && $aData.pbm_size == "300x300"}selected{/if}>Small (300 X 300)</option>
				    <option value="425x350" {if isset($aData.pbm_size) && $aData.pbm_size == "425x350"}selected{/if}>Medium (425 X 350)</option>
				    <option value="640x480" {if isset($aData.pbm_size) && $aData.pbm_size == "640x480"}selected{/if}{if !isset($aData.pbm_size)}selected{/if}>Large (640 X 480)</option>
				    <option value="custom" {if isset($aData.pbm_size) && $aData.pbm_size == "custom"}selected{/if}> Custom </option>
				</select>
                                    <input class="btn" id="pg_{$PG_NAME}_preview" type="button" value="Preview" style="display:none;" onclick="customSetSize();" />

				<!-- Visible if Custom is selected -->

				<div id="custom_mapsize" class="selected_wrap" style="display:none">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><span class="neccesary">*</span><label for="custom_width">Width</label></td>
                                                <td>
                                                    <input id="custom_width" name="custom_width" class="fix2" type="text" size="2" maxlength="4" value="{if !isset($aData.pbm_width)}640{else}{$aData.pbm_width}{/if}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="neccesary">*</span><label for="custom_height">Height</label>&nbsp;</td>
                                                <td>
                                                    <input id="custom_height" name="custom_height" class="fix2" type="text" size="2" maxlength="4" value="{if !isset($aData.pbm_height)}480{else}{$aData.pbm_height}{/if}" />
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div> 

			</tr>

			<tr>
			    <th class="padt1"><label for="PG_{$PG_NAME}_zoom">Zoom</label></th>
			    <td class="padt1">
                                <select title="select rows" class="rows" id="PG_{$PG_NAME}_zoom" onchange="SetZoom(this.value);">
                                    {section name=i start=1 loop=22}
                                         <option value="{$smarty.section.i.index}" {if isset($aData.pbm_zoom)}{if $aData.pbm_zoom == $smarty.section.i.index}selected{/if}{else}{if $smarty.section.i.index == "8"}selected{/if}{/if} > {$smarty.section.i.index} </option>
                                    {/section}
                                </select>
			    </td>
			</tr>
			<tr>
			    <th><label for="map_type">Map Type</label></th>
				<td>
                                    <select id="map_type" class="u107" onchange="setmapType();">
                                        <option value="static" {if isset($aData.pbm_map_type) && $aData.pbm_map_type == "static"}selected{/if} {if !isset($aData.pbm_map_type)}selected{/if}>Static</option>
                                        <option value="dynamic" {if isset($aData.pbm_map_type) && $aData.pbm_map_type == "dynamic"}selected{/if}>Dynamic</option>
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
								<input type="text"  id="title_pushpin" class="fix" value="{if isset($aData.pbm_dyn_title)}{$aData.pbm_dyn_title}{else}My Place{/if}" />
								<span class="err_msg_l" style="display:none;">This field is required</span>
								<span class="input_msg_b">Max 60 Characters.</span>
							</td>
						</tr>
						<tr>
							<th><label for="desc_pushpin">Description</label><span class="neccesary">*</span> </th>
							<td>
								<textarea row="50" col="80" id="desc_pushpin" class="fix" value="{if isset($aData.pbm_dyn_desc)}{$aData.pbm_dyn_desc}{else}this is my place{/if}"></textarea>
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
                                        <option value="1" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "1"}selected{/if}{if !isset($aData.pbm_map_view)}selected{/if}> Road </option>
                                        <option value="2" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "2"}selected{/if}> Aerial </option>
                                        <option value="3" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "3"}selected{/if}> Birdseye </option>
                                        <option value="4" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "4"}selected{/if}> Hybrid </option>
                                        <option value="5" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "5"}selected{/if}> Shaded </option>
                                        <option value="6" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "6"}selected{/if}> Oblique  </option>
                                        <option value="7" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "7"}selected{/if}> BirdseyeHybrid </option>
                                       
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