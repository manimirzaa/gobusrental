<?php include(APPPATH.'/views/admin/includes/header.php'); ?>
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('design/admin') ?>/plugins/select2/select2.css" />
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/css/DT_bootstrap.css" />
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
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
								<h4 class="modal-title">Quote Details <span id="loading_span" class="hidden"><img src="<?php echo base_url();?>images/general/loading.gif" /></span></h4>
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
									All Quotes
								</li>
							</ol>
							<div class="page-header">
								<h1>All Quotes</h1>
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
									All Quotes
									<div class="panel-tools">
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th>Sr#&nbsp;</th>
												<th>Quote ID&nbsp;</th>
                                                <th>Comapny Name</th>
                                                <th>Status</th>
                                                <th>Quote Received Date</th>
                                                <th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                         <?php
										 if(isset($all_quotes) && !empty($all_quotes))
										 {
										   $count=1;
                                           foreach($all_quotes as $key=>$val)
                                           {
                                        ?>
											<tr>
												<td><?php echo $count;?></td>
                                                <td><?php echo $val->id;?></td>
                                                <td><?php echo $val->company_name;?></td>
                                                <td>
												   <?php
												   if($val->quote_stage==0 && $val->status==2)
												   {
													   echo "<span class='label label-danger'>Quote rejected after receiving</span>";
												   }
												   if($val->quote_stage==0 && $val->status==3)
												   {
													   if($user_type==1)
													   {
														   $status_text="Quote rejected by company";
													   }
													   else
													   {
														   $status_text="Quote rejected";
													   }
													   echo "<span class='label label-danger'>".$status_text."</span>";
												   }
												   elseif($val->quote_stage==1)
												   {
													   echo "<span class='label label-default'>Quote Received</span>";
												   }
												   elseif($val->quote_stage==2)
												   {
													   if($user_type==1)
													   {
														   $status_text="Quote Forwarded to Company";
													   }
													   else
													   {
														   $status_text="Quote Received";
													   }
													   echo "<span class='label label-warning'>".$status_text."</span>";
												   }
												   elseif($val->quote_stage==3)
												   {
													   if($user_type==1)
													   {
														   $status_text="Proposal Received";
													   }
													   else
													   {
														   $status_text="Proposal Sent";
													   }
													   echo "<span class='label label-success'>".$status_text."</span>";
												   }
												   ?>
                                                </td>
                                                <td>
												   <?php 
												     $rcv_date=date('Y-m-d',strtotime($val->date_added));
												     echo american_date_format($rcv_date);
												   ?>
                                                </td>
                                                <td>
                                                  <a class="btn btn-green quote_details_btn" id="<?php echo $val->id;?>" href="#panel-config" data-toggle="modal"><i class="fa fa-search"></i> Quote Details</a>
                                                  <?php
												  if($val->quote_stage==3)
												  {
												  ?>
                                                     <a class="btn btn-info" href="<?php echo $this->config->base_url();?>Quotes/quote_proposal/<?php echo $val->id;?>"><i class="fa fa-search"></i> View Proposals</a>
                                                  <?php
										          }
										          ?>
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
				
			    $('.quote_details_btn').click(function()
			    {
					var id=$(this).attr('id');
					$('#quote_id').val(id);
					$('#rejcted_quote_id').val(id);
					$('#quote_details_div').html(" ");
					$('#loading_span').removeClass('hidden');
					$.ajax({
							type: "POST",
							url: "<?php echo base_url('Quotes/get_quote_details');?>",
							data:{id:id},
							success: function(data)
							{
								var qt_details = JSON.parse(data);
								$('#loading_span').addClass('hidden');
								$('#quote_details_div').html(" ");
								$('#quote_details_div').html(qt_details);
							},
					});
				});
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>