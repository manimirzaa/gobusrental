<?php 
$all_states=get_all_states();
$all_companies=get_companies();
?>
<!--Start of Search Form-->
<div  class="floating-form col-sm-5">
    <h4>FIND YOUR DESIRED COACH</h4>

        <!-- Nav tabs -->
    <ul class="nav nav-pills" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">By Bus Type</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">By Company</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">By County</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="home">
            <?php 
			  $attributes = array('name' => 'search','class'=>'form-horizontal','id'=>'by_bus_type');
			  echo form_open('Home/search', $attributes);
		    ?>
                <div class="form-group">
                    <input type="hidden" value="1" name="searched_tab" />
                    <!--<label for="state" class="col-sm-2 control-label">State</label>-->
                    <div class="col-sm-12">
                        <select name="state" id="state" class="form-control input-sm chosen-select">
                            <option value="">SELECT STATE</option>
                            <?php
							if($all_states->num_rows()>0)
							{
								$states=$all_states->result();
								foreach($states as $key=>$val)
								{
								?>
                                    <option value="<?php echo $val->id;?>"><?php echo $val->state_name;?></option>
                                <?php
								}
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <!--<label for="city" class="col-sm-2 control-label">City</label>-->
                    <div class="col-sm-12" id="cities_div">
                        <select name="city" id="city" class="form-control input-sm chosen-select">
                            <option value="">SELECT CITY</option>
                        </select>
                    </div>
                    <div class="col-sm-12 hidden" id="loading_div">
                       <span class="form-control input-sm"><img src="<?php echo base_url();?>images/general/loading.gif" /></span>
                    </div>
                </div>
                <?php /*?><div class="form-group">
                    <!--<label for="bus_type" class="col-sm-2 control-label">Bus Type</label>-->
                    <div class="col-sm-12">
                        <select name="bus_type" id="bus_type" class="form-control input-sm chosen-select" >
                            <option value="">SELECT SERVICE TYPE</option>
                            <option value="Mini bus">Mini bus</option>
                            <option value="School bus">School bus</option>
                            <option value="Trolly bus">Trolly bus</option>
                            <option value="Charter bus">Charter bus</option>
                            <option value="Entertainer">Entertainer</option>
                            <option value="Van">Van</option>
                            <option value="Limo bus">Limo bus</option>
                            <option value="Executive bus">Executive bus</option>
                            <option value="Double bus">Double bus</option>
                            <option value="Transit bus">Transit bus</option>
                            <option value="Party bus">Party bus</option>
                        </select>
                    </div>
                </div><?php */?>
                <div class="form-group">
                    <div class="col-sm-12">
                         <input type="number" value="" name="no_of_seats" class="form-control input-sm chosen_style" min=1 max=1000 placeholder="No of Passenger"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[hotels]" value="Yes"> Hotels
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[attractions]" value="Yes"> Attractions
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[restaurants]" value="Yes"> Restaurants
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[tour_guides]" value="Yes"> Tour Guides
                              </label>
                          </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-default pull-right">Search</button>
                    </div>
                </div>
            <?php echo form_close();?>

        </div>
        <div role="tabpanel" class="tab-pane fade in" id="profile">

            <?php 
			  $attributes = array('name' => 'search','class'=>'form-horizontal','id'=>'by_company');
			  echo form_open('Home/search', $attributes);
		    ?>
                <div class="form-group">
                    <input type="hidden" value="2" name="searched_tab" />
                    <!--<label for="state" class="col-sm-2 control-label">State</label>-->
                    <div class="col-sm-12">
                        <select name="company" id="company" class="form-control input-sm chosen-select">
                            <option value="">SELECT COMPANY</option>
                            <?php
							if($all_companies)
							{
								foreach($all_companies as $compnay)
								{
								?>
                                     <option value="<?php echo $compnay->id;?>"><?php echo $compnay->company_name;?></option>
                                <?php	
								}
							}
							?>
                        </select>
                    </div>
                </div>
                <?php /*?><div class="form-group">
                    <!--<label for="city" class="col-sm-2 control-label">City</label>-->
                    <div class="col-sm-12">
                        <select name="city" id="city" class="form-control input-sm">
                            <option value="">SELECT CITY</option>
                        </select>
                    </div>
                </div><?php */?>
                <div class="form-group">
                    <div class="col-sm-12">
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[hotels]" value="Yes"> Hotels
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[attractions]" value="Yes"> Attractions
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[restaurants]" value="Yes"> Restaurants
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[tour_guides]" value="Yes"> Tour Guides
                              </label>
                          </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn  btn-default pull-right">Search</button>
                    </div>
                </div>
            <?php echo form_close();?>

        </div>
        <div role="tabpanel" class="tab-pane fade in" id="messages">

            <?php 
			  $attributes = array('name' => 'search','class'=>'form-horizontal','id'=>'by_county');
			  echo form_open('Home/search', $attributes);
		    ?>
                <div class="form-group">
                    <input type="hidden" value="3" name="searched_tab" />
                    <!--<label for="state" class="col-sm-2 control-label">State</label>-->
                    <div class="col-sm-12">
                        <select name="state_id" id="state_id" class="form-control input-sm chosen-select">
                            <option value="">SELECT STATE</option>
                            <?php
							if($all_states->num_rows()>0)
							{
								$states=$all_states->result();
								foreach($states as $key=>$val)
								{
								?>
                                    <option value="<?php echo $val->id;?>"><?php echo $val->state_name;?></option>
                                <?php
								}
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <!--<label for="city" class="col-sm-2 control-label">City</label>-->
                    <div class="col-sm-12" id="county_div">
                        <select name="county" id="county" class="form-control input-sm chosen-select">
                            <option value="">SELECT COUNTY</option>
                        </select>
                    </div>
                    <div class="col-sm-12 hidden" id="county_loading_div">
                       <span class="form-control input-sm"><img src="<?php echo base_url();?>images/general/loading.gif" /></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[hotels]" value="Yes"> Hotels
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[attractions]" value="Yes"> Attractions
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[restaurants]" value="Yes"> Restaurants
                              </label>
                          </div>
                          <div class="checkbox-inline">
                              <label>
                                  <input type="checkbox" name="travel_needs[tour_guides]" value="Yes"> Tour Guides
                              </label>
                          </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-default pull-right">Search</button>
                    </div>
                </div>
            <?php echo form_close();?>

        </div>
    </div>
</div>
<!--/End of Search Form-->

<!--Start of Carousel-->
<div id="carousel-example-generic" class="dream carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php echo base_url('images'); ?>/slider_images/01.jpg" alt="...">
            <div class="carousel-caption">
                First Slide
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url('images'); ?>/slider_images/02.jpg" alt="...">
            <div class="carousel-caption">
                Second Slide
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url('images'); ?>/slider_images/03.jpg" alt="...">
            <div class="carousel-caption">
                Third Slide
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>