<?php 
 include('includes/header.php');
?>
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('design/admin') ?>//plugins/select2/select2.css" />
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/css/DT_bootstrap.css" />
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
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
								<h4 class="modal-title">Panel Configuration</h4>
							</div>
							<div class="modal-body">
								Here will be a configuration form
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Close
								</button>
								<button type="button" class="btn btn-primary">
									Save changes
								</button>
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
					
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-md-12">
							<!-- start: DYNAMIC TABLE PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									All Users List
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
										<a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
										<a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
										<a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th>S.No</th>
												<th class="hidden-xs">User Name</th>
												<th>State</th>
												<th class="hidden-xs">City</th>
                                                <th class="hidden-xs">Address</th>
												<th>Phone</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Date Added</th>
                                                <th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                         <?php
										  $count=1;
                                         foreach($users as $key=>$val)
                                           {
											 
                                        ?>
											<tr>
												<td><span class="badge"><?php echo $count;  ?></span></td>
								<td class="hidden-xs">
								<?php echo $val->first_name." ".$val->middle_name." ".$val->last_name; ?>
                                </td>
												<td><?php echo $val->state; ?></td>
												<td class="hidden-xs"><?php echo $val->city; ?></td>
                                                <td class="hidden-xs"><?php echo $val->address; ?></td>
												<td><?php echo $val->phone_no; ?></td>
                                                <td><?php echo $val->email; ?></td>
                                                 <td>
												 <?php 
												 if($val->status==1) 
												   {
												 ?>
                                                 <button class="btn btn-green  btn-sm" type="button"> Approved </button>
                                                 <?php
												   }
												  else
												   {
												 ?>
                                                 <button class="btn btn-bricky  btn-sm" type="button"> UnApproved </button>
                                                 <?php
												   }
												 ?>
                                                 </td>
                                                <td><?php echo $val->date_added; ?></td>
                                                <td>
                                 <a href="<?php echo base_url();?>user/user_profile/<?php echo $val->id; ?>">
                                 
                                 <button class="btn btn-teal ladda-button" data-style="expand-right">
											<span class="ladda-label"> Details </span>
											<i class="fa fa-arrow-circle-right"></i>
											<span class="ladda-spinner"></span>
										<span class="ladda-spinner"></span></button>
                                
                                 </a><br>
                                
                                                 </td>
											</tr>
                                        <?php
										$count++;
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
	   <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/bootbox/bootbox.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('design/admin') ?>/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/js/table-data.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>