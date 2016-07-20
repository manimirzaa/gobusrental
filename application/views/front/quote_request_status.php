<?php include(APPPATH.'/views/front/includes/header.php'); ?>
<section class="section section-dark">
    <div class="container">
         <?php
		 if($this->session->flashdata('success')) 
		 { 
		 ?>
			  <div class="alert alert-success"><button class="close" data-dismiss="alert" type="button">&times;</button><?php echo $this->session->flashdata('success');?></div>
		 <?php 
		 } 
		 if($this->session->flashdata('error')) 
		 {
		 ?>
			   <div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">&times;</button><?php echo $this->session->flashdata('error');?></div>
		 <?php 
		 }
		 ?>
        <h2 class="text-center"><i class="glyphicon glyphicon-search circle-icon"></i> Quote Request Details!</h2>
        <div class="row top-buffer">
             <div class="thumbnail company_buses_div">
                  <div class="col-md-12">
                      <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <th><i class="glyphicon glyphicon-map-marker"></i> From:</th>
                                    <td><?php echo $quote_request_details->source;?></td>
                                </tr>
                                <?php
								if($quote_multi_cities)
								{
								?>
                                    <tr>
                                    <th><i class="glyphicon glyphicon-map-marker"></i> Cities(Waypoints):</th>
                                    <td>
                                <?php	
									foreach($quote_multi_cities as $v)
									{
										echo $v->locations."<br>"; 
									}
							     ?>
                                    </td>
                                    </tr>
                                 <?php
								}
								?>
                                <tr>
                                    <th><i class="glyphicon glyphicon-map-marker"></i> To:</th><td><?php echo $quote_request_details->destination;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-calendar"></i> Pick Up Date:</th><td><?php echo $quote_request_details->from_date;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-time"></i> Pick Up Time:</th><td><?php echo $quote_request_details->from_time;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-calendar"></i> End Date:</th><td><?php echo $quote_request_details->to_date;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-user"></i> No of Passengers:</th><td><?php echo $quote_request_details->no_of_passengers;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-bed"></i> No of Buses:</th><td><?php echo $quote_request_details->no_of_buses;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-user"></i> No of Extra Drivers:</th><td><?php echo $quote_request_details->no_of_extra_drivers;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-time"></i> Drive(Duration):</th><td><?php echo $quote_request_details->drive;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-road"></i> By Road Distance:</th><td><?php echo $quote_request_details->distance;?></td>
                                </tr>
                                <tr>
                                    <th><i class="glyphicon glyphicon-usd"></i> Estimated Trip Cost:</th><td><?php echo "<i class='glyphicon glyphicon-usd'></i> ".$quote_request_details->cost;?></td>
                                </tr>
                            </tbody>
                        </table>
                  </div>
             </div>
        </div>
	</div>
</section>
<?php include(APPPATH.'/views/front/includes/footer.php'); ?> 
