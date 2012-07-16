var map = "null";
var locations = "null";
var pixel = "null";
var clickEvent = "null";
var LL = "null";
var credentials = $("#credentials").val();
var MiniMapSize = VEMiniMapSize.Small; // can also be set to VEMiniMapSize.Large

jQuery.noConflict();
jQuery(document).ready(function($){
    funcList();
});


function funcList()
{
    getData();
    PageLoad();
    ResizeMap();
    ClickGeocode();
    mapStyle();
    
          
}

function PageLoad()
{
   // var map_view = $("#map_view").val();
    var map_zoom = $("#map_zoom").val();
    var map_size = $("#map_size").val();
    
    var center_point = new VELatLong(34.0540, -118.2370);

    // Load the Map on the page when the page loads
    map = new VEMap('PG_bingmaps_map');
    map.SetCredentials(credentials);
        
    dashSize();
    
    map.LoadMap(center_point, map_zoom);
     // Attach our onresize event handler
    map.AttachEvent("onresize", MapResize);   
    minmap();
    
    
}

function dashSize()
{
    var map_dashboard = $("#map_dashboard").val();
    
    if(map_dashboard=="Normal")
    {
     
        map.ShowDashboard();
        map.SetDashboardSize(VEDashboardSize.Normal);
    }
    else if(map_dashboard=="Small")
    {
        
        map.ShowDashboard();
        map.SetDashboardSize(VEDashboardSize.Small);
    }
    else if(map_dashboard=="Tiny")
    {
       
        map.ShowDashboard();
        map.SetDashboardSize(VEDashboardSize.Tiny);
    }
    else
    {
         map.HideDashboard();
    } 
    
}


function mapStyle()
{
    var map_view = $("#map_view").val();
    
    if(map_view=="1")
    {
        map.SetMapStyle(VEMapStyle.Road);
    }
    else if(map_view=="2")
    {
        map.SetMapStyle(VEMapStyle.Aerial);
    }
    else if(map_view=="3")
    {
        map.SetMapStyle(VEMapStyle.Birdseye);
    }
    else if(map_view=="4")
    {
        map.SetMapStyle(VEMapStyle.Hybrid);
    }
    else if(map_view=="5")
    {
        map.SetMapStyle(VEMapStyle.Shaded);
    }
    else if(map_view=="6")
    {
        map.SetMapStyle(VEMapStyle.Oblique);
    }
    else
    {
        map.SetMapStyle(VEMapStyle.BirdseyeHybrid);
    }
    
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
    var map_dyn_title = $("#map_dyn_title").val();
    var map_dyn_desc = $("#map_dyn_desc").val();
    alert(map_dyn_desc);
    var center = map.GetCenter();
    var pin = map.AddPushpin(center);
    pin.SetTitle(map_dyn_title);
    pin.SetDescription(map_dyn_desc);
}

function ClearInfoBoxStyles()
{
    map.ClearInfoBoxStyles();
}

function SetInfoBoxStyles()
{
    map.SetInfoBoxStyles();
}


function getData()
{
    var map_key = $("#map_key").val();
    var map_title = $("#map_title").val();
    var map_location = $("#map_location").val();
    var map_size = $("#map_size").val();
    var height = $("#height").val();
    var width = $("#width").val();
    var map_zoom = $("#map_zoom").val();
    var map_type = $("#map_type").val();
    var map_dyn_title = $("#map_dyn_title").val();
    var map_dyn_desc = $("#map_dyn_desc").val();
    var map_view = $("#map_view").val();
    var map_dashboard = $("#map_dashboard").val();
        
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
   var map_dyn_title = $("#map_dyn_title").val();
   var map_dyn_desc = $("#map_dyn_desc").val(); 
   
   // if there are no results, display any error message and return
   if(places == null)
   {
      alert( (errorMsg == null) ? "There were no results" : errorMsg );
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
          newShape.SetDescription(map_dyn_desc);
          newShape.SetTitle(map_dyn_title);
           
       }
   

   map.AddShape(newShape);
   
   
   
}

function ClickGeocode()
{

    //map.Geocode(document.getElementById('pg_bingmap_searchtext').value, findCallback);
    map.Clear();
    address = $("#map_location").val();
    StartGeocoding(address);
    
}


function ResizeMap()
{
    var map_size = $("#map_size").val();
    var aSize = map_size.split('x');

   document.getElementById("PG_bingmaps_map").style.width =  aSize[0] +"px";
   document.getElementById("PG_bingmaps_map").style.height =  aSize[1] +"px";
   
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


