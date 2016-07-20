<style>
.adp-directions{
	display:none;
}
</style>
<div class="col-md-6">
    <div class="thumbnail">
          <div id="p1" class="guttered-s margin-top" style="width:100%; display:inline-block;">
          <div class="col-md-6">
               <label for="From" class="control-label">From</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-map-marker"></i>
                   <input type="text" name="from" id="fromAddress" class="form-control" placeholder="From"/>
               </div>
          </div>
          <div class="col-6">
                <a href="javascript:void(0)" onclick="return add_waypoint();" class="btn btn-primary orange-btn" style="margin-top:24px; margin-left:15px;">Add City</a>
          </div>
          </div>
          <div id="p2" class="guttered-s source-container margin-top-s" style="width:100%; display:inline-block;">
          <div class="col-md-6">
               <label for="To" class="control-label">To</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-map-marker"></i>
                   <input type="text" name="to" id="toAddress" class="form-control" placeholder="To"/>
               </div>
          </div>
          </div>
          <div class="col-md-4">
               <label for="Pick Up Date" class="control-label">Pick Up Date</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="from_date" id="multi_cities_from_date" class="form-control" placeholder="From Date" value="<?php echo date('m-d-Y')?>"/>
               </div>
          </div>
          <div class="col-md-4">
               <label for="Pick Up Time" class="control-label">Pick Up Time</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-time"></i>
                   <input type="text" name="pick_up_time" id="multi_cities_pick_up_time" class="form-control" placeholder="Time" value="9 : 00 AM"/>
               </div>
          </div>
          <div class="col-md-4">
               <label for="End Date" class="control-label">End Date</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="to_date" id="multi_cities_to_date" class="form-control" placeholder="To Date" value="<?php echo date('m-d-Y')?>"/>
               </div>
          </div>
          
          <div class="col-md-12"><p class="divider"></p></div>
          <div class="col-md-6">
               <label for="passenger" class="control-label">No of Passengers</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-user"></i>
                   <input type="number" name="no_of_passenger" id="multi_cities_no_of_passenger" class="form-control" placeholder="No of Passengers"/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="buses" class="control-label">No of Buses</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-bed"></i>
                   <input type="number" name="no_of_buses" id="multi_cities_no_of_buses" class="form-control" value="1" readonly="readonly"/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="drivers" class="control-label">No of Extra Drivers</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-user"></i>
                   <input type="number" name="no_of_extra_drivers" id="multi_cities_no_of_extra_drivers" class="form-control" placeholder="No of Extra Drivers" readonly="readonly"/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="drive" class="control-label">Drive(Duration)</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-time"></i>
                   <input type="text" name="drive" id="multi_cities_drive" class="form-control" placeholder="Drive" readonly />
               </div>
          </div>
          <div class="col-md-6">
               <label for="Distance" class="control-label">By Road Distance</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-road"></i>
                   <input type="text" name="distance" id="multi_cities_distance" class="form-control" placeholder="Distance" readonly />
               </div>
          </div>
          <div class="col-md-6">
               <label for="Days" class="control-label">Total Days</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="total_days" id="multi_cities_total_days" class="form-control" placeholder="Total Days" readonly/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="Distance" class="control-label">Estimated Trip Cost</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-usd"></i>
                   <input type="text" name="cost" id="multi_cities_cost" class="form-control" placeholder="Estimated Trip Cost" readonly/>
               </div>
               <div id="multi_cities_extra_driver_info"></div>
          </div>
          <div class="col-md-12">
               <div class="form-group">
                  <input type="hidden" name="per_mile_cost" id="multi_cities_per_mile_cost" value="">
                  <input type="hidden" name="per_day_cost" id="multi_cities_per_day_cost" value="">
                  <input type="hidden" name="drive_in_min" id="multi_cities_drive_in_min" value="">
                  <input type="hidden" name="drive_in_hours" id="multi_cities_drive_in_hours" value="">
                  <input type="button" value="Calculate" class="btn btn-primary orange-btn pull-right" onclick="return calcRoute();" />  
               </div>
          </div>
    </div>
</div>

<div class="col-md-6" >
    <div class="thumbnail" id="multi_cities_map_div" style="height:100%; width:100%;">
        <div id="summary" class="margin-top" style="height:100%; width:100%;"></div>
        <div id="map_area" style="height:100%; width:100%;">
            <div id="map_canvas" style="height:300px;"></div>
        </div>
        <div id="locations" class="margin-top padding-top-s border-top"></div>
        <div id="directions" class="margin-top">
            <h4>Your Route :</h4>
        </div>
    </div>
</div>