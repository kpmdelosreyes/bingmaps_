$.getScript('js/xbrowser.js', function() {
    alert('Load was performed.');
});
var map = "null";
var pinInfobox = "null";
var credentials = "Arb5_-yKdw4NdX2R9iZ5u4NbJoQu7LxyhomXO8LW4eO4Sa4iAAihUl2T18LQ_NR5";
var geocodeURL = "http://dev.virtualearth.net/REST/v1/Locations/";


$(document).ready(function(){
    
   $(".msg_suc_box").hide();
   
   Microsoft.Maps.loadModule('Microsoft.Maps.Overlays.Style', { callback: GetMap });
   SearchCountry();
   
});

 function GetMap()
 {

    var PG_NAME = $("#PLUGIN_NAME").val();
    
    var mapOptions = {credentials: credentials, 
                        mapTypeId: Microsoft.Maps.MapTypeId.road,
                        zoom: 0,
                        height:480,
                        width: 640,
                        showScalebar: true,
                        showMapTypeSelector: true, 
                        enableClickableLogo: false,
                        enableSearchLogo: false,
                        showCopyright: false,
                        showDashboard: true,
                        backgroundColor : new Microsoft.Maps.Color(Math.round(255*Math.random()),
                        Math.round(255*Math.random()),
                        Math.round(255*Math.random()),
                        Math.round(255*Math.random())),
                        customizeOverlays: true,
                        showBreadcrumb: true
                      }; 
                      

    // Initialize the map
    map = new Microsoft.Maps.Map(document.getElementById("PG_"+PG_NAME+"_map"),mapOptions);
    miniMap();
    infoboxGetOptions();
    /*for pushpin with location*/
   /* dataLayer = new Microsoft.Maps.EntityCollection();
    map.entities.push(dataLayer);

    var infoboxLayer = new Microsoft.Maps.EntityCollection();
    map.entities.push(infoboxLayer);

    infobox = new Microsoft.Maps.Infobox(new Microsoft.Maps.Location(0, 0), { visible: false, offset: new Microsoft.Maps.Point(0, 20) });
    infoboxLayer.push(infobox);

    AddData();*/
    //pushpins();
 }

function infoboxGetOptions()
{
    var title_pushpin = $.trim($("#title_pushpin").val());
    var description_pushpin = $('textarea#desc_pushpin').val();
    var location_pushpin = $.trim($("#location_pushpin").val());
    
    var infoboxOptions = {width :200, height :100, showCloseButton: true, zIndex: 0, offset:new Microsoft.Maps.Point(10,0), showPointer: true, title: title_pushpin, description: description_pushpin}; 
    var defaultInfobox = new Microsoft.Maps.Infobox(map.getCenter(), infoboxOptions );    
    map.entities.push(defaultInfobox); 
    var title=defaultInfobox.getTitle(); 
    var loc=defaultInfobox.getLocation(); 
    var height=defaultInfobox.getHeight(); 
    var width=defaultInfobox.getWidth(); 
    var isvisible=defaultInfobox.getVisible(); 
    var desc=defaultInfobox.getDescription();   
    
    alert('Now Setting Location'); 
    defaultInfobox.setLocation(new Microsoft.Maps.Location(47.4, -122.33));
}
 
 
 
/*
function AddData()
{
    var title_pushpin = $.trim($("#title_pushpin").val());
    var desc = $('textarea #desc_pushpin').val();
    
    var pin1 = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(0, 30));
    pin1.Title = title_pushpin;
    pin1.Description = desc;
    Microsoft.Maps.Events.addHandler(pin1, 'click', displayInfobox);
    dataLayer.push(pin1);

    var pin2 = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(0, -30));
    pin2.Title = "This is Pin 2";
    pin2.Description = "Pin 2 description";
    Microsoft.Maps.Events.addHandler(pin2, 'click', displayInfobox);
    dataLayer.push(pin2);
}
*/
/*
function displayInfobox(e) {
  if (e.targetType == 'pushpin') {
      infobox.setLocation(e.target.getLocation());
      infobox.setOptions({ visible: true, title: e.target.Title, description: e.target.Description });
  }
}
*/
 
 /*
 function pushpins()
 { 
     
    var title_pushpin = $.trim($("#title_pushpin").val());
    var desc = $('textarea #desc_pushpin').val();
    alert(desc);
     // Retrieve the location of the map center 
    var center = map.getCenter();

   // Add a pin to the center of the map
    var pin = new Microsoft.Maps.Pushpin(center, {text: '1', width: 50, height: 50, draggable: true}); 

    // Create the infobox for the pushpin
    pinInfobox = new Microsoft.Maps.Infobox(pin.getLocation(), 
                {title: title_pushpin, 
                 description: desc, 
                 visible: false, 
                 offset: new Microsoft.Maps.Point(0,15)});

    // Add handler for the pushpin click event.
    Microsoft.Maps.Events.addHandler(pin, 'click', displayInfobox);

    // Hide the infobox when the map is moved.
    Microsoft.Maps.Events.addHandler(map, 'viewchange', hideInfobox);


    // Add the pushpin and infobox to the map
    map.entities.push(pin);
    map.entities.push(pinInfobox);
    
    updatePushpinLocation();

 }

 function displayInfobox(e)
 {
    pinInfobox.setOptions({ visible:true });
 }                    
*/
 function hideInfobox(e)
 {
    pinInfobox.setOptions({ visible: false });
 }
 
 function updatePushpinLocation()
{
    var pushpin= new Microsoft.Maps.Pushpin(map.getCenter(), null); 
    map.entities.push(pushpin); 
    pushpin.setLocation(new Microsoft.Maps.Location(47, -87), 2000);
    map.setView({center: new Microsoft.Maps.Location(47, -87)});
    alert('pushpin location updated'); 
}

 
 function ClickGeocode(credentials)
 {
    map.getCredentials(MakeGeocodeRequest);
 }

 function MakeGeocodeRequest(credentials)
 {

    var geocodeRequest = geocodeURL + document.getElementById("pg_location").value + "?output=json&jsonp=GeocodeCallback&key=" + credentials;

    CallRestService(geocodeRequest);
 }

 function GeocodeCallback(result) 
 {
    alert("Found location: " + result.resourceSets[0].resources[0].name);

    if (result &&
           result.resourceSets &&
           result.resourceSets.length > 0 &&
           result.resourceSets[0].resources &&
           result.resourceSets[0].resources.length > 0) 
    {
       // Set the map view using the returned bounding box
       var bbox = result.resourceSets[0].resources[0].bbox;
       var viewBoundaries = Microsoft.Maps.LocationRect.fromLocations(new Microsoft.Maps.Location(bbox[0], bbox[1]), new Microsoft.Maps.Location(bbox[2], bbox[3]));
       map.setView({ bounds: viewBoundaries});

       // Add a pushpin at the found location
       var location = new Microsoft.Maps.Location(result.resourceSets[0].resources[0].point.coordinates[0], result.resourceSets[0].resources[0].point.coordinates[1]);
       var pushpin = new Microsoft.Maps.Pushpin(location);
       map.entities.push(pushpin);
    }
 }

function CallRestService(request) 
{
    var script = document.createElement("script");
    script.setAttribute("type", "text/javascript");
    script.setAttribute("src", request);
    document.body.appendChild(script);
}

function SetZoom(zoomValue)
{
    map.setView({zoom : parseInt(zoomValue)});  
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
        $(".pg_map_inner").css({position:'absolute', border:0,
        left: (newWidth)/2,
        top: (newHeight)/2 });

	

        if (height == "" || !inputReg.test(height)){
                $("#custom_height").val("");
                $("#custom_height").focus();
        }
        else if (width == "" || !inputReg.test(width)){
                $("#custom_width").val("");
                $("#custom_width").focus();
        }
        else {
                $("#pg_"+PG_NAME+"_map").css("width", width);
                $("#pg_"+PG_NAME+"_map").css("height",height);

               map.setView({width: width, height: height});
        }
        
         $("#PG_"+PG_NAME+"_form").resizeIframe({delay : 100});

}

function setSize()
{
    var PG_NAME = $("#PLUGIN_NAME").val();
    var map_size = $("#pg_map_size").val();
    var outer_max_width = $('#pg_map_outer').width();
    var outer_max_height = $('#pg_map_outer').height();
 
    if(map_size != "custom") {
            var aDimension = map_size.split("x");
            $("#PG_"+PG_NAME+"_map").css("width", aDimension[0]);
            $("#PG_"+PG_NAME+"_map").css("height", aDimension[1]);
            $("#pg_"+PG_NAME+"_preview").hide();
            $("#custom_mapsize").hide();
			
			/* -- additional code for vertical and horizontal centering, working in all major Browser --*/

			var new_left = (outer_max_width - aDimension[0])/2;
			var new_top = (outer_max_height - aDimension[1])/2;
			
			$(".pg_map_inner").css({position:'absolute',
                                                left: new_left,
                                                top: new_top
			 });
                         miniMap();
                       	
                       
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
                        sType = Microsoft.Maps.MapTypeId.road;
                        break;
                case 2:
                        sType = Microsoft.Maps.MapTypeId.aerial;
                        break;
                case 3:
                        sType = Microsoft.Maps.MapTypeId.birdseye;
                        break;     
        }

       map.setView({mapTypeId : sType});
              
}

function changeAPI()
{
    var PG_NAME = $("#PLUGIN_NAME").val();
    var PG_URL = $("#PLUGIN_URL").val();
    var credential = this.credential;
    var checkbox = $('#PG_'+PG_NAME+'_change_api').is(':checked');

    if (checkbox == true) {
            $("#PG_"+PG_NAME+"_api").val("").focus();
            $("#PG_"+PG_NAME+"_api").removeClass ("apikey");
            $("#PG_"+PG_NAME+"_api").prop('readonly', false);
    }
    if (checkbox == false) {
            if($("#PG_"+PG_NAME+"_api").val() == "")
            {
                $("#PG_"+PG_NAME+"_api").val(credential);
            }
            
            $("#PG_"+PG_NAME+"_api").prop ("class","fix apikey");
            $("#PG_"+PG_NAME+"_api").prop('readonly', true);
    }

}

function openSearch()
{
    var PG_NAME = $("#PLUGIN_NAME").val();
    var searchText = $.trim($("#pg_bingmap_searchtext").val());

    $("#pg_bing_dialog-search").popUp({width : 400});
    $("#pg_bingmap_searchtext").val($.trim($("#PG_"+PG_NAME+"_cpoint").val()));
   // this.search("#pg_bingmap_searchcontent");
       
    
}

function SearchCountry()
{
    $("#pg_location").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: geocodeURL,
                dataType: "jsonp",
                data: {
                    key: credentials,
                    q: request.term
                },
                jsonp: "jsonp",
                success: function (data) {
                    var result = data.resourceSets[0];
                    if (result) {
                        if (result.estimatedTotal > 0) {
                            response($.map(result.resources, function (item) {
                                return {
                                    data: item,
                                    label: item.name + ' (' + item.address.countryRegion + ')',
                                    value: item.name
                                }
                            }));
                        }
                    }
                }
            });
        },
        minLength: 1,
        change: function (event, ui) {
            if (!ui.item)
                $("#pg_location").val('');
        },
        select: function (event, ui) {
            displaySelectedItem(ui.item.data);
        }
    });    
    
    
    
}


function displaySelectedItem(item) {
    $("#searchResult").empty().append('Result: ' + item.name).append(' (Latitude: ' + item.point.coordinates[0] + ' Longitude: ' + item.point.coordinates[1] + ')');
}

function setmapType()
{
    var map_type = $("#map_type").val();
    
    if(map_type == "dynamic"){
        $("#pushpin_details").show();
        
    }
    else
    {
       $("#pushpin_details").hide();
    }
}


function saveSettings()
{
   var map_key = $("#pg_map_key").val();
   var map_title = $("#pg_map_title").val();
   var map_loc = $("#pg_location").val();
   var map_size = $("#pg_map_size").val();
   var map_zoom = $("#PG_Bingmap_zoom").val();
   var map_type = $("#map_type").val();
   var map_view = $("#pg_map_view").val();
   var map_dashboard = $("#pg_map_dashboard").val();
   
   if(map_key =="")
   {
       alert("Bingmap API key is required.");
       
   }
   if(map_loc =="")
   {
       alert("Location is required.");
       
   }
   
   if(map_type == "dynamic"){
       
       var title_pushpin = $.trim($("#title_pushpin").val());
       var desc = $.trim($("#desc_pushpin").val());
       
       if(title_pushpin == ""){
           alert("Title is required.");
           
       }
       
       if(desc == "")
       {
           alert("Description is required.");
       }
       
       
   }
   
   else{
       
     $.ajax({
        url : 'setup.php',
        type : 'POST',
        dataType: 'json',
        data : 
        {
            requestType : "saveData",
            map_key : map_key,
            map_title : map_title,
            map_loc : map_loc,
            map_size : map_size,
            map_zoom : map_zoom,
            map_type : map_type,
            map_view : map_view,
            map_dashboard : map_dashboard
                      
        }, 
        success : function (data)
        {
               alert(data);
              // $(".msg_suc_box").show(); 
        }
			
    });
      
      
       
   }
   
}

function miniMap()
{
   map.entities.remove(miniMap); 
   var mapElem = $(map.getRootElement());
    // Create DIV and add to Main Map
    var miniMapDiv = $('<div>').
        addClass('MiniMap').
        appendTo(mapElem);
    // Position to the Top Right corner
    miniMapDiv.css({
        border:'2px solid black',
        position: 'absolute',
        top: 0,
		//left: ((new_width - miniMapDiv.width()) - 5)
        left:((mapElem.width() - miniMapDiv.width()) - 5)
    });
	
    // Initialize Mini Map
    var miniMap = new Microsoft.Maps.Map(miniMapDiv[0], {
        credentials: credentials,
        showCopyright: false, showDashboard: false, showLogo: false, showScalebar: false, mapTypeId: Microsoft.Maps.MapTypeId.road, height: 150, width:150
    });
    // Attach Event Handler to Sync Mini Map with Main Map
    var syncMiniMap = function () {
        miniMap.setView({
            center: map.getCenter(),
            zoom: map.getZoom() - 9
        });
        window.status = map.getCenter();
    };
    Microsoft.Maps.Events.addHandler(map, "viewchange", syncMiniMap);
    // Sync Mini Map
    syncMiniMap();
    
    map.ShowMiniMap(200, 100);            
    document.getElementById('MSVE_minimap_resize').style.display = "none";
}



function FindSuggestions(searchBox)
{
    var location = searchBox.value;
    if(location && location != "")
    {
        map.Find(null, location, null, null, null, null, false, null, false, false, findCallback);
     }
    else
    {
        document.getElementById('pg_location').style.display = 'none';
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

    document.getElementById('pg_location').style.display = "";
    document.getElementById('pg_location').innerHTML = suggestionHTML.join("");
}

//functionality for when user clicks on a suggestion
function SelectSuggestion(suggestion)
{
    document.getElementById('pg_location').innerHTML = "";
    document.getElementById('pg_location').style.display = "none";
    document.getElementById('pg_location').value = suggestion;
}