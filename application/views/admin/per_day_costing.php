<?php 
 include('includes/header.php');
?>
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('design/admin') ?>/plugins/select2/select2.css" />
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/css/DT_bootstrap.css" />
<link href="<?php echo base_url('design/admin/plugins/datepicker'); ?>/css/datepicker.css" rel="stylesheet">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<style>
.datepicker{z-index:1151 !important;}
</style>
<?php
 include('includes/sidebar.php');
?>
			<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
                
				<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title">Add New Per Day Cost</h4>
							</div>
                            <?php
							$attributes = array('name' => 'add_per_day_cost');
							echo form_open('admin/add_per_day_cost', $attributes);
							?>
                                 <div class="modal-body">
									  <label>Per Day Cost<span class="symbol required"></span></label>
									  <input type="number" class="form-control" name="per_day_cost" placeholder="Per mile cost" required>
									  <label>Start Date<span class="symbol required"></span></label>
									  <input type="text" class="form-control date_calander" name="start_date" placeholder="Start Date" required>
									  <label>End Date<span class="symbol required"></span></label>
									  <input type="text" class="form-control date_calander" name="end_date" placeholder="End Date" required>
								  </div>
								  <div class="modal-footer">
									  <button type="button" class="btn btn-default" data-dismiss="modal">
										  Close
									  </button>
									  <button type="submit" class="btn btn-primary">
										  Save changes
									  </button>
								  </div>
                             <?php echo form_close();?>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
                
                <div class="modal fade" id="edit-panel-config" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title">Edit Cost</h4>
							</div>
                            <?php
							$attributes = array('name' => 'edit_per_day_cost');
							echo form_open('admin/edit_per_day_cost', $attributes);
							?>
							<div class="modal-body">
                                <label>Per Day Cost<span class="symbol required"></span></label>
								<input type="number" class="form-control" name="per_day_cost" id="perday_cost" value="" required>
                                <label>start Date<span class="symbol required"></span></label>
                                <input type="text" class="form-control date_calander" name="start_date" id="s_date" value="" required>
                                <label>End Date<span class="symbol required"></span></label>
                                <input type="text" class="form-control date_calander" name="end_date" id="e_date" value="" required>
                                <input type="hidden" class="form-control" name="cost_id" id="cost_id" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Close
								</button>
								<button type="submit" class="btn btn-primary">
									Save changes
								</button>
							</div>
                            <?php echo form_close();?>
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
									Per Day Costing
								</li>
							</ol>
							<div class="page-header">
								<h1>Per Day Costing</h1>
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
									Per Day Costing
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-plus"></i> Add Per Day Cost</a>
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th>Sr#</th>
												<th>Per Mile Cost</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                         <?php
										 if(isset($per_day_costing) && !empty($per_day_costing))
										 {
										   $count=1;
                                           foreach($per_day_costing as $key=>$val)
                                           {
                                        ?>
											<tr>
												<td><?php echo $count;?></td>
												<td><?php echo "$ ".$val->per_day;if($key==0) echo "&nbsp;&nbsp;<span class='label label-danger'>Default Cost</span>";?></td>
                                                <td><?php echo american_date_format($val->start_date);?></td>
                                                <td><?php echo american_date_format($val->end_date);?></td>
                                                <td>
                                                    <?php
                                                    if($val->status==1)
													{
													?>
													   <span class='label label-success'>Active</span>
													<?php  
													}
													else
													{
													?>
													   <span class='label label-danger'>Inactive</span>
													<?php
													}
													?>
                                                </td>
                                                <td>
                                                  <?php
												  if($key>0)
												  {
													  if($val->status==1)
													  {
													  ?>
														 <a href="<?php echo $this->config->base_url();?>Admin/change_status/<?php echo $val->id;?>/perday/0" class="btn btn-bricky"><i class="fa fa-lock"></i> Inactive</a>
													  <?php  
													  }
													  else
													  {
													  ?>
														 <a href="<?php echo $this->config->base_url();?>Admin/change_status/<?php echo $val->id;?>/perday/1" class="btn btn-success"><i class="fa fa-unlock"></i> Active</a>
													  <?php
													  }
												  }
												  ?>
                                                  <?php /*?><a class="btn btn-green edit_cost" id="<?php echo $val->id;?>" href="#edit-panel-config" data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a>
                                                  <?php
												  if($key>0)
												  {
												  ?>
                                                     <a href="<?php echo $this->config->base_url();?>Admin/delete_per_day_cost/<?php echo $val->id;?>"  onClick="return confirm('Are you sure you want to delete it?')" class="btn btn-bricky"><i class="fa fa-times"></i> Delete</a>
                                                  <?php
												  }
												  ?><?php */?>
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
<?php 
 include('includes/footer.php');
?>    
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
				
			    $('.edit_cost').click(function()
			    {
					var id=$(this).attr('id');
					$.ajax({
							type: "POST",
							url: "<?php echo base_url('Admin/get_day_cost_details');?>",
							data:{id:id},
							success: function(data)
							{
								var rec = JSON.parse(data);
								$('#perday_cost').val(rec.per_day);
								$('#s_date').val(rec.start_date);
								$('#e_date').val(rec.end_date);
								$('#cost_id').val(rec.cost_id);
							},
					});
				});
				$('.date_calander').datepicker({
			
			      format:"mm-dd-yyyy"
		       });
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>