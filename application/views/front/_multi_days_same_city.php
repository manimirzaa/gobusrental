<div class="col-md-6">
    <div class="thumbnail">
        <?php 
        $attributes = array('name' => 'quote_request','id'=>'multi_days_same_city');
        echo form_open('Home/quote_request', $attributes);
        if(isset($travel_needs))
        {
            $travel_need=htmlspecialchars(json_encode($travel_needs));
        }
        else
        {
            $travel_need="";
        }
        ?> 
          <input type="hidden" value="3" name="trip_type" />
          <input type="hidden" value="<?php echo $company_bus_details->company_id;?>" name="company_id" />
          <input type="hidden" value="<?php echo $bus_id;?>" name="bus_id" />
          <input type="hidden" value="<?php echo $travel_need;?>" name="travel_needs"/>
          <div class="col-md-6">
               <label for="From" class="control-label">From<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-map-marker"></i>
                   <input type="text" name="from" id="multi_days_txtSource" class="form-control" placeholder="From"  required/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="To" class="control-label">To<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-map-marker"></i>
                   <input type="text" name="to" id="multi_days_txtDestination" class="form-control" placeholder="To" required/>
               </div>
          </div>
          <div class="col-md-4">
               <label for="Pick Up Date" class="control-label">Pick Up Date<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="from_date" id="multi_days_from_date" class="form-control" placeholder="From Date" value="<?php echo date('m-d-Y')?>" required/>
               </div>
          </div>
          <div class="col-md-4">
               <label for="Pick Up Time" class="control-label">Pick Up Time<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-time"></i>
                   <input type="text" name="pick_up_time" id="multi_days_pick_up_time" class="form-control" placeholder="Time" value="9 : 00 AM" required/>
               </div>
          </div>
          <div class="col-md-4">
               <label for="End Date" class="control-label">End Date<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-calendar"></i>
                   <input type="text" name="to_date" id="multi_days_to_date" class="form-control" placeholder="To Date" value="<?php echo date('m-d-Y')?>" required/>
               </div>
          </div>
          <div class="col-md-12"><p class="divider"></p></div>
          <div class="col-md-6">
               <label for="f_name" class="control-label">First Name<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-user"></i>
                   <input type="text" name="first_name" id="multi_days_first_name" class="form-control" placeholder="First Name" required/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="l_name" class="control-label">Last Name<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-user"></i>
                   <input type="text" name="last_name" id="multi_days_last_name" class="form-control" placeholder="Last Name" required/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="email" class="control-label">Email<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-envelope"></i>
                   <input type="email" name="email" id="multi_days_email" class="form-control" placeholder="Email" required/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="p_number" class="control-label">Personal Number</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-phone-alt"></i>
                   <input type="number" name="p_number" id="multi_days_p_number" class="form-control" placeholder="Personal Number"/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="o_number" class="control-label">Official Number</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-phone-alt"></i>
                   <input type="number" name="o_number" id="multi_days_o_number" class="form-control" placeholder="Official Number"/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="Company" class="control-label">Company</label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-tower"></i>
                   <input type="text" name="company" id="multi_days_company" class="form-control" placeholder="Company"/>
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
               <label for="buses" class="control-label">No of Buses<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-bed"></i>
                   <input type="number" name="no_of_buses" id="multi_days_no_of_buses" class="form-control" value="1" required readonly/>
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
               <label for="drive" class="control-label">Drive(Duration)<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-time"></i>
                   <input type="text" name="drive" id="multi_days_drive" class="form-control" placeholder="Drive" readonly required/>
               </div>
          </div>
          <div class="col-md-6">
               <label for="Distance" class="control-label">By Road Distance<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-road"></i>
                   <input type="text" name="distance" id="multi_days_distance" class="form-control" placeholder="Distance" readonly required/>
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
               <label for="Distance" class="control-label">Estimated Trip Cost<span class="required">*</span></label>
               <div class="inner-addon left-addon">
                   <i class="glyphicon glyphicon-usd"></i>
                   <input type="text" name="cost" id="multi_days_cost" class="form-control" placeholder="Estimated Trip Cost" readonly required/>
               </div>
               <div id="multi_days_extra_driver_info"></div>
          </div>
          <div class="col-md-12">
               <div class="form-group">
                   <label for="number" class="control-label">Description</label>
                   <textarea name="description" id="multi_days_description" class="form-control"></textarea>
               </div>
          </div>
          <div class="col-md-12">
               <div class="form-group">
                  <input type="hidden" name="per_mile_cost" id="multi_days_per_mile_cost" value="">
                  <input type="hidden" name="per_day_cost" id="multi_days_per_day_cost" value="">
                  <input type="hidden" name="drive_in_min" id="multi_days_drive_in_min" value="">
                  <input type="hidden" name="drive_in_hours" id="multi_days_drive_in_hours" value="">
                  <input type="submit" value="Send Request" class="btn btn-default pull-right light-blue-btn" style="margin-left:10px;">
                  <input type="button" value="Estimate" class="btn btn-primary orange-btn pull-right" onclick="MultiDaysGetRoute()" />  
               </div>
          </div>
       <?php echo form_close();?>
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