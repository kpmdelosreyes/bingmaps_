$(document).ready(function(){
    GetMap();

});

var map = null;

function GetMap()
{   
    map = new Microsoft.Maps.Map(document.getElementById("mapDiv"), {credentials: "Arb5_-yKdw4NdX2R9iZ5u4NbJoQu7LxyhomXO8LW4eO4Sa4iAAihUl2T18LQ_NR5", mapTypeId: Microsoft.Maps.MapTypeId.road});
}

