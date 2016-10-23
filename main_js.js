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

var loc_array = [];
var details_array=[];
var data = null;
try {
        data = $.parseJSON($("#hospitalsList").html());
    } catch (e) {
        data = null;
    }
$.each(data, function(i, item) {
		loc_array.push({"lat":parseFloat(data[i].hopital_latitude),"lng":parseFloat(data[i].hopital_longitude) });
		details_array.push({ "nom":data[i].hopital_nom, "adresse":data[i].hopital_adresse, "type":data[i].urgences_type, "publicc": data[i].urgences_public, "tel": data[i].urgences_tel})
	});

console.dir(loc_array);
console.dir(details_array);

var loc_array_med_ge = [
    {lat: 48.866472, lng: 2.373403},
    {lat: 48.865563, lng: 2.357125},
    {lat: 48.865538, lng: 2.354996},
    {lat: 48.852429, lng: 2.373041},
    {lat: 48.866083, lng: 2.379682},
    {lat: 48.853200, lng: 2.367975},
    {lat: 48.843933, lng: 2.352804},
    {lat: 48.857691, lng: 2.354805},
    {lat: 48.869230, lng: 2.377246},
    {lat: 48.873047, lng: 2.362591}
];

var map;
var infowindow = null;

function myMap() {
	var pinImage = {
		url: "./map_marker.png",
		size: new google.maps.Size(300, 300),
		origin: new google.maps.Point(15, 15),
		anchor: new google.maps.Point(0, 0),
		scaledSize: new google.maps.Size(25, 25)	
	}
	
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
		center: new google.maps.LatLng(48.856614, 2.352222),
		zoom: 12
    }
    map = new google.maps.Map(mapCanvas, mapOptions);
	
	for (i = 0; i < loc_array_med_ge.length; ++i) {
		var marker = new google.maps.Marker({
			position: loc_array_med_ge[i],
			map: map,
			icon: pinImage
		})
	};

    for (i = 0; i < loc_array.length; ++i) {
		var marker = new google.maps.Marker({
			position: loc_array[i],
			map: map,
		});
		marker.details = details_array[i];
		
		console.dir(marker.position);
		
		
		google.maps.event.addListener(marker, 'click', function() {
			var marker = this;
			//alert("Tite for this marker is:" + this.title);
			if(infowindow){
				infowindow.close();
			}
			
			infowindow = new google.maps.InfoWindow({
				content: "<p>"+this.details.nom+"</p>" +
				"<p>"+this.details.adresse+"</p>" +
				"<p>"+this.details.type+"</p>" +
				"<p>"+this.details.publicc+"</p>" +
				"<p>"+this.details.tel+"</p>"
			  });
			infowindow.open(map, this);
		});
    }
}

