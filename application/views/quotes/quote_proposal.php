<?php include(APPPATH.'/views/admin/includes/header.php'); ?>
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('design/admin') ?>/plugins/select2/select2.css" />
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/css/DT_bootstrap.css" />
<link href="<?php echo base_url('design/admin/plugins/datepicker'); ?>/css/datepicker.css" rel="stylesheet">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<style>
.datepicker{z-index:1151 !important;}
</style>
<?php
$user_type=$this->session->userdata('user_type');
?>
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
								<h4 class="modal-title">Proposal Details <span id="loading_span" class="hidden"><img src="<?php echo base_url();?>images/general/loading.gif" /></span></h4>
							</div>
							<div class="modal-body" id="details_div">
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
								  
                                  if($user_type==1)
								  {
								  ?>
                                      <table class="table table-striped table-bordered table-hover table-full-width" style="margin-top:10px !important">
                                          <tbody>
                                                <tr>
                                                    <td colspan="12" class="center"><span class="label label-primary" style="font-size:15px !important; line-height:2 !important;">Estimated Trip Cost : $ <?php echo $quote->cost;?></span></td>
                                                </tr>
                                          </tbody>
									  </table>
                                  <?php
								  }
								  ?>
                                  <div id="proposal_details_div" style="display:inline-block;">
                                     
                                  </div>
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
									Quote Proposals
								</li>
							</ol>
							<div class="page-header">
								<h1>Quote Proposals</h1>
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
									Quote #: <?php echo $quote->id;?> Proposals
									<div class="panel-tools">
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th>Sr#&nbsp;</th>
												<th>Proposal By</th>
                                                <th>Proposal Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                         <?php
										 if(isset($quote_proposals) && !empty($quote_proposals))
										 {
										   $count=1;
                                           foreach($quote_proposals as $key=>$val)
                                           {
                                        ?>
											<tr>
												<td><?php echo $count;?></td>
                                                <td><?php echo $val->first_name." ".$val->last_name?></td>
                                                <td>
                                                   <?php 
												     $rcv_date=date('Y-m-d',strtotime($val->added_at));
												     echo american_date_format($rcv_date);
												   ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($val->status==1)
													{
													   if($user_type==1)
													   {
														   $status_text="Proposal Received";
													   }
													   else
													   {
														   $status_text="Proposal Sent";
													   }
													?>
													   <span class='label label-default'><?php echo $status_text;?></span>
													<?php  
													}
													elseif($val->status==2)
													{
													?>
													   <span class='label label-danger'>Proposal Rejected</span>
													<?php
													}
													?>
                                                </td>
                                                <td>
                                                   <a class="btn btn-green proposal_details_btn" id="<?php echo $val->id;?>" href="#panel-config" data-toggle="modal"><i class="fa fa-search"></i> Proposal Details</a>
                                                </td>
											</tr>
                                        <?php
										    $count++;
										   }
										 }
										?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- end: DYNAMIC TABLE PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
<?php include(APPPATH.'/views/admin/includes/header.php'); ?>  
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
        <script src="<?php echo base_url('design/front') ?>/js/toastr.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
				
			    $('.proposal_details_btn').click(function()
			    {
					var id=$(this).attr('id');
					$('#proposal_details_div').html(" ");
					$('#loading_span').removeClass('hidden');
					$.ajax({
							type: "POST",
							url: "<?php echo base_url('Quotes/get_proposal_details');?>",
							data:{id:id},
							success: function(data)
							{
								var proposal_details = JSON.parse(data);
								$('#loading_span').addClass('hidden');
								$('#proposal_details_div').html(" ");
								$('#proposal_details_div').html(proposal_details);
							},
					});
				});
				$(document).on("keyup","#deposit_percentage",function()
				{
				   var amount_percentage=$(this).val();
				   var trip_cost=$('#trip_cost').val();
				   var proposal_id=$('#proposal_id').val();
				   if(amount_percentage>=0)
				   {
					   if(trip_cost!='' && trip_cost>0)
					   {
						   var d_amount=trip_cost*amount_percentage/100;
						   var f_amount=trip_cost-d_amount;
						   $('#deposit_amount').val(d_amount);
						   $('#final_payment').val(f_amount);
						   $.ajax({
							type: "POST",
							url: "<?php echo base_url('Quotes/proposal_admin_pricing');?>",
							data:{trip_cost:trip_cost,deposit_percentage:amount_percentage,deposit_amount:d_amount,final_payment:f_amount,proposal_id:proposal_id},
							success: function(data)
							{
								var msg = JSON.parse(data);
								if(msg==1)
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
					                toastr.success('Prices successfully updated');
								}
								else
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
					                toastr.error('Some thing went wrong.Try again');
								}
							},
					    });
					   }
					   else
					   {
						   $('#deposit_percentage').val('');
						   alert('Enter trip cost first');
					   }
				   }
				   else
				   {
					   $('#deposit_amount').val('');
					   $('#final_payment').val('');
					   $('#deposit_percentage').val('');
					   alert('Deposit amount should be a number and greater than 0');
				   }
				});
				$(document).on("keyup","#trip_cost",function()
				{
					var trip_cost=$(this).val();
				    var amount_percentage=$('#deposit_percentage').val();
					var proposal_id=$('#proposal_id').val();
					if(amount_percentage>=0 && trip_cost!='' && trip_cost>0)
				    {
						var d_amount=trip_cost*amount_percentage/100;
					    var f_amount=trip_cost-d_amount;
					    $('#deposit_amount').val(d_amount);
					    $('#final_payment').val(f_amount);
						$.ajax({
							type: "POST",
							url: "<?php echo base_url('Quotes/proposal_admin_pricing');?>",
							data:{trip_cost:trip_cost,deposit_percentage:amount_percentage,deposit_amount:d_amount,final_payment:f_amount,proposal_id:proposal_id},
							success: function(data)
							{
								var msg = JSON.parse(data);
								if(msg==1)
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
					                toastr.success('Prices successfully updated');
								}
								else
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
					                toastr.error('Some thing went wrong.Try again');
								}
							},
					    });
					}
				});
				$('.date_calander').datepicker({
			
			      format:"mm-dd-yyyy"
		       });
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>