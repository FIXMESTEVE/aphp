/* console.log("coucou");
var console = {
    panel: $(parent.document.body).append('<div>'),
    log: function(m){
        this.panel.prepend('<div>'+m+'</div>');
    }       
};

var loc_array = [];

$(document).ready(function(){
	$("#buttonSubmit", $("#left")).click(function(){
		loc_array = $.getJSON("./urgences.php").done(function(data) {
			console.log("coucou");
			console.log(data);
			console.log("lol");
		}).fail(function( jqxhr, textStatus, error ) {
			var err = textStatus + ", " + error;
			console.log( "Request Failed: " + err );
		});
	});
});


	var map;

	function myMap() {
		var mapCanvas = document.getElementById("map");
		var mapOptions = {
		center: new google.maps.LatLng(48.856614, 2.352222),
		zoom: 12
		}
		map = new google.maps.Map(mapCanvas, mapOptions);
				
		for (i = 0; i < loc_array.length; ++i) {
		var marker = new google.maps.Marker({
			position: loc_array[i],
			map: map,
		});
		marker.addListener('click', function() {
			map.setZoom(8);
			map.setCenter(marker.getPosition());})
		}
	}
 */
console.log("lol");

var loc_array = [
    {lat: 48.853954, lng: 2.348331},
    {lat: 48.882265, lng: 2.352834},
    {lat: 48.873790, lng: 2.367845},
];

var map;

function myMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
	center: new google.maps.LatLng(48.856614, 2.352222),
	zoom: 12
    }
    map = new google.maps.Map(mapCanvas, mapOptions);

    for (i = 0; i < loc_array.length; ++i) {
	var marker = new google.maps.Marker({
	    position: loc_array[i],
	    map: map,
	});
	marker.addListener('click', function() {
	    map.setZoom(8);
	    map.setCenter(marker.getPosition());})
    }
}

