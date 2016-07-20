<?php include(APPPATH.'/views/front/includes/header.php'); ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBI-2jfmKoU4QzkNpTePhnY_9OmgpJ4Tg4&libraries=places"></script>
<script src="<?php echo base_url('design/front');?>/js/main.js"></script>
<script src="<?php echo base_url('design/front');?>/js/script.min.js"></script>
<section class="section section-orange">
    <div class="container">
       <div class="row">
         <div class="well">
            <section class="section">
                <div class="row ">
    
                      <div class="col-md-12">
                         <h3 class="text-center"><i class="glyphicon glyphicon-edit"></i> Get A Quote!</h3>
                         <table class="table table-responsive">
                              <tbody>
                                  <tr>
                                      <th><i class="glyphicon glyphicon glyphicon-tower"></i> Company Name:</th>
                                      <td><p class="label label-default"><?php echo $company_bus_details->company_name;?></p></td>
                                      <th><i class="glyphicon glyphicon glyphicon-bed"></i> Bus Type:</th><td><?php echo $company_bus_details->bus_type;?></td>
                                      <th><i class="glyphicon glyphicon glyphicon-calendar"></i> Model:</th><td><?php echo $company_bus_details->manufacture_date;?></td>
                                      <th><i class="glyphicon glyphicon glyphicon-th"></i> No of Seats:</th><td><?php echo $company_bus_details->no_of_seat;?></td>
                                  </tr>
                               </tbody>
                          </table>
                      </div>
    
                </div>
            </section>
         </div>
       </div>
    </div>
</section>
<section class="section section-dark">
    <div class="container">
        <div class="row">
                 <div class="col-md-12">
                       <ul class="nav nav-pills" role="tablist">
                                <li role="presentation" class="active"><a href="#one_way" aria-controls="one_way" role="tab" data-toggle="tab">One Way/NS</a></li>
                                <li role="presentation"><a href="#round_trip" aria-controls="round_trip" role="tab" data-toggle="tab">Round Trip(Same Day)</a></li>
                                <li role="presentation"><a href="#multi_days" aria-controls="multi_days" role="tab" data-toggle="tab">Multi Days(One City)</a></li>
                                <li role="presentation"><a href="#multi_cities" aria-controls="multi_cities" role="tab" data-toggle="tab" id="resize">Multi Cities</a></li>
                       </ul>
                 </div>
                 
                 <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active fade in" id="one_way">
                          
                          <?php include(APPPATH.'/views/front/_one_way.php'); ?>
              
                      </div>
                      <div role="tabpanel" class="tab-pane fade in" id="round_trip">
                           
                           <?php include(APPPATH.'/views/front/_round_trip.php'); ?>
              
                      </div>
                      <div role="tabpanel" class="tab-pane fade in" id="multi_days">
              
                           <?php include(APPPATH.'/views/front/_multi_days_same_city.php'); ?>
                            
                      </div>
                      <div role="tabpanel" class="tab-pane fade in" id="multi_cities">
              
                           <?php include(APPPATH.'/views/front/_multi_cities.php'); ?>
                           
                      </div>
                  </div>
                  
        </div>
	</div>
</section>
<?php include(APPPATH.'/views/front/includes/footer.php'); ?>
<script type="text/javascript">
	var source, destination;
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	google.maps.event.addDomListener(window, 'load', function () {
		new google.maps.places.SearchBox(document.getElementById('txtSource'));
		new google.maps.places.SearchBox(document.getElementById('txtDestination'));
		directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
	});

	function GetRoute() {
		var miami = new google.maps.LatLng(25.7617, 80.1918);
		var mapOptions = {
			zoom: 7,
			center: miami
		};
		$('#map_div span').html('');
		$('#dvMap').removeClass('hidden');
		map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('dvPanel'));

		//*********DIRECTIONS AND ROUTE**********************//
		source = document.getElementById("txtSource").value;
		destination = document.getElementById("txtDestination").value;

		var request = {
			origin: source,
			destination: destination,
			travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function (response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});

		//*********DISTANCE AND DURATION**********************//
		var service = new google.maps.DistanceMatrixService();
		service.getDistanceMatrix({
			origins: [source],
			destinations: [destination],
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			avoidHighways: false,
			avoidTolls: false
		}, function (response, status) {
			if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS")            {
				var distance = response.rows[0].elements[0].distance.text;
				var distance_in_miles = (response.rows[0].elements[0].distance.value/1609.34).toFixed(0);
				var duration = response.rows[0].elements[0].duration.text;
				var duration_in_mins = (response.rows[0].elements[0].duration.value/60).toFixed(0);
				var duration_in_hours = (response.rows[0].elements[0].duration.value/3600).toFixed(0);
				var dvDistance = document.getElementById("dvDistance");
				dvDistance.innerHTML = "";
				dvDistance.innerHTML += "Distance: " + distance_in_miles+" miles ("+distance + ")<br />";
				dvDistance.innerHTML += "Duration: " + duration;
				
				var per_mile_cost=$('#per_mile_cost').val();
				
				var total_buses=$('#no_of_buses').val();
				
				var no_of_extra_drivers=$('#no_of_extra_drivers').val();
				
				var no_of_passenger=$('#no_of_passenger').val();
				
				var est_cost=distance_in_miles*per_mile_cost*total_buses;
				
				var dead_head=est_cost*2;
				
				$('#distance').val(distance_in_miles+" miles");
				
				$('#drive').val(duration);
				
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
						$('#no_of_extra_drivers').val(extra_drivers);
					}
					else
					{
						var extra_drivers=0;
						$('#no_of_extra_drivers').val('');
					}
				}
				
				if(extra_drivers >0)
				{
					var extra_driver_cost=extra_drivers*250;
					$('#extra_driver_info').html('Dead head included.<br>Each extra driver will cost $250').css('color','red');
				}
				else
				{
					var extra_driver_cost=0;
					$('#extra_driver_info').html('Dead head included').css('color','red');
				}
				
				var final_cost=parseFloat(dead_head)+parseFloat(extra_driver_cost);
				$('#cost').val(final_cost);
				$('#drive_in_min').val(duration_in_mins);
				$('#drive_in_hours').val(duration_in_hours);
				$('#dvDistance').removeClass('hidden');

			} 
			else 
			{
			   // alert("Unable to find the distance via road.");
				toastr.info('Unable to find the distance via road.');
			}
		});
	}
	
	/*************************************************************************************/
	
	var source, destination;
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	google.maps.event.addDomListener(window, 'load', function () {
		new google.maps.places.SearchBox(document.getElementById('round_txtSource'));
		new google.maps.places.SearchBox(document.getElementById('round_txtDestination'));
		directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
	});

	function RoundGetRoute() {
		var miami = new google.maps.LatLng(25.7617, 80.1918);
		var mapOptions = {
			zoom: 7,
			center: miami
		};
		$('#round_map_div span').html('');
		$('#round_dvMap').removeClass('hidden');
		map = new google.maps.Map(document.getElementById('round_dvMap'), mapOptions);
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('dvPanel'));

		//*********DIRECTIONS AND ROUTE**********************//
		source = document.getElementById("round_txtSource").value;
		destination = document.getElementById("round_txtDestination").value;

		var request = {
			origin: source,
			destination: destination,
			travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function (response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});

		//*********DISTANCE AND DURATION**********************//
		var service = new google.maps.DistanceMatrixService();
		service.getDistanceMatrix({
			origins: [source],
			destinations: [destination],
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			avoidHighways: false,
			avoidTolls: false
		}, function (response, status) {
			if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS")            {
				var distance = response.rows[0].elements[0].distance.text;
				var distance_in_miles = (response.rows[0].elements[0].distance.value/1609.34).toFixed(0);
				var duration = response.rows[0].elements[0].duration.text;
				var duration_in_mins = (response.rows[0].elements[0].duration.value/60*2).toFixed(0);
				var duration_in_hours = (response.rows[0].elements[0].duration.value/3600*2).toFixed(0);
				var dvDistance = document.getElementById("round_dvDistance");
				
				var hours = Math.floor( duration_in_mins / 60);          
				var minutes = duration_in_mins % 60;
				
				dvDistance.innerHTML = "";
				dvDistance.innerHTML += "Distance: " + distance_in_miles*2+" miles<br />";
				dvDistance.innerHTML += "Duration: " + hours+" hours "+minutes+" mins";
				
				
				var per_mile_cost=$('#round_per_mile_cost').val();
				
				var per_day_cost=$('#round_per_day_cost').val();
				
				var total_buses=$('#round_no_of_buses').val();
				
				var no_of_extra_drivers=$('#round_no_of_extra_drivers').val();
				
				var no_of_passenger=$('#round_no_of_passenger').val();
				
				var est_cost=distance_in_miles*per_mile_cost;
				
				var round_trip=est_cost*2;
				
				$('#round_distance').val((distance_in_miles*2)+" miles");
				
				$('#round_drive').val(hours+" hours "+minutes+" mins");
				
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
						$('#round_no_of_extra_drivers').val(extra_drivers);
					}
					else
					{
						var extra_drivers=0;
						$('#round_no_of_extra_drivers').val('');
					}
				}
				
				if(extra_drivers >0)
				{
					var extra_driver_cost=extra_drivers*250;
					$('#round_extra_driver_info').html('Each extra driver will cost $250').css('color','red');
				}
				else
				{
					var extra_driver_cost=0;
					$('#round_extra_driver_info').html('');
				}
				if(per_day_cost>round_trip)
				{
					var final_cost=parseFloat(per_day_cost)+parseFloat(extra_driver_cost);
				}
				else
				{
				    var final_cost=parseFloat(round_trip)+parseFloat(extra_driver_cost);
				}
				$('#round_cost').val(final_cost*total_buses);
				$('#round_drive_in_min').val(duration_in_mins);
				$('#round_drive_in_hours').val(duration_in_hours);
				$('#round_dvDistance').removeClass('hidden');

			} 
			else 
			{
			   // alert("Unable to find the distance via road.");
				toastr.info('Unable to find the distance via road.');
			}
		});
	}
	
	
	/*************************************************************************************/
	
	var source, destination;
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	google.maps.event.addDomListener(window, 'load', function () {
		new google.maps.places.SearchBox(document.getElementById('multi_days_txtSource'));
		new google.maps.places.SearchBox(document.getElementById('multi_days_txtDestination'));
		directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
	});

	function MultiDaysGetRoute() {
		var mumbai = new google.maps.LatLng(18.9750, 72.8258);
		var mapOptions = {
			zoom: 7,
			center: mumbai
		};
		$('#multi_days_map_div span').html('');
		$('#multi_days_dvMap').removeClass('hidden');
		map = new google.maps.Map(document.getElementById('multi_days_dvMap'), mapOptions);
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('dvPanel'));

		//*********DIRECTIONS AND ROUTE**********************//
		source = document.getElementById("multi_days_txtSource").value;
		destination = document.getElementById("multi_days_txtDestination").value;

		var request = {
			origin: source,
			destination: destination,
			travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function (response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});

		//*********DISTANCE AND DURATION**********************//
		var service = new google.maps.DistanceMatrixService();
		service.getDistanceMatrix({
			origins: [source],
			destinations: [destination],
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			avoidHighways: false,
			avoidTolls: false
		}, function (response, status) {
			if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS")            {
				var distance = response.rows[0].elements[0].distance.text;
				var distance_in_miles = (response.rows[0].elements[0].distance.value/1609.34).toFixed(0);
				var duration = response.rows[0].elements[0].duration.text;
				var duration_in_mins = (response.rows[0].elements[0].duration.value/60*2).toFixed(0);
				var duration_in_hours = (response.rows[0].elements[0].duration.value/3600*2).toFixed(0);
				var dvDistance = document.getElementById("multi_days_dvDistance");
				
				var hours = Math.floor( duration_in_mins / 60);          
				var minutes = duration_in_mins % 60;
				
				dvDistance.innerHTML = "";
				dvDistance.innerHTML += "Distance: " + distance_in_miles*2+" miles<br />";
				dvDistance.innerHTML += "Duration: " + hours+" hours "+minutes+" mins"

				var per_mile_cost=$('#multi_days_per_mile_cost').val();
				
				var per_day_cost=$('#multi_days_per_day_cost').val();
				
				var total_buses=$('#multi_days_no_of_buses').val();
				
				var no_of_extra_drivers=$('#multi_days_no_of_extra_drivers').val();
				
				var no_of_passenger=$('#multi_days_no_of_passenger').val();
				
				var total_days=$('#total_days').val();
				
				var est_cost=distance_in_miles*per_mile_cost;
				
				var round_trip=est_cost*2;
				
				$('#multi_days_distance').val((distance_in_miles*2)+" miles");
				
				$('#multi_days_drive').val(hours+" hours "+minutes+" mins");
				
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
						$('#multi_days_no_of_extra_drivers').val(extra_drivers);
					}
					else
					{
						var extra_drivers=0;
						$('#multi_days_no_of_extra_drivers').val('');
					}
				}
				
				if(extra_drivers >0)
				{
					var extra_driver_cost=extra_drivers*250;
					$('#multi_days_extra_driver_info').html('Each extra driver will cost $250').css('color','red');
				}
				else
				{
					var extra_driver_cost=0;
					$('#multi_days_extra_driver_info').html('');
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
				$('#multi_days_cost').val(final_cost*total_buses);
				$('#multi_days_drive_in_min').val(duration_in_mins);
				$('#multi_days_drive_in_hours').val(duration_in_hours);
				$('#multi_days_dvDistance').removeClass('hidden');

			} 
			else 
			{
			   // alert("Unable to find the distance via road.");
				toastr.info('Unable to find the distance via road.');
			}
		});
	}

/***********************************************************************************************************/	
	
	$(document).ready(function () 
	{
        var bus_total_seats=<?=$company_bus_details->no_of_seat;?> 
		if(bus_total_seats>55)
		{
			var bus_total_seats=55;
		}
		/* date picker start */  
	    $('#pick_up_time').wickedpicker();
		
		$('#from_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
        $('#to_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
		
		/* date picket end */ 
		
		/* get per mile cost start */
		$('#to_date').change(function()
		{
			$('#no_of_passenger').val('');
			$('#no_of_extra_drivers').val('');
			var to_date=$(this).val();
			var from_date=$('#from_date').val();
			if(to_date!='' && from_date!='')
			{
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#per_mile_cost').val(rec.per_mile);
							  $('#per_day_cost').val(rec.per_day);
							  GetRoute();
						  },
				  });
			}
			else
			{
				$('#per_mile_cost').val('3');
				$('#per_day_cost').val('1500');
				GetRoute();
			}
		}); 
		/* get per mile cost start */
		
		/* get costing details on location to focus out*/
		$('#txtDestination').focusout(function()
		{
			$('#no_of_passenger').val('');
			$('#no_of_extra_drivers').val('');
			var to_date=$('#to_date').val();
			var from_date=$('#from_date').val();
			if(to_date!='' && from_date!='')
			{
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#per_mile_cost').val(rec.per_mile);
							  $('#per_day_cost').val(rec.per_day);
							  GetRoute();
						  },
				  });
			}
			else
			{
				$('#per_mile_cost').val('3');
				$('#per_day_cost').val('1500');
				GetRoute();
			}
		});
		
		/* total passengers start */
		
		$('#no_of_passenger').keyup(function()
		{
			var drive_in_min=$('#drive_in_min').val();
			var total_passenger=$(this).val();
			var extra_drivers=$('#no_of_extra_drivers').val();
			var drive_in_hours=$('#drive_in_hours').val();
			//$('#no_of_extra_drivers').val('');
			$('#no_of_buses').val('');
			if(drive_in_min<=600)
			{
				if(total_passenger<bus_total_seats)
				{
					$('#no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#no_of_buses').val(rounded_t_b_r);
				}
			}
			else
			{
				if(total_passenger<bus_total_seats)
				{
					$('#no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#no_of_buses').val(rounded_t_b_r);
					
					var e_d=drive_in_hours/10;
					var actual_e_d=Math.ceil(e_d);
					var ex_drvrs=actual_e_d-1;
					var total_extra_drivers=ex_drvrs*rounded_t_b_r;					
					$('#no_of_extra_drivers').val(total_extra_drivers);
				}
			}
			GetRoute();
		});
		/* total passengers start */ 
		
/****************************************************************************************************************/

        $('#round_pick_up_time').wickedpicker();
		
		$('#round_from_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
        $('#round_to_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
		
		/* date picket end */ 
		
		/* get per mile cost start */
		$('#round_to_date').change(function()
		{
			$('#round_no_of_passenger').val('');
			$('#round_no_of_extra_drivers').val('');
			var to_date=$(this).val();
			var from_date=$('#round_from_date').val();
			if(to_date!='' && from_date!='')
			{
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#round_per_mile_cost').val(rec.per_mile);
							  $('#round_per_day_cost').val(rec.per_day);
							  RoundGetRoute();
						  },
				  });
			}
			else
			{
				$('#round_per_mile_cost').val('3');
				RoundGetRoute();
			}
		}); 
		/* get per mile cost start */
		
		/* get costing details on location to focus out*/
		$('#round_txtDestination').focusout(function()
		{
			$('#round_no_of_passenger').val('');
			$('#round_no_of_extra_drivers').val('');
			var to_date=$('#round_to_date').val();
			var from_date=$('#round_from_date').val();
			if(to_date!='' && from_date!='')
			{
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#round_per_mile_cost').val(rec.per_mile);
							  $('#round_per_day_cost').val(rec.per_day);;
							  RoundGetRoute();
						  },
				  });
			}
			else
			{
				$('#round_per_mile_cost').val('3');
				RoundGetRoute();
			}
		});
		
		/* total passengers start */
		
		$('#round_no_of_passenger').keyup(function()
		{
			var drive_in_min=$('#round_drive_in_min').val();
			var total_passenger=$(this).val();
			var extra_drivers=$('#round_no_of_extra_drivers').val();
			var drive_in_hours=$('#round_drive_in_hours').val();
			//$('#no_of_extra_drivers').val('');
			$('#round_no_of_buses').val('');
			if(drive_in_min<=600)
			{
				if(total_passenger<bus_total_seats)
				{
					$('#round_no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#round_no_of_buses').val(rounded_t_b_r);
				}
			}
			else
			{
				if(total_passenger<bus_total_seats)
				{
					$('#round_no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#round_no_of_buses').val(rounded_t_b_r);
					
					var e_d=drive_in_hours/10;
					var actual_e_d=Math.ceil(e_d);
					var ex_drvrs=actual_e_d-1;
					var total_extra_drivers=ex_drvrs*rounded_t_b_r;					
					$('#round_no_of_extra_drivers').val(total_extra_drivers);
				}
			}
			RoundGetRoute();
		});
		
		
		/****************************************************************************************************************/

        $('#multi_days_pick_up_time').wickedpicker();
		
		$('#multi_days_from_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
        $('#multi_days_to_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
		
		/* date picket end */ 
		
		/* get per mile cost start */
		$('#multi_days_to_date').change(function()
		{
			$('#multi_days_no_of_passenger').val('');
			$('#multi_days_no_of_extra_drivers').val('');
			var to_date=$(this).val();
			var from_date=$('#multi_days_from_date').val();
			if(to_date!='' && from_date!='')
			{
				  var mdy = from_date.split('-');
				  var mdy2 = to_date.split('-');
				  var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
				  var firstDate = new Date(mdy[2],mdy[0],mdy[1]);
				  var secondDate = new Date(mdy2[2],mdy2[0],mdy2[1]);
				  
				  var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
                  
				  $('#total_days').val(diffDays+1);
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#multi_days_per_mile_cost').val(rec.per_mile);
							  $('#multi_days_per_day_cost').val(rec.per_day);
							  MultiDaysGetRoute();
						  },
				  });
			}
			else
			{
				$('#multi_days_per_mile_cost').val('3');
				$('#multi_days_per_day_cost').val('1500');
				MultiDaysGetRoute();
			}
		}); 
		/* get per mile cost start */
		
		/* get costing details on location to focus out*/
		$('#multi_days_txtDestination').focusout(function()
		{
			$('#multi_days_no_of_passenger').val('');
			$('#multi_days_no_of_extra_drivers').val('');
			var to_date=$('#multi_days_to_date').val();
			var from_date=$('#multi_days_from_date').val();
			if(to_date!='' && from_date!='')
			{
				  var mdy = from_date.split('-');
				  var mdy2 = to_date.split('-');
				  var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
				  var firstDate = new Date(mdy[2],mdy[0],mdy[1]);
				  var secondDate = new Date(mdy2[2],mdy2[0],mdy2[1]);
				  
				  var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));

				  $('#total_days').val(diffDays+1);
				  
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#multi_days_per_mile_cost').val(rec.per_mile);
							  $('#multi_days_per_day_cost').val(rec.per_day);
							  MultiDaysGetRoute();
						  },
				  });
			}
			else
			{
				$('#multi_days_per_mile_cost').val('3');
				$('#multi_days_per_day_cost').val('1500');
				MultiDaysGetRoute();
			}
		});
		
		/* total passengers start */
		
		$('#multi_days_no_of_passenger').keyup(function()
		{
			var drive_in_min=$('#multi_days_drive_in_min').val();
			var total_passenger=$(this).val();
			var extra_drivers=$('#multi_days_no_of_extra_drivers').val();
			var drive_in_hours=$('#multi_days_drive_in_hours').val();
			//$('#no_of_extra_drivers').val('');
			$('#multi_days_no_of_buses').val('');
			if(drive_in_min<=600)
			{
				if(total_passenger<bus_total_seats)
				{
					$('#multi_days_no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#multi_days_no_of_buses').val(rounded_t_b_r);
				}
			}
			else
			{
				if(total_passenger<bus_total_seats)
				{
					$('#multi_days_no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#multi_days_no_of_buses').val(rounded_t_b_r);
					
					var e_d=drive_in_hours/10;
					var actual_e_d=Math.ceil(e_d);
					var ex_drvrs=actual_e_d-1;
					var total_extra_drivers=ex_drvrs*rounded_t_b_r;					
					$('#multi_days_no_of_extra_drivers').val(total_extra_drivers);
				}
			}
			MultiDaysGetRoute();
		});
		
		$('#resize').on('click', function () { 
			  $('#multi_cities').show(); 
			  $('#multi_cities').css('display','inline-block');
			  map_center = map.getCenter();
			  google.maps.event.trigger(map, "resize");
	  
			  map.setCenter(map_center);
			  map.setZoom(map_zoom); 
        });
/****************************************************************************************************************/
        $('#multi_cities_pick_up_time').wickedpicker();
		
		$('#multi_cities_from_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
        $('#multi_cities_to_date').datepicker({
			
			format:"mm-dd-yyyy"
		});
		$('#toAddress').focusout(function()
		{
			var to_date=$('#multi_cities_to_date').val();
			var from_date=$('#multi_cities_from_date').val();
			if(to_date!='' && from_date!='')
			{
				  var mdy = from_date.split('-');
				  var mdy2 = to_date.split('-');
				  var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
				  var firstDate = new Date(mdy[2],mdy[0],mdy[1]);
				  var secondDate = new Date(mdy2[2],mdy2[0],mdy2[1]);
				  
				  var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));

				  $('#multi_cities_total_days').val(diffDays+1);
				  
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#multi_cities_per_mile_cost').val(rec.per_mile);
							  $('#multi_cities_per_day_cost').val(rec.per_day);
						  },
				  });
			}
			else
			{
				$('#multi_cities_per_mile_cost').val('3');
				$('#multi_cities_per_day_cost').val('1500');
			}
		});
		$('#multi_cities_to_date').change(function()
		{
			$('#multi_cities_no_of_passenger').val('');
			$('#multi_cities_no_of_extra_drivers').val('');
			var to_date=$(this).val();
			var from_date=$('#multi_cities_from_date').val();
			if(to_date!='' && from_date!='')
			{
				  var mdy = from_date.split('-');
				  var mdy2 = to_date.split('-');
				  var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
				  var firstDate = new Date(mdy[2],mdy[0],mdy[1]);
				  var secondDate = new Date(mdy2[2],mdy2[0],mdy2[1]);
				  
				  var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
                  
				  $('#multi_cities_total_days').val(diffDays+1);
				  $.ajax({
						  type: "POST",
						  url: "<?php echo base_url('Home/get_permileage_cost');?>",
						  data:{from_date:from_date,to_date:to_date},
						  success: function(data)
						  {
							  var rec = JSON.parse(data);
							  $('#multi_cities_per_mile_cost').val(rec.per_mile);
							  $('#multi_cities_per_day_cost').val(rec.per_day);
						  },
				  });
			}
			else
			{
				$('#multi_cities_per_mile_cost').val('3');
				$('#multi_cities_per_day_cost').val('1500');
			}
			calcRoute();
		});
		$('#multi_cities_no_of_passenger').keyup(function()
		{
			var drive_in_min=$('#multi_cities_drive_in_min').val();
			var total_passenger=$(this).val();
			var extra_drivers=$('#multi_cities_no_of_extra_drivers').val();
			var drive_in_hours=$('#multi_cities_drive_in_hours').val();
			//$('#no_of_extra_drivers').val('');
			$('#multi_cities_no_of_buses').val('');
			if(drive_in_min<=600)
			{
				if(total_passenger<bus_total_seats)
				{
					$('#multi_cities_no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#multi_cities_no_of_buses').val(rounded_t_b_r);
				}
			}
			else
			{
				if(total_passenger<bus_total_seats)
				{
					$('#multi_cities_no_of_buses').val(1);
				}
				else if(total_passenger>=bus_total_seats)
				{
					var t_b_r=total_passenger/bus_total_seats;
					var rounded_t_b_r=Math.ceil(t_b_r);
					$('#multi_cities_no_of_buses').val(rounded_t_b_r);
					
					var e_d=drive_in_hours/10;
					var actual_e_d=Math.ceil(e_d);
					var ex_drvrs=actual_e_d-1;
					var total_extra_drivers=ex_drvrs*rounded_t_b_r;					
					$('#multi_cities_no_of_extra_drivers').val(total_extra_drivers);
				}
			}
			calcRoute();
		});
		$(document).on("click", ".to_waypoints_remove", function()
		{
			calcRoute();
		});
    });
	function parseDate(str) 
	{
		var mdy = str.split('-');
		return new Date(mdy[2], mdy[0]-1, mdy[1]);
	}
	
	function daydiff(f_date, t_date) {
		return Math.round((t_date-f_date)/(1000*60*60*24));
	}
</script>