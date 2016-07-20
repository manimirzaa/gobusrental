// JavaScript Document
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();
var map;
var map_center;
var map_zoom;

var mapsearchUrl;


//initialize Google Map API onload
// initialize();

	
/*var gdmap = function () {

    if ($('#module').val() == 'car') {
        mapsearchUrl = "/car/mapsearch?";
    } else if ($('#module').val() == 'event') {
        mapsearchUrl = "/event/mapsearch?";
    } else {
        mapsearchUrl = "/mapsearch?";
    }

    //call on form submit
    $("#myForm").submit(function(){
        $("#loader").html('&nbsp;<span class="label label-info">Loading...</span>');
        calcRoute();
        return false;
    });

    // Hack for loading Map properly when opened from Modal box
    $('#mapModal').on('shown', function () {
        map_center = map.getCenter();
        google.maps.event.trigger(map, "resize");

        map.setCenter(map_center);
        map.setZoom(map_zoom);
    });

    var qsFrom = getParameterByName('from');
    var qsTo = getParameterByName('to') !== "" ? getParameterByName('to') : qsFrom;
    var qsWP = getParameterByName('wp');

    if (qsFrom === "") {
        getLocation();
    }

    if (qsFrom !== "" || qsTo !== "") {
        initialize();

        $("#fromAddress").val(qsFrom);
        $("#toAddress").val(qsTo);
        $('#aGD').attr("href", mapsearchUrl + (getParameterByName('standalone') != '' ? 'standalone=1&' : '') + (getParameterByName('f') != '' ? 'f=' + getParameterByName('f') + '&' : '') + 'from=' + $("#toAddress").val());

        if (qsWP !== "") {
            var arrWP = qsWP.split("@@");

            for (var i = 0; i < arrWP.length; i++) {
                add_waypoint(arrWP[i]);
            }
        }

        $("#loader").html('&nbsp;<span class="label label-info">Loading...</span>');
        calcRoute();
    }
}
var getParameterByName = function(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.href);
    if (results == null)
        return "";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}*/

/*function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else { x.innerHTML = "Geolocation is not supported by this browser."; }
}

function showPosition(position) {
    $("#fromAddress").val(position.coords.latitude + ", " + position.coords.longitude);
    calcRoute();
}*/

// Initialize google map object
function initialize() {
  	var mapOptions = {
  	    center: new google.maps.LatLng(25.788905, -80.22649),
      	zoom: 12,
      	mapTypeId: google.maps.MapTypeId.ROADMAP
  	};
  	map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);	
  	apply_autocomplete($("#fromAddress")[0]);
  	apply_autocomplete($("#toAddress")[0]);
}

// Apply Autocomplete API
function apply_autocomplete(input){
	var options = {
	  	types: ['geocode']
	};
	var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.bindTo('bounds', map);
}


// Calculate route and directions
function calcRoute() {
	$('#directions').html('');
	//create waypoints array & fill it with all locations entered by user
	var waypts = new Array();

	var start_address = $("#fromAddress").val();
	var end_address = $("#toAddress").val();

	start_address = start_address !== "" ? start_address : end_address;
	end_address = end_address !== "" ? end_address : start_address;

	$('input[name="toWaypoints[]"]').each(function()
	{
		waypts.push({
            location:$(this).val(),
            stopover:true
        });
	});

    // Create a Request variable for Map
    var request = {
        origin: start_address,
        destination: end_address,
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };

    // Execute the Route Method to generate Direction Route on Map
    directionsService.route(request, function(response, status) {
        var directionsDiv = document.getElementById('directions');

        // console.log(response);

        if (status == google.maps.DirectionsStatus.OK) {
            //directionsDiv.innerHTML = "";
            directionsDisplay.setMap(map);
            directionsDisplay.setDirections(response);
            directionsDisplay.setPanel(directionsDiv);

            var route = response.routes[0];

            // calculate total distance and duration
            // generate list of locations to print
            var distance = 0;
            var time = 0;
            var locations_list = '<ol>';
            for (var i=0; i<route.legs.length; i++) {
                var theLeg = route.legs[i];
                locations_list += '<li>' + theLeg.start_address + '</li>' ;
                distance += theLeg.distance.value;
                time += theLeg.duration.value;
            }
            locations_list += '<li>' + theLeg.end_address + '</li>' ;
            locations_list += '</ol>';

            var iWayP = [];
            //console.log(response);
            $.each(route.waypoint_order, function () {
                iWayP.push(this.location);
                //console.log(this.location);
            });
            //console.log(iWayP.join('##'));

            $("#locations").html('<h4 class="margin-bottom-s">Directions for :</h4>' + locations_list);

            $('#directions_send').attr('href', '/message/new/?type=gmap&from=' + route.legs[0].start_location.k + ',' + route.legs[0].start_location.D + '&to=' + route.legs[0].end_location.k + ',' + route.legs[0].end_location.D + '&wp=' + iWayP.join('##'));
            $('#directions_iphone').attr('href', 'http://maps.apple.com/maps?daddr=' + route.legs[0].end_location.k + ',' + route.legs[0].end_location.D);
            $('#directions_android').attr('href', 'https://maps.google.com/maps?daddr=' + route.legs[0].end_location.k + ',' + route.legs[0].end_location.D);
            $('#directions_waze').attr('href', 'waze://?ll=' + route.legs[0].end_location.k + ',' + route.legs[0].end_location.D + '&navigate=yes');
            $('#btncontainer').removeClass('hide');
            // $(directionsDiv).append(
            //     '<div class="btn-container">' +
            //         '<a href="#" class="button blue fixed" onclick="window.print();">PRINT</a>' +
            //         '&nbsp;<a href="/message/new/?type=gmap&from=' + response.kc.origin + '&to=' + response.kc.destination + '&wp=' + iWayP.join('##') + '" class="button blue fixed mfp-link mfp-iframe">SEND</a>' +
            //         '&nbsp;<a href="http://maps.apple.com/maps?daddr=' + response.kc.destination + '" target="_blank" class="button green fixed">IPHONE</a>' +
            //         '&nbsp;<a href="https://maps.google.com/maps?ll=' + response.kc.destination + '" target="_blank" class="button green fixed">ANDROID</a>' +
            //     '</div>' +
            //     '<br><h4>Your Route :</h4>'
            // );


            //display summary into summary block
            total_summary = '<div class="alert alert-success">';
            total_summary += '  <strong>Total Distance : </strong>' + showDistance(distance) + " ( about " + Math.round(time/60) + " minutes)";
            total_summary += '</div>';
			$("#summary").html(total_summary);
			
			
			var hours = Math.round( time / 3600);          
		    var minutes = Math.round(time/60) % 60;
			
			var distance_in_miles=showDistanceInMiles(distance);
			
			var duration_in_mins=Math.round(time/60);
			
			var duration_in_hours=Math.round(time/3600);
			
			var per_mile_cost=$('#multi_cities_per_mile_cost').val();
				
			var per_day_cost=$('#multi_cities_per_day_cost').val();
			
			var total_buses=$('#multi_cities_no_of_buses').val();
			
			var no_of_extra_drivers=$('#multi_cities_no_of_extra_drivers').val();
			
			var no_of_passenger=$('#multi_cities_no_of_passenger').val();
			
			var total_days=$('#multi_cities_total_days').val();
			
			var est_cost=distance_in_miles*per_mile_cost;
			
			/*var round_trip=est_cost*2;*/
			var round_trip=est_cost;
			
			$("#multi_cities_distance").val(distance_in_miles+ " miles");
			
			$('#multi_cities_drive').val(hours+" hours "+minutes+" mins");
			
			if(no_of_passenger!='')
			{
				var extra_drivers=no_of_extra_drivers;
			}
			else
			{
				if(duration_in_mins && duration_in_mins>600)
				{
					var e_d=duration_in_hours/10;
					var actual_e_d=Math.ceil(e_d);
					var extra_drivers=actual_e_d-1;
					$('#multi_cities_no_of_extra_drivers').val(extra_drivers);
				}
				else
				{
					var extra_drivers=0;
					$('#multi_cities_no_of_extra_drivers').val('');
				}
			}
			
			if(extra_drivers >0)
			{
				var extra_driver_cost=extra_drivers*250;
				$('#multi_cities_extra_driver_info').html('Each extra driver will cost $250').css('color','red');
			}
			else
			{
				var extra_driver_cost=0;
				$('#multi_cities_extra_driver_info').html('');
			}
			var total_days_cost=per_day_cost*total_days;
			if(total_days_cost>round_trip)
			{
				var final_cost=parseFloat(total_days_cost)+parseFloat(extra_driver_cost);
			}
			else
			{
				var final_cost=parseFloat(round_trip)+parseFloat(extra_driver_cost);
			}
			$('#multi_cities_cost').val(Math.round(final_cost*total_buses));
			$('#multi_cities_drive_in_min').val(duration_in_mins);
			$('#multi_cities_drive_in_hours').val(duration_in_hours);
			
			
            map_zoom = map.getZoom();
            $("#loader").html('');
        }
        else {
            var statusText = getDirectionStatusText(status);
            directionsDiv.innerHTML = "An error occurred - " + statusText;
        }
    });
}

// Show distance in different measurements
function showDistance(distance) {
    return Math.round(distance/100) / 10 + " km (" + Math.round((distance*0.621371192)/100) / 10 + " miles)";
}

function showDistanceInMiles(distance) {
    return Math.round((distance*0.621371192)/100) / 10 ;
}

// Get the Map direction status message
function getDirectionStatusText(status){
    switch(status){
        case google.maps.DirectionsStatus.INVALID_REQUEST :
            return "Invalid request";
        case google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED :
            return "Maximum waypoints exceeded";
        case google.maps.DirectionsStatus.NOT_FOUND :
            return "Not found";
        case google.maps.DirectionsStatus.OVER_QUERY_LIMIT :
            return "Over query limit";
        case google.maps.DirectionsStatus.REQUEST_DENIED :
            return "Request denied";
        case google.maps.DirectionsStatus.UNKNOWN_ERROR :
            return "Unknown error";
        case google.maps.DirectionsStatus.ZERO_RESULTS :
            return "Zero results";
        default:
            return status;
    }
}


// Add More waypoints

function add_waypoint(str) {
    str = str || "";
    waypoint_container = '<div class="guttered-s" style="width:100%; display:inline-block;">';
    waypoint_container += '<div class="col-md-6"><label for="points" class="control-label">Waypoints</label><div class="inner-addon left-addon"><i class="glyphicon glyphicon-map-marker"></i><input type="text" id="toWaypoints" name="toWaypoints[]" class="form-control to_waypoints" placeholder="Enter Location" required/></div></div>';
    waypoint_container += '<div class="col-md-6">';
    waypoint_container += ' <a href="#" onclick="return remove_waypoint(this);" class="btn btn-danger to_waypoints_remove" style="margin-top:24px;">Remove</a>';
    /*waypoint_container += '    <a href="#" onclick="return add_waypoint();" class="button link">Add Waypoints</a>';*/
    waypoint_container += '</div></div>';

    $('.source-container').before(waypoint_container);

    $('[name=toWaypoints\\[\\]]').each(function () {
        apply_autocomplete($(this)[0]);
    });

    return false;

}

// Remove waypoint
function remove_waypoint(obj){
	$(obj).parent().parent().remove();
	return false;
}
