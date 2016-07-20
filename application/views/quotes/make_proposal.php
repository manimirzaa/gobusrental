<?php include(APPPATH.'/views/admin/includes/header.php'); ?>
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('design/admin') ?>/plugins/select2/select2.css" />
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/css/DT_bootstrap.css" />
<link href="<?php echo base_url('design/admin/plugins/datepicker'); ?>/css/datepicker.css" rel="stylesheet">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<?php include(APPPATH.'/views/admin/includes/sidebar.php'); ?>
			<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
                
				<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title">Quote Details</h4>
							</div>
							<div class="modal-body" id="quote_details_div">
                            
							</div>
							
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
                
				<!-- /.modal -->
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#"> Dashboard </a>
								</li>
								<li class="active">
									Make Proposal
								</li>
							</ol>
							<div class="page-header">
								<h1>Make Proposal</h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-md-12">
							<!-- start: DYNAMIC TABLE PANEL -->
                            <?php 
							if($this->session->flashdata('success')) 
							{ ?>
									<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button">&times;</button><?php echo $this->session->flashdata('success');?></div>
							<?php 
							} ?>
							<?php 
							if($this->session->flashdata('error')) 
							{?>
									<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">&times;</button><?php echo $this->session->flashdata('error');?></div>
							<?php 
							}?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Quote #: <?php echo $quote->id;?>
									<div class="panel-tools">
									</div>
								</div>
								<div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-full-width">
                                         <thead>
                                              <tr>
                                                 <td colspan="12" class="center danger"><b>Bus Information</b></td>
                                              </tr>
                                              <tr>
                                                  <th>Type</th>
                                                  <th>Seats</th>
                                                  <th>Model</th>
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
                                          <?php
                                           if($quote->rstm)
                                           {
                                               $rstm='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $rstm='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           if($quote->cd)
                                           {
                                               $cd='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $cd='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           if($quote->dvd)
                                           {
                                               $dvd='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $dvd='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           if($quote->stv)
                                           {
                                               $stv='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $stv='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           if($quote->wifi)
                                           {
                                               $wifi='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $wifi='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           if($quote->pa)
                                           {
                                               $pa='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $pa='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           if($quote->ada)
                                           {
                                               $ada='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $ada='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           if($quote->alch)
                                           {
                                               $alch='<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                           }
                                           else
                                           {
                                               $alch='<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                           }
                                           ?>
                                          <tbody>
                                                <tr>
                                                    <td><?php echo $quote->bus_type;?></td>
                                                    <td><?php echo $quote->no_of_seat;?></td>
                                                    <td><?php echo $quote->manufacture_date;?></td>
                                                    <td><?php echo $rstm;?></td>
                                                    <td><?php echo $cd;?></td>
                                                    <td><?php echo $dvd;?></td>
                                                    <td><?php echo $stv;?></td>
                                                    <td><?php echo $wifi;?></td>
                                                    <td><?php echo $pa;?></td>
                                                    <td><?php echo $ada;?></td>
                                                    <td><?php echo $alch;?></td>
                                                </tr>
                                          </tbody>
		                              </table>
		
		                            <table class="table table-striped table-bordered table-hover table-full-width">
                                    <?php
                                      $locations="";
                                      $waypoints="";
                                      if($multi_locations)
                                      {	
                                          $waypoints='<th>Waypoints</th>';
                                          $locations.='<td>';
                                          foreach($multi_locations as $v)
                                          {
                                              $locations.=$v->locations."<br>"; 
                                          }
                                          $locations.='</td>';
                                      }
                                      if($quote->trip_type==1)
                                      {
                                          $trip_type="One Way";
                                      }
                                      elseif($quote->trip_type==2)
                                      {
                                          $trip_type="Round";
                                      }
                                      elseif($quote->trip_type==3)
                                      {
                                          $trip_type="Multi Days";
                                      }
                                      elseif($quote->trip_type==4)
                                      {
                                          $trip_type="Multi Cities";
                                      }
									 ?>
                                     <thead>
                                          <tr>
                                             <td colspan="12" class="center danger"><b>Quote Information</b></td>
                                          </tr>
                                          <tr>
                                              <th>Trip</th>
                                              <th>From</th>
                                              <?php echo $waypoints;?>
                                              <th>To</th>
                                              <th>From Date</th>
                                              <th>To Date</th>
                                              <th>Dept. Time</th>
                                              <th>No of Buses</th>
                                              <th>Extra Drivers</th>
                                              <th>Distance</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                            <tr>
                                                <td><?php echo $trip_type;?></td>
                                                <td><?php echo $quote->source;?></td>
                                                <?php echo $locations;?>
                                                <td><?php echo $quote->destination;?></td>
                                                <td><?php echo american_date_format($quote->from_date);?></td>
                                                <td><?php echo american_date_format($quote->to_date);?></td>
                                                <td><?php echo $quote->from_time;?></td>
                                                <td><?php echo $quote->no_of_buses;?></td>
                                                <td><?php echo $quote->no_of_extra_drivers;?></td>
                                                <td><?php echo $quote->distance;?></td>
                                            </tr>
                                      </tbody>
		                          </table>
		                          <?php
                                  if($quote->hotels)
                                  {
							      ?>
                                      <div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i> Hotels</span></div>
								  <?php
                                  }
                                  if($quote->restaurants)
                                  {
								  ?>
                                      <div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i>  Restaurants</span></div>
                                  <?php
                                  }
                                  if($quote->attractions)
                                  {
								  ?>
                                      <div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i>  Attractions</span></div>
                                  <?php
                                  }
                                  if($quote->tour_guide)
                                  {
								  ?>
                                      <div class="col-md-2"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i>  Tour Guide</span></div>
                                  <?php
                                  }
								  ?>
                                  <div class="col-md-12 alert alert-info">
                                  <?php
								  $attributes = array('name' => 'add_proposal');
								  echo form_open('Quotes/add_proposal', $attributes);
								  ?>
                                  <input type="hidden" name="quote_id" value="<?php echo $quote->id;?>" />
                                  <input type="hidden" id="trip_start_date" value="<?php echo $quote->from_date;?>" />
                                  <div class="col-md-3">
                                      <label>Trip Cost<span class="symbol required"></span></label>
                                      <input type="number" class="form-control" name="trip_cost" id="trip_cost" min="1" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Deposit Amount Percentage<span class="symbol required"></span></label>
                                      <input type="number" min=0 class="form-control" id="deposit_amount_percentage" name="deposit_amount_percentage" required>	
                                  </div>
                                  <div class="col-md-3">
                                      <label>Deposit Amount<span class="symbol required"></span></label>
                                      <input type="number" class="form-control" name="deposit_amount" id="deposit_amount" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Deposit Amount Due Date<span class="symbol required"></span></label>
                                      <input type="text" class="form-control date_calander" name="deposit_amount_due_date" id="deposit_date" readonly="readonly" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Final Payment<span class="symbol required"></span></label>
                                      <input type="number" class="form-control" name="final_payment" id="final_payment" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Final Payment Due Date<span class="symbol required"></span></label>
                                      <input type="text" class="form-control date_calander" name="final_payment_due_date" id="final_payment_date" readonly="readonly" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label>Comments</label>
                                      <textarea name="comments" class="form-control" rows="1"></textarea>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="driver_tip" value="Yes"> Driver Tip
                                        </label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="driver_room" value="Yes"> Driver Room
                                        </label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="tolls" value="Yes"> Tolls
                                        </label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="parking" value="Yes"> Parking
                                        </label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="driver_meal" value="Yes"> Driver Meal
                                        </label>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-primary pull-right">
                                              Save
                                          </button>
                                      </div>
                                  </div>
								  <?php echo form_close();?>
                                  </div>
								</div>
							</div>
							<!-- end: DYNAMIC TABLE PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
<?php include(APPPATH.'/views/admin/includes/footer.php'); ?>   
    	<script src="<?php echo base_url('design/admin') ?>/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url('design/admin') ?>/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/less/less-1.5.0.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
	   <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/bootbox/bootbox.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/js/table-data.js"></script>
        <script src="<?php echo base_url('design/admin/plugins/bootstrap-datepicker') ?>/js/bootstrap-datepicker.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
				
			    $('.date_calander').datepicker({
			
			      format:"mm-dd-yyyy"
		       });
			   
			   $('#deposit_date').change(function()
		       {
				   var d_d=$(this).val();
				   var mdy = d_d.split('-');
				   var deposit_date = mdy[2]+"-"+mdy[0]+"-"+mdy[1];
				   var trip_start_date=$('#trip_start_date').val();
				   if(new Date(trip_start_date) <= new Date(deposit_date))
				   {
					   $('#deposit_date').val('');
					   alert("Deposit date should be less than trip start date"); 
				   }
			   });
			   $('#final_payment_date').change(function()
		       {
				   var f_p_d=$(this).val();
				   var mdy = f_p_d.split('-');
				   var final_payment_date = mdy[2]+"-"+mdy[0]+"-"+mdy[1];
				   var trip_start_date=$('#trip_start_date').val();
				   if(new Date(trip_start_date) <= new Date(final_payment_date))
				   {
					   $('#final_payment_date').val('');
					   alert("Final payment date should be less than trip start date"); 
				   }
			   });
			   $('#deposit_amount_percentage').keyup(function()
			   {
				   var amount_percentage=$(this).val();
				   var trip_cost=$('#trip_cost').val();
				   if(amount_percentage>=0)
				   {
					   if(trip_cost!='')
					   {
						   var d_amount=trip_cost*amount_percentage/100;
						   var f_amount=trip_cost-d_amount;
						   $('#deposit_amount').val(d_amount);
						   $('#final_payment').val(f_amount);
					   }
					   else
					   {
						   $('#deposit_amount_percentage').val('');
						   alert('Enter trip cost first');
					   }
				   }
				   else
				   {
					   $('#deposit_amount').val('');
					   $('#final_payment').val('');
					   $('#deposit_amount_percentage').val('');
					   alert('Deposit amount should be a number and greater than 0');
				   }
			   });
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>