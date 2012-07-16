var map = "null";
var locations = "null";
var pixel = "null";
var clickEvent = "null";
var LL = "null";
var credentials = $("#credentials").val();
var geocodeURL = "http://dev.virtualearth.net/REST/v1/Locations/";


$(document).ready(function(){
   $(".msg_suc_box").hide();
   $('#PG_Bingmaps_body').resizeIframe();
   PageLoad();
   LoadNormal();

});



var MiniMapSize = VEMiniMapSize.Small; // can also be set to VEMiniMapSize.Large

function PageLoad()
{
    // Load the Map on the page when the page loads
    map = new VEMap('PG_bingmaps_map');
    map.SetCredentials(credentials);
    
  
        
    map.LoadMap(new VELatLong(47.6, -122.33), 8, VEMapStyle.Road);
    // Attach our onresize event handler
    map.AttachEvent("onresize", MapResize);   
    minmap();
}

function minmap()
{

    // Show the Mini Map
    map.ShowMiniMap(0,0,MiniMapSize);
    
    // Align the position of the Mini Map where we want it
    RealignMiniMap();
}

function AddPin()
{  
    var title_pushpin = $("#title_pushpin").val();
    var description_pushpin = $("textarea#desc_pushpin").val();
    
    var center = map.GetCenter();
    var pin = map.AddPushpin(center);
    pin.SetTitle(title_pushpin);
    pin.SetDescription(description_pushpin);
}

function ClearInfoBoxStyles()
{
    map.ClearInfoBoxStyles();
}

function SetInfoBoxStyles()
{
    map.SetInfoBoxStyles();
}




function LoadNormal()
{
    
    ShowDashboard();
    changeMapView();
    
    map = new VEMap('PG_bingmaps_map');
    map.SetDashboardSize(VEDashboardSize.Normal);
    map.LoadMap();
    minmap();
    
}

function LoadSmall()
{
    
    ShowDashboard();
    changeMapView();
    
    map = new VEMap('PG_bingmaps_map');
    map.SetDashboardSize(VEDashboardSize.Small);
    map.LoadMap();
    minmap();
    
    
}

function LoadTiny()
{
   
    ShowDashboard();
    changeMapView();
    
    map = new VEMap('PG_bingmaps_map');
    map.SetDashboardSize(VEDashboardSize.Tiny);
    map.LoadMap();
    minmap();
  
    
}

function ShowDashboard()
{
    PageLoad();
    map.ShowDashboard();
  
}


function HideDashboard()
{
    changeMapView();
    map.HideDashboard();
}


function MapResize(e)
{
    // When the map is resized, Realign the position of the Mini Map
    RealignMiniMap();
}

function RealignMiniMap()
{
    // Realign the position of the Mini Map so it appears
    // where we want it - The Upper Right Corner
    var minimap = document.getElementById("MSVE_minimap");
    var xoffset = (GetMapWidth() - minimap.offsetWidth);
    map.ShowMiniMap(xoffset, 0, MiniMapSize);
    
    /// Hide the Mini Map resizer so the Mini Map cannot be resized
    document.getElementById("MSVE_minimap_resize").style.display = "none";
}

function GetMapWidth()
{   
    // Get the Width of the Map as an integer
    return document.getElementById("PG_bingmaps_map").offsetWidth;
}
function GetMapHeight()
{
    // Get the Height of the Map as an integer
    return document.getElementById("PG_bingmaps_map").offsetHeight;
}


function StartGeocoding( address )
{
   map.Find(null,    // what
              address, // where
              null,    // VEFindType (always VEFindType.Businesses)
              null,    // VEShapeLayer (base by default)
              null,    // start index for results (0 by default)
              null,    // max number of results (default is 10)
              null,    // show results? (default is true)
              null,    // create pushpin for what results? (ignored since what is null)
              null,    // use default disambiguation? (default is true)
              null,    // set best map view? (default is true)
              GeocodeCallback);  // call back function
}

function GeocodeCallback (shapeLayer, findResults, places, moreResults, errorMsg)
{
    
   var map_type = $("#map_type").val();
   var map_dyn_title = $("#title_pushpin").val();
   var map_dyn_desc = $("textarea#desc_pushpin").val(); 
   
   $.ajax({
            url : 'setup.php',
            type : 'POST',
            dataType: 'html',
            data : 
            {
                requestType : 'saveThis',
                map_type : map_type,
                dyn_title : map_dyn_title,
                dyn_desc : map_dyn_desc

            }, 
            success : function(data)
            {
                
            }

        });
    
   
   
   // if there are no results, display any error message and return
   if(places == null)
   {
      alert( (errorMsg == null) ? "There were no results. Please filled the location box." : errorMsg );
      return;
   }

   var bestPlace = places[0];
   
   // Add pushpin to the *best* place
   var location = bestPlace.LatLong;
   
   var newShape = new VEShape(VEShapeType.Pushpin, location);
   
   var desc = "Latitude: " + location.Latitude + "<br>Longitude:" + location.Longitude;
   $("#center_point").val(location.Latitude+', '+location.Longitude);
   
       if(map_type=="static")
       {
          newShape.SetDescription(desc);
          newShape.SetTitle(bestPlace.Name);
           
       }
       else if(map_type=="dynamic")
       {
            if(map_dyn_title == "")
            {
                $(".err_msg_l").show();
            }
            else
            {
                $(".err_msg_l").hide();
            }

            if(map_dyn_desc == "")
            {
                $(".err_msg_2").show();
            }
            else
            {
                $(".err_msg_2").hide();
            }
            
          newShape.SetDescription(map_dyn_desc);
          newShape.SetTitle(map_dyn_title);
           
       }
   

   map.AddShape(newShape);
   
   
   
}

function ClickGeocode()
{
    
    
    var location = $("#pg_location").val();
    //map.Geocode(document.getElementById('pg_bingmap_searchtext').value, findCallback);
    map.Clear();
    address = $("#pg_location").val();
    StartGeocoding(address);
    //AddPin();
}
      

function SetZoom(zoomValue)
{
    map.SetZoomLevel(zoomValue);
}


function ResizeMap()
{
    if ((document.getElementById('custom_width').value != "" && document.getElementById('custom_height').value != "") && (!isNaN(document.getElementById('custom_width').value) && !isNaN(document.getElementById('custom_height').value)))
    {
       map.Resize(document.getElementById('custom_width').value, document.getElementById('custom_height').value);
       PG_bingmaps_map.style.width = document.getElementById('custom_width').value + "px";
       PG_bingmaps_map.style.height = document.getElementById('custom_height').value + "px";
    }
    else
    {
       alert("Please enter a valid numeric value.");
    }
}

function OnResize(e)
{
    alert(e.eventName + " has been called.");
    return 0;
}



function customSetSize()
{
    var PG_NAME = $("#PLUGIN_NAME").val();
    
        $("#pg_"+PG_NAME+"_preview").show();
        var height = $.trim($("#custom_height").val());
        var width = $.trim($("#custom_width").val());
        var inputReg = /^[0-9]+$/;
		
        height = (height <= 480) ? height : 480;
        width = (width <= 640) ? width : 640;

	
        var newWidth= (640 - width);
        var newHeight = (480 - height);

        $(".pg_map_inner").css({position:'absolute', border:'1px solid #ddd',
        left: (newWidth)/2,
        top: (newHeight)/2 });

	 RealignMiniMap();	

        if (height == "" || !inputReg.test(height)){
                $("#custom_height").val("");
                $("#custom_height").focus();
        }
        else if (width == "" || !inputReg.test(width)){
                $("#custom_width").val("");
                $("#custom_width").focus();
        }
        else {
                $("#PG_bingmaps_map").css("width", width);
                $("#PG_bingmaps_map").css("height",height);

               map.setView({width: width, height: height});
                RealignMiniMap();
			  
        }
     
         $("#PG_"+PG_NAME+"_form").resizeIframe({delay : 100});
    
}



function setmapType()
{
    var map_type = $("#map_type").val();

    if(map_type == "dynamic"){
        $('#pushpin_details').resizeIframe();
        $("#pushpin_details").show();
        
    }
    else
    {
       $("#pushpin_details").hide();
    }
}

function setSize()
{
    var PG_NAME = $("#PLUGIN_NAME").val();
    var map_size = $("#pg_map_size").val();
    var outer_max_width = $('#pg_map_outer').width();
    var outer_max_height = $('#pg_map_outer').height();
 
    if(map_size != "custom") {
            var aDimension = map_size.split("x");
            $("#PG_bingmaps_map").css("width", aDimension[0]);
            $("#PG_bingmaps_map").css("height", aDimension[1]);
            $("#pg_"+PG_NAME+"_preview").hide();
            $("#custom_mapsize").hide();
			
			/* -- additional code for vertical and horizontal centering, working in all major Browser --*/

			var new_left = (outer_max_width - aDimension[0])/2;
			var new_top = (outer_max_height - aDimension[1])/2;
			
			$(".pg_map_inner").css({position:'absolute',
                                                left: new_left,
                                                top: new_top
			 });
                         
              RealignMiniMap();         	
                       
    } else {
            $("#custom_mapsize").show();
            this.customSetSize();
           
    }


    $("#PG_"+PG_NAME+"_form").resizeIframe();
}




function changeMapView(mapType)
{
    mapType = parseInt(mapType);
       
        switch(mapType){
                case 1:
                        sType = map.SetMapStyle(VEMapStyle.Road);
                        break;
                case 2:
                        sType = map.SetMapStyle(VEMapStyle.Aerial);
                        break;
                case 3:
                        sType = map.SetMapStyle(VEMapStyle.Birdseye);
                        break;   
                case 4:
                        sType = map.SetMapStyle(VEMapStyle.Hybrid);  
                        break;
                case 5:
                        sType = map.SetMapStyle(VEMapStyle.Shaded);  
                        break;
                case 6:
                        sType = map.SetMapStyle(VEMapStyle.Oblique);  
                        break;
                case 7:
                        sType = map.SetMapStyle(VEMapStyle.BirdseyeHybrid);  
                        break;
        }

     
}

function saveSettings()
{
   var map_key = $("#pg_map_key").val();
   var map_title = $("#pg_map_title").val();
   var map_loc = $("#pg_location").val();
   var map_size = ($("#pg_map_size").val() == "custom") ? $.trim($("#custom_width").val())+"x"+$.trim($("#custom_height").val()) : $("#pg_map_size").val();
   var map_zoom = $("#PG_Bingmaps_zoom").val();
   var map_view = $("#pg_map_view").val();
   var map_type = $("#map_type").val();
   var map_dashboard = $("input[@name=dashboard]:checked").val();
   var map_size_height= $("#custom_height").val();
   var map_size_width = $("#custom_width").val();
   var searchResult = $("#center_point").val();
   
   
   
  if(map_key =="")
   {
       $(".input_msg_l").show();
       
   }
   else if(map_loc =="")
   {
       $(".err_msg_c").show();
       
   }
   
   else if(map_type == "dynamic")
   {
       if(title_pushpin == ""){
           $(".err_msg_l").show();
           
       }
       else
       {
           $(".err_msg_l").hide();
       }
       
       if(desc_pushpin == "")
       {
           $(".err_msg_2").show();
       }
       else
       {
           $(".err_msg_2").hide();
       }
       
       
   }
   
   else{    
         $.ajax({
            url : 'setup.php',
            type : 'POST',
            dataType: 'html',
            data : 
            {
                requestType : 'saveData',
                searchResult : searchResult,
                map_key : map_key,
                map_title : map_title,
                map_loc : map_loc,
                map_size : map_size,
                map_type : map_type,
                height : map_size_height,
                width : map_size_width,
                map_zoom : map_zoom,
                map_view : map_view,
                map_dashboard : map_dashboard

            }, 
            success : function()
            {
                $(".msg_suc_box").show().delay(3000).fadeOut('slow', function(){ $('#PG_Bingmaps_body').resizeIframe();});
                
            }

        });

   }
   
}


function FindSuggestions(pg_location)
{
    var location = pg_location.value;
    if(location && location != "")
    {
        map.Find(null, location, null, null, null, null, false, null, false, false, findCallback);
    }
    else
    {
        document.getElementById('suggestionBox').style.display = 'none';
    }
}

function findCallback(layer, resultsArray, places, hasMore, veErrorMessage)
{    
    var suggestionHTML = [];

    if(places)
    {
        for(var i=0;i < places.length; i++)
        {
            var parts = places[i].Name.split(",");

            suggestionHTML.push("<div style='width:100%;cursor:pointer;' onclick=\"SelectSuggestion('");
            suggestionHTML.push(places[i].Name, "')\">");

            //bold first word to make it look nice
            suggestionHTML.push("<b>", parts[0], "</b>,");

            for(var j=1; j < parts.length; j++)
            {
                if(j != parts.length-1)
                {
                    suggestionHTML.push(parts[j], ",");
                }
                else
                {
                    suggestionHTML.push(parts[j]);
                }
            }

            suggestionHTML.push("</div>");
        }
    }

    document.getElementById('suggestionBox').style.display = "";
    document.getElementById('suggestionBox').innerHTML = suggestionHTML.join("");
}

//functionality for when user clicks on a suggestion
function SelectSuggestion(suggestion)
{
    document.getElementById('suggestionBox').innerHTML = "";
    document.getElementById('suggestionBox').style.display = 'none';
    document.getElementById('pg_location').value = suggestion;
}

//Functionality for find button
function Find()
{
    var location = document.getElementById('pg_location').value;
    document.getElementById('suggestionBox').style.display = 'none';

    if(location && location != "")
    {
        map.Find(null, location);
    }
    
    ClickGeocode();
}
        
function resetSetting()
{
    $("#pg_map_key").val($("#credentials").val());
    $("#pg_map_title").val("My Custom Bing Maps");
    $("#pg_location").val("Los Angeles, CA");
    $("#pg_map_size").val("640x480");
    $("#PG_Bingmap_zoom").val("8");
    $("#pg_map_view").val("1");
    $("input[@id=radio_opt1]:checked").val();

    setmapType();
}

function MakeMapSmaller()
{
    var width = GetMapWidth();
    var height = GetMapHeight();
    map.Resize(width - 50, height);
}