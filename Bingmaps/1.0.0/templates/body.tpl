<input type="hidden" id="credentials" value="{$bingKey}" />
<div style="width:{$width}px;display:inline-block;margin:0;padding:0;background:pink !important">
	<div style="width:{$width}px;height:{$height}px;margin:0;padding:5px 10px 55px 10px;display:inline-block;background:#eee;border:1px solid #ddd">
		<h3 id="pg_map_title" style="margin-bottom:10px;font-size:15px;font-family:tahoma, geneva, arial, sans-serif;font-weight:bold;">{$bing_title}</h3>
		<div id="PG_bingmaps_map" style="position:relative;"></div>
	</div>
 </div>
{foreach from=$map_info key=k item=v}
    
    <input type="hidden" id="map_key" name="map_key" value="{$v.credential}" />
    <input type="hidden" id="center_point" name="center_point" value="{$v.center_point}" />
   
    <input type="hidden" id="map_location" name="map_location" value="{$v.map_location}" />
    <input type="hidden" id="map_size" name="map_size" value="{$v.map_size}" />
    <input type="hidden" id="height" name="height" value="{$v.height}" />
    <input type="hidden" id="width" name="width" value="{$v.width}" />
    <input type="hidden" id="map_zoom" name="map_zoom" value="{$v.map_zoom}" />
    <input type="hidden" id="map_view" name="map_view" value="{$v.map_view}" />
    <input type="hidden" id="map_dashboard" name="map_dashboard" value="{$v.map_dashboard}" />
          
    
{/foreach}


{foreach from=$map_info2 key=k item=v}
    
    <input type="hidden" id="map_type" name="map_type" value="{$v.map_type}" />
    <input type="hidden" id="map_dyn_title" name="map_dyn_title" value="{$v.map_dyn_title}" />
    <input type="hidden" id="map_dyn_desc" name="map_dyn_desc" value="{$v.map_dyn_desc}" />

{/foreach}
    

