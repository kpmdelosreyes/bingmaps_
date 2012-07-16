<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
        <title>Administrator</title>
        <link href="{$sPgDir}/css/plugin.css" rel="stylesheet" type="text/css" media="screen" />	
        <link href="{$jqueryuicss}" rel="stylesheet" type="text/css" media="screen" />
       
        <script type="text/javascript" src="{$jquery}"></script>
        <script type="text/javascript" src="{$emulation}"></script>
        <script type="text/javascript" src="{$jqueryuijs}"></script>
        <script language="javascript" src="{$sJsValidate}"></script>
        <script language="javascript" src="{$sPopUp}"></script>
        <script charset="UTF-8" type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
        
        <script type="text/javascript" src="{$sPgDir}js/bingmap.admin.js"></script> 
        <!--[if IE 6]>
		<link href="{$sPgDir}/css/ie6.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
		
	<![endif]-->
	
    </head>

    <body>

        <input type="hidden" id="PLUGIN_NAME" value="{$PG_NAME}" /><!--pluginname-->
        <input type="hidden" id="PLUGIN_URL" value="{$PG_URL}" /><!--pluginurl-->

	<div id="PG_{$PG_NAME}_form_container" style="margin-left:10px;">
        {$sScriptCrossDomain}	
            <!-- message box -->			
            <div class="msg_suc_box">
                <p><span>Saved successfully.</span></p>
            </div>

            <!-- Plugin Name -->
           <h3 class="extension_plugin_name" style="display:inline-block;">{$PG_NAME}</h3>
            <h3>Settings</h3>
            <!--<p> Plugin ID: {$PG_NAME} </p>-->
            <p class="require"><span class="neccesary">*</span> Required</p>
            
            <div id="pg_map_wrap">
                <div id="pg_map_outer" >
                            <div id="PG_{$PG_NAME}_map"  class="pg_map_inner" ></div>  
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
					<span><input type="text" id="pg_map_title" class="fix" value="{if isset($aData.pbm_title)}{$aData.pbm_title}{else}My Custom Bing Maps{/if}" /></span><span class="input_msg_b">Max 250 Characters.</span>
				 </td>				
			</tr>


			<tr>
				<th><label for="pg_location">Location</label><span class="neccesary">*</span></th>
				<td>
					<span><input type="text"  id="pg_location" class="fix" value="{if isset($aData.pbm_address)}{$aData.pbm_address}{else}Los Angeles, CA{/if}" /> <input type="button" class="btn" value="Set Center" onclick="ClickGeocode();return false;" /></span>
					<span class="input_msg_b">Please enter The Address or Place name.</span>
                                       <input type="hidden" id="searchResult" name="searchResult" value="{if isset($aData.pbm_center_point)}{$aData.pbm_center_point}{else}34.0522342, -118.2436849{/if}"/>
                                </td>				
			</tr>


			<tr>
			    <th><label for="pg_map_size">Size</label></th>
				<td class="padt2">
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
                                        <option value="static" {if isset($aData.pbm_mapType) && $aData.pbm_mapType == "static"}selected{/if} {if !isset($aData.pbm_mapType)}selected{/if}>Static</option>
                                        <option value="dynamic" {if isset($aData.pbm_mapType) && $aData.pbm_mapType == "dynamic"}selected{/if}>Dynamic</option>
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
                                        <option value="1" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "1"}selected{/if}{if !isset($aData.pbm_map_view)}selected{/if}> Road </option>
                                        <option value="2" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "2"}selected{/if}> Aerial </option>
                                        <option value="3" {if isset($aData.pbm_map_view) && $aData.pbm_map_view == "3"}selected{/if}> Birdseye </option>
                                    </select>
                                 </td>
			    </th>
			</tr>
			<tr>
			    <th class="padt2"><label for="pg_map_dashboard">Dashboard</label></th>
			    <td class="padt2">
				<select title="select rows" class="rows" id="pg_map_dashboard">
				    <option value="1" {if isset($aData.pbm_dashboard) && $aData.pbm_dashboard == "1"}selected{/if}{if !isset($aData.pbm_dashboard)}selected{/if}>Normal</option>
				    <option value="2" {if isset($aData.pbm_dashboard) && $aData.pbm_dashboard == "2"}selected{/if}>Small</option>
				    <option value="3" {if isset($aData.pbm_dashboard) && $aData.pbm_dashboard == "3"}selected{/if}>Tiny</option>
				    <option value="4" {if isset($aData.pbm_dashboard) && $aData.pbm_dashboard == "4"}selected{/if}>Hide</option>
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