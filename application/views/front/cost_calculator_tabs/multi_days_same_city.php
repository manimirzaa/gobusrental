<div class="col-md-6">
    <div class="thumbnail">
          <div class="col-md-6">
               <label for="From" class="control-label">From</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-map-marker"></i>
                   <input type="text" name="from" id="multi_days_txtSource" class="form-control" placeholder="From" />
               </div>
          </div>
          <div class="col-md-6">
               <label for="To" class="control-label">To</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-map-marker"></i>
                   <input type="text" name="to" id="multi_days_txtDestination" class="form-control" placeholder="To" />
               </div>
          </div>
          <div class="col-md-4">
               <label for="Pick Up Date" class="control-label">Pick Up Date</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="from_date" id="multi_days_from_date" class="form-control" placeholder="From Date" value="<?php echo date('m-d-Y')?>" />
               </div>
          </div>
          <div class="col-md-4">
               <label for="Pick Up Time" class="control-label">Pick Up Time</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-time"></i>
                   <input type="text" name="pick_up_time" id="multi_days_pick_up_time" class="form-control" placeholder="Time" value="9 : 00 AM" />
               </div>
          </div>
          <div class="col-md-4">
               <label for="End Date" class="control-label">End Date</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="to_date" id="multi_days_to_date" class="form-control" placeholder="To Date" value="<?php echo date('m-d-Y')?>" />
               </div>
          </div>
          
          <div class="col-md-12"><p class="divider"></p></div>
          <div class="col-md-6">
               <label for="passenger" class="control-label">No of Passengers</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-user"></i>
                   <input type="number" name="no_of_passenger" id="multi_days_no_of_passenger" class="form-control" placeholder="No of Passengers" />
               </div>
          </div>
          <div class="col-md-6">
               <label for="buses" class="control-label">No of Buses</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-bed"></i>
                   <input type="number" name="no_of_buses" id="multi_days_no_of_buses" class="form-control" value="1"  readonly/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="drivers" class="control-label">No of Extra Drivers</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-user"></i>
                   <input type="number" name="no_of_extra_drivers" id="multi_days_no_of_extra_drivers" class="form-control" placeholder="No of Extra Drivers" readonly/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="drive" class="control-label">Drive(Duration)</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-time"></i>
                   <input type="text" name="drive" id="multi_days_drive" class="form-control" placeholder="Drive" readonly/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="Distance" class="control-label">By Road Distance</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-road"></i>
                   <input type="text" name="distance" id="multi_days_distance" class="form-control" placeholder="Distance" readonly/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="Days" class="control-label">Total Days</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="total_days" id="total_days" class="form-control" placeholder="Total Days" readonly/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="Distance" class="control-label">Estimated Trip Cost</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-usd"></i>
                   <input type="text" name="cost" id="multi_days_cost" class="form-control" placeholder="Estimated Trip Cost" readonly required/>
               </div>
               <div id="multi_days_extra_driver_info"></div>
          </div>
          <div class="col-md-12">
               <div class="form-group">
                  <input type="hidden" name="per_mile_cost" id="multi_days_per_mile_cost" value="">
                  <input type="hidden" name="per_day_cost" id="multi_days_per_day_cost" value="">
                  <input type="hidden" name="drive_in_min" id="multi_days_drive_in_min" value="">
                  <input type="hidden" name="drive_in_hours" id="multi_days_drive_in_hours" value="">
                  <input type="button" value="Calculate" class="btn btn-primary orange-btn pull-right" onclick="MultiDaysGetRoute()" />  
               </div>
          </div>
    </div>
</div>

<div class="col-md-6">
    <div class="thumbnail hidden" id="multi_days_dvDistance">
    </div>
    <div class="thumbnail" id="multi_days_map_div">
        <span><img width="100%" src="<?php echo $this->config->base_url();?>images/general/miami_map.png" alt="Google Map of miami"></span>
        <div class="hidden" id="multi_days_dvMap" style="width: 100%; height: 500px; padding:5px;">
        </div>
    </div>
</div>