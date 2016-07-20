<?php 
$all_states=get_all_states();
$all_companies=get_companies();
if(isset($searched_parameters['travel_needs']))
{
	$travel_needs=htmlspecialchars(json_encode($searched_parameters['travel_needs']));
}
else
{
	$travel_needs="";
}
?>
<section class="section section-orange">
    <div class="container">
       <div class="row">
         <div class="well">
            <section class="section">
                <div class="row ">
    
                        <div class="col-md-12">
                            <ul class="nav nav-pills" role="tablist">
                                <li role="presentation" <?php if($searched_parameters['searched_tab']==1) {?>class="active"<?php }?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">By Bus Type</a></li>
                                <li role="presentation" <?php if($searched_parameters['searched_tab']==2) {?>class="active"<?php }?>><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">By Company</a></li>
                                <li role="presentation" <?php if($searched_parameters['searched_tab']==3) {?>class="active"<?php }?>><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">By County</a></li>
                            </ul>
                            <div class="tab-content top-buffer">
                                <?php 
                                if($searched_parameters['searched_tab']==1)
                                {
                                    $class="active";
                                }
                                else
                                {
                                    $class="";
                                }
                                ?>
                                <div role="tabpanel" class="tab-pane <?php echo $class;?> fade in" id="home">
    
                                    <?php 
                                      $attributes = array('name' => 'search','id'=>'by_bus_type');
                                      echo form_open('Home/search', $attributes);
                                      
                                      if(isset($searched_parameters['state']))
                                      {
                                          $state_id=$searched_parameters['state'];
                                      }
                                      else
                                      {
                                          $state_id="";
                                      }
                                      if(isset($searched_parameters['city']))
                                      {
                                          $city_name=$searched_parameters['city'];
                                      }
                                      else
                                      {
                                          $city_name="";
                                      }
                                      if(isset($searched_parameters['bus_type']))
                                      {
                                          $bus_type=$searched_parameters['bus_type'];
                                      }
                                      else
                                      {
                                          $bus_type="";
                                      }
									  if(isset($searched_parameters['no_of_seats']))
									  {
										  $no_of_seats=$searched_parameters['no_of_seats'];
									  }
									  else
                                      {
                                          $no_of_seats="";
                                      }
                                    ?>
                                        <div class="row">
    
                                                <!--<label for="state" class="col-sm-2 control-label">State</label>-->
                                                <input type="hidden" value="1" name="searched_tab" />
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select name="state" id="state" class="form-control input-sm chosen-select">
                                                            <option value="">SELECT STATE</option>
                                                            <?php
                                                            if($all_states->num_rows()>0)
                                                            {
                                                                $states=$all_states->result();
                                                                foreach($states as $key=>$val)
                                                                {
                                                                ?>
                                                                    <option value="<?php echo $val->id;?>" <?php if($val->id==$state_id){ echo 'selected="selected"';}?>><?php echo $val->state_name;?></option>
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
    
    
                                                <!--<label for="city" class="col-sm-2 control-label">City</label>-->
                                                <div class="col-md-4">
                                                    <div class="form-group" id="cities_div">
                                                        <select name="city" id="city" class="form-control input-sm chosen-select">
                                                            <option value="">SELECT CITY</option>
                                                            <?php 
                                                            if(!empty($city_name))
                                                            {
                                                            ?>
                                                                <option value="<?php echo $city_name;?>" selected="selected"><?php echo $city_name;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group hidden" id="loading_div">
                                                        <span class="form-control input-sm"><img src="<?php echo base_url();?>images/general/loading.gif" /></span>
                                                    </div>
                                                </div>
    
    
                                                <!--<label for="bus_type" class="col-sm-2 control-label">Bus Type</label>-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="number" value="<?php echo $no_of_seats;?>" name="no_of_seats" class="form-control input-sm chosen_style" min=1 max=1000 placeholder="No of Passenger"/>
                                                        <?php /*?><select name="bus_type" id="bus_type" class="form-control input-sm chosen-select">
                                                            <option value="">SELECT SERVICE TYPE</option>
                                                            <option value="Mini bus" <?php if("Mini bus"==$bus_type){ echo 'selected="selected"';}?>>Mini bus</option>
                                                            <option value="School bus" <?php if("School bus"==$bus_type){ echo 'selected="selected"';}?>>School bus</option>
                                                            <option value="Trolly bus" <?php if("Trolly bus"==$bus_type){ echo 'selected="selected"';}?>>Trolly bus</option>
                                                            <option value="Charter bus" <?php if("Charter bus"==$bus_type){ echo 'selected="selected"';}?>>Charter bus</option>
                                                            <option value="Entertainer" <?php if("Entertainer"==$bus_type){ echo 'selected="selected"';}?>>Entertainer</option>
                                                            <option value="Van" <?php if("Van"==$bus_type){ echo 'selected="selected"';}?>>Van</option>
                                                            <option value="Limo bus" <?php if("Limo bus"==$bus_type){ echo 'selected="selected"';}?>>Limo bus</option>
                                                            <option value="Executive bus" <?php if("Executive bus"==$bus_type){ echo 'selected="selected"';}?>>Executive bus</option>
                                                            <option value="Double bus" <?php if("Double bus"==$bus_type){ echo 'selected="selected"';}?>>Double bus</option>
                                                            <option value="Transit bus" <?php if("Transit bus"==$bus_type){ echo 'selected="selected"';}?>>Transit bus</option>
                                                            <option value="Party bus" <?php if("Party bus"==$bus_type){ echo 'selected="selected"';}?>>Party bus</option>
                                                        </select><?php */?>
                                                    </div>
                                                </div>
    
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[hotels]" value="Yes" <?php if($searched_parameters['searched_tab']==1 && isset($searched_parameters['travel_needs']['hotels'])) { echo 'checked="checked"';}?>> Hotels
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[attractions]" value="Yes" <?php if($searched_parameters['searched_tab']==1 && isset($searched_parameters['travel_needs']['attractions'])) { echo 'checked="checked"';}?>> Attractions
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[restaurants]" value="Yes" <?php if($searched_parameters['searched_tab']==1 && isset($searched_parameters['travel_needs']['restaurants'])) { echo 'checked="checked"';}?>> Restaurants
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[tour_guides]" value="Yes" <?php if($searched_parameters['searched_tab']==1 && isset($searched_parameters['travel_needs']['tour_guides'])) { echo 'checked="checked"';}?>> Tour Guides
                                                  </label>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-default pull-right light-blue-btn">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                   <?php echo form_close();?>
    
                                </div>
                                <?php 
                                if($searched_parameters['searched_tab']==2)
                                {
                                    $class2="active";
                                }
                                else
                                {
                                    $class2="";
                                }
                                ?>
                                <div role="tabpanel" class="tab-pane <?php echo $class2;?> fade in" id="profile">
    
                                    <?php 
                                      $attributes = array('name' => 'search','id'=>'by_company');
                                      echo form_open('Home/search', $attributes);
                                      
                                      if(isset($searched_parameters['company']))
                                      {
                                          $company=$searched_parameters['company'];
                                      }
                                      else
                                      {
                                          $company="";
                                      }
                                    ?>
                                        <div class="row">
    
                                                <!--<label for="state" class="col-sm-2 control-label">State</label>-->
                                                <div class="col-md-6">
                                                    <input type="hidden" value="2" name="searched_tab" />
                                                    <div class="form-group">
                                                        <select name="company" id="company" class="form-control chosen-select">
                                                            <option value="">SELECT COMPANY</option>
                                                            <?php
                                                            if($all_companies)
                                                            {
                                                                foreach($all_companies as $compnay)
                                                                {
                                                                ?>
                                                                     <option value="<?php echo $compnay->id;?>" <?php if($compnay->id==$company) {echo  'selected="selected"';}?>><?php echo $compnay->company_name;?></option>
                                                                <?php	
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[hotels]" value="Yes" <?php if($searched_parameters['searched_tab']==2 && isset($searched_parameters['travel_needs']['hotels'])) { echo 'checked="checked"';}?>> Hotels
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[attractions]" value="Yes" <?php if($searched_parameters['searched_tab']==2 && isset($searched_parameters['travel_needs']['attractions'])) { echo 'checked="checked"';}?>> Attractions
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[restaurants]" value="Yes" <?php if($searched_parameters['searched_tab']==2 && isset($searched_parameters['travel_needs']['restaurants'])) { echo 'checked="checked"';}?>> Restaurants
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[tour_guides]" value="Yes" <?php if($searched_parameters['searched_tab']==2 && isset($searched_parameters['travel_needs']['tour_guides'])) { echo 'checked="checked"';}?>> Tour Guides
                                                  </label>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <button type="submit" class="btn  btn-default pull-right light-blue-btn">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
    
                                </div>
                                 <?php 
                                if($searched_parameters['searched_tab']==3)
                                {
                                    $class3="active";
                                }
                                else
                                {
                                    $class3="";
                                }
                                ?>
                                <div role="tabpanel" class="tab-pane <?php echo $class3;?> fade in" id="messages">
    
                                    <?php 
                                      $attributes = array('name' => 'search','id'=>'by_county');
                                      echo form_open('Home/search', $attributes);
									  if(isset($searched_parameters['state_id']))
                                      {
                                          $state=$searched_parameters['state_id'];
                                      }
                                      else
                                      {
                                          $state="";
                                      }
                                      if(isset($searched_parameters['county']))
                                      {
                                          $county_name=$searched_parameters['county'];
                                      }
                                      else
                                      {
                                          $county_name="";
                                      }
                                    ?>
                                       <div class="row">
    
                                            <!--<label for="state" class="col-sm-2 control-label">State</label>-->
                                            <div class="col-md-6">
                                                <input type="hidden" value="3" name="searched_tab" />
                                                <div class="form-group">
                                                <select name="state_id" id="state_id" class="form-control chosen-select">
                                                    <option value="">SELECT STATE</option>
                                                    <?php
													if($all_states->num_rows()>0)
													{
														$states=$all_states->result();
														foreach($states as $key=>$val)
														{
														?>
															<option value="<?php echo $val->id;?>" <?php if($val->id==$state){ echo 'selected="selected"';}?>><?php echo $val->state_name;?></option>
														<?php
														}
													}
													?>
                                                </select>
                                                </div>
                                            </div>
    
                                            <!--<label for="city" class="col-sm-2 control-label">City</label>-->
                                            <div class="col-md-6">
                                                <div class="form-group" id="county_div">
                                                    <select name="county" id="county" class="form-control chosen-select">
                                                        <option value="">SELECT COUNTY</option>
                                                        <?php 
														if(!empty($county_name))
														{
														?>
															<option value="<?php echo $county_name;?>" selected="selected"><?php echo $county_name;?></option>
														<?php
														}
														?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 hidden" id="county_loading_div">
                                                    <span class="form-control input-sm"><img src="<?php echo base_url();?>images/general/loading.gif" /></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
    
                                            <div class="col-sm-6">
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[hotels]" value="Yes" <?php if($searched_parameters['searched_tab']==3 && isset($searched_parameters['travel_needs']['hotels'])) { echo 'checked="checked"';}?>> Hotels
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[attractions]" value="Yes" <?php if($searched_parameters['searched_tab']==3 && isset($searched_parameters['travel_needs']['attractions'])) { echo 'checked="checked"';}?>> Attractions
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[restaurants]" value="Yes" <?php if($searched_parameters['searched_tab']==3 && isset($searched_parameters['travel_needs']['restaurants'])) { echo 'checked="checked"';}?>> Restaurants
                                                  </label>
                                              </div>
                                              <div class="checkbox-inline">
                                                  <label>
                                                      <input type="checkbox" name="travel_needs[tour_guides]" value="Yes" <?php if($searched_parameters['searched_tab']==3 && isset($searched_parameters['travel_needs']['tour_guides'])) { echo 'checked="checked"';}?>> Tour Guides
                                                  </label>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-default pull-right light-blue-btn">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
    
                                </div>
                            </div>
                        </div>
    
                </div>
            </section>
         </div>
       </div>
    </div>
</section>
<section class="section section-dark">
    <div class="container">
        <?php
		$c=0;
		if($searched_data)
		{
		?>
            <h2 class="text-center"><i class="glyphicon glyphicon-search circle-icon"></i> Searched Results!</h2>
            <div class="row top-buffer">
                
                <?php
				foreach($searched_data as $key=>$val)
				{
					if($val->company_buses)
					{
						$c++;
					?>
                       <div class="thumbnail company_buses_div">
                        <div class="col-md-12">
                            <table class="table table-responsive table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><i class="glyphicon glyphicon glyphicon-tower"></i> Company Name</th>
                                        <th><i class="glyphicon glyphicon-map-marker"></i> Area</th>
                                        <th><i class="glyphicon glyphicon-phone-alt"></i> Phone</th>
                                        <th><i class="glyphicon glyphicon-envelope"></i> Email</th>
                                        <th><i class="glyphicon glyphicon-link"></i> Member of</th>
                                        <th><i class="glyphicon glyphicon-hand-up"></i> Website</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $val->company_name;?></td>
                                        <td><p class="label label-default"><?php echo $val->state_name;?></p> <p class="label label-default"><?php echo $val->city;?></p></td>
                                        <td><?php echo $val->company_phone;?></td>
                                        <td><?php echo $val->email;?></td>
                                        <td><?php echo $val->association;?></td>
                                        <td><?php echo $val->website;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php
						foreach($val->company_buses as $bus)
						{
				    ?>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="search-result-item-image">
                                                <?php
												if($bus->bus_type=="Charter bus")
												{
												?>
                                                   <img class="img-responsive" src="<?php echo base_url();?>images/buses/charter_bus.jpg" alt="" />
                                                <?php
												}
												elseif($bus->bus_type=="Mini bus")
												{
												?>
                                                   <img class="img-responsive" src="<?php echo base_url();?>images/buses/mini_bus.jpg" alt="" />
                                                <?php
												}
												elseif($bus->bus_type=="Executive bus")
												{
												?>
                                                   <img class="img-responsive" src="<?php echo base_url();?>images/buses/executive_bus.jpg" alt="" />
                                                <?php
												}
												elseif($bus->bus_type=="School bus")
												{
												?>
                                                   <img class="img-responsive" src="<?php echo base_url();?>images/buses/school_bus.jpg" alt="" />
                                                <?php
												}
												elseif($bus->bus_type=="Party bus")
												{
												?>
                                                   <img class="img-responsive" src="<?php echo base_url();?>images/buses/party_bus.jpg" alt="" />
                                                <?php
												}
												else
												{
												?>
                                                   <img class="img-responsive" src="<?php echo base_url();?>images/buses/10.jpg" alt="" />
                                                <?php
												}
												?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="search-result-item-content">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                        <tr>
                                                            <th><i class="glyphicon glyphicon glyphicon-calendar"></i> Model:</th>
                                                            <td><p class="label label-default"><?php echo $bus->manufacture_date;?></p></td>
                                                        </tr>
                                                        <tr>
                                                            <th><i class="glyphicon glyphicon glyphicon-th"></i> No of Seats:</th><td><?php echo $bus->no_of_seat;?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><i class="glyphicon glyphicon glyphicon-bed"></i> Bus Type:</th><td><?php echo $bus->bus_type;?></td>
                                                        </tr>
                                                        <tr>
                                                            <table class="table table-responsive table-bordered less_th_padding_tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>RSTM</th>
                                                                        <th>CD</th>
                                                                        <th>DVD</th>
                                                                        <th>STV</th>
                                                                        <th>WIFI</th>
                                                                        <th>PA</th>
                                                                        <th>ADA</th>
                                                                        <th>ALCH</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
																		   <?php 
																		   if($bus->rstm)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                        <td>
																		   <?php 
																		   if($bus->cd)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                        <td>
																		   <?php 
																		   if($bus->dvd)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                        <td>
																		   <?php 
																		   if($bus->stv)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                        <td>
																		   <?php 
																		   if($bus->wifi)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                        <td>
																		   <?php 
																		   if($bus->pa)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                        <td>
																		   <?php 
																		   if($bus->ada)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                        <td>
																		   <?php 
																		   if($bus->alch)
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
																		   }
																		   else
																		   {
																			   echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
																		   }
																		   ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </tr>
                                                        <tr> 
                                                            <?php 
															$attributes = array('name' => 'get_a_quote');
															echo form_open('Home/get_a_quote', $attributes);
														    ?>
                                                            <input type="hidden" value="<?php echo $bus->id;?>" name="bus_id" />
                                                            <input type="hidden" value="<?php echo $travel_needs;?>" name="travel_needs"  />
                                                           <td colspan="2"> <button type="submit" class="btn btn-primary dark-blue-btn">Get a Quote</button></td>
                                                            <?php echo form_close();?>
                                                            <?php /*?><td colspan="2"><a class="btn btn-primary dark-blue-btn" href="<?php echo $this->config->base_url();?>/Home/get_a_quote/<?php echo $bus->id;?>">Get a Quote</a><?php */?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                <?php
						}
					   ?>
                       </div>
                       <?php
					}
				}
				?>
            </div>
        <?php
		}
		else
		{
		?>
           <h2 class="text-center"><i class="glyphicon glyphicon-search circle-icon"></i> No record found.Please try again</h2> 
        <?php
		}
		if($c==0)
		{
			echo'<h2 class="text-center">No record found. Please try again</h2>';
		}
		?>

        <?php /*?><div class="row">
            <div class="col-md-6">
            	<p>Showing 1 of 2</p>
            </div>
            <div class="col-md-6">
	            <nav class="nav pull-right">
				  <ul class="pagination">
				    <li class="disabled">
				      <span>
				        <span aria-hidden="true">&laquo;</span>
				      </span>
				    </li>
				    <li class="active">
				      <span>1 <span class="sr-only">(current)</span></span>
				    </li>
				    <li>
				      <span>2 <span class="sr-only">(current)</span></span>
				    </li>			    
				  </ul>
				</nav>
			</div>
		</div><?php */?>
	</div>
</section>
<?php include(APPPATH.'/views/front/includes/footer.php'); ?> 
<script type="text/javascript">
var config = {
  '.chosen-select'           : {},
  '.chosen-select-deselect'  : {allow_single_deselect:true},
  '.chosen-select-no-single' : {disable_search_threshold:10},
  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
  '.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
  $(selector).chosen(config[selector]);
}
$('#state').change(function()
{
	var state_id=$(this).val();
	$('#cities_div').addClass('hidden');
	$('#loading_div').removeClass('hidden');
	$.ajax({
			type: "POST",
			url: "<?php echo base_url('Home/ajax_state_cities');?>",
			data:{state_id:state_id},
			success: function(data)
			{
				var rec = JSON.parse(data);
				$('#loading_div').addClass('hidden');
				$('#cities_div').html('');
				$('#cities_div').removeClass('hidden');
			    $('#cities_div').html(rec);
				$(".chosen-select").chosen({});
			},
	});
});
$('#state_id').change(function()
{
	var state_id=$(this).val();
	$('#county_div').addClass('hidden');
	$('#county_loading_div').removeClass('hidden');
	$.ajax({
			type: "POST",
			url: "<?php echo base_url('Home/ajax_state_county');?>",
			data:{state_id:state_id},
			success: function(data)
			{
				var rec = JSON.parse(data);
				$('#county_loading_div').addClass('hidden');
				$('#county_div').html('');
				$('#county_div').removeClass('hidden');
			    $('#county_div').html(rec);
				$(".chosen-select").chosen({});
			},
	});
});
$('#by_bus_type').submit(function()
{
	var state=$('#state').val();
	if(state=='')
	{
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
        toastr.info('Please select state first');
		return false;
	}
});
$('#by_company').submit(function()
{
	var company=$('#company').val();
	if(company=='')
	{
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
        toastr.info('Please select company first');
		return false;
	}
});
$('#by_county').submit(function()
{
	var state_id=$('#state_id').val();
	if(state_id=='')
	{
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
        toastr.info('Please select state first');
		return false;
	}
});
</script>