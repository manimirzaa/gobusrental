<?php 
 include('includes/header.php');
 include('includes/sidebar.php');
?>
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<link href="<?php echo base_url('design/admin/plugins/datepicker'); ?>/css/datepicker.css" rel="stylesheet">

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
					<div class="row">
						<div class="col-sm-12">
							<!-- end: STYLE SELECTOR BOX -->
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-pencil"></i>
									<a href="<?php echo base_url();?>admin">
										Dashboard
									</a>
								</li>
								<li class="active">
									Add New Company
								</li>
								<li class="search-box">
									<form class="sidebar-search">
										<div class="form-group">
											<input type="text" placeholder="Start Searching...">
											<button class="submit">
												<i class="clip-search-3"></i>
											</button>
										</div>
									</form>
								</li>
							</ol>
							<div class="page-header">
								<h1>New Fleet <small>form</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-md-12">
							<!-- start: FORM VALIDATION 1 PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Enter Fleet Details
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
										<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<h2><i class="fa fa-pencil-square teal"></i> REGISTER</h2>
									<hr>
<form action="<?php echo site_url('fleets/add_fleet');?>" method="post" enctype="multipart/form-data" role="form" id="register-form">
                                    <div class="row">
                                    <div class="col-md-12">
                                    <?php 
									 if($this->session->flashdata('success')) 
									   { 
									?>
                                    <div class="successHandler alert alert-success">
                                    <i class="fa fa-ok"></i> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
									<?php
									   }
									?>
                                    <?php 
									 if($this->session->flashdata('error')) 
									   { 
									?>
                                    <div class="errorHandler alert alert-danger">
                                    <i class="fa fa-times-sign"></i> <?php echo $this->session->flashdata('error'); ?>
                                    </div>
									<?php
									   }
									?>
                                    <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                                    </div>
                                    <div class="successHandler alert alert-success no-display">
                                    <i class="fa fa-ok"></i> Your form validation is successful!
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">
                                    Company Name<span class="symbol required"></span>
                                    </label>
                                    <select name="comp_id" class="form-control" id="comp_id" required>
                                    <option value="">SELECT COMPANY NAME</option>
									<?php
                                    foreach($comps as $key=>$val)
                                    {
                                    ?>
         <option value="<?php echo $val->id;?>"><?php echo $val->company_name;?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Quantity <span class="symbol required"></span>
                                    </label>
                   <input type="text" placeholder="quantity" class="form-control" id="quantity" name="quantity" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Number Of Seat <span class="symbol required"></span>
                                    </label>
                   <input type="text" placeholder="quantity" class="form-control" id="no_of_seat" name="no_of_seat" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Manufacture Date <span class="symbol required"></span>
                                    </label>
           <input type="text" placeholder="Manufacture Date" class="form-control" id="manufacture_date" name="manufacture_date" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Bus Type<span class="symbol required"></span>
                                    </label>
                                    <select name="bus_type" class="form-control" id="bus_type" required>
                                    <option value="">SELECT BUS TYPE</option>
                                    <option value="Mini bus">Mini bus</option>
                                    <option value="School bus">School bus</option>
                                    <option value="Trolly bus">Trolly bus</option>
                                    <option value="Entertainer">Entertainer</option>
                                    <option value="Van">Van</option>
                                    <option value="Limo bus">Limo bus</option>
                                    <option value="Executive bus">Executive bus</option>
                                    <option value="Double bus">Double bus</option>
                                    <option value="Transit bus">Transit bus</option>
                                    <option value="Party bus">Party bus</option>
                                    <option value="Tour Operator">Tour Operator</option>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <p>
                                    Features
                                    </p>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-black" value="on" name="rstm" id="rstm">
                                    RSTM
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-grey" value="on" name="cd">
                                    CD
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-red" value="on"  name="dvd">
                                    DVD
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-green" value="on" name="stv">
                                    STV
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-teal" value="on" name="wifi">
                                    WIFI
                                    </label>    
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-teal" value="on" name="pa">
                                     PA
                                    </label>
                                    
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-teal" value="on" name="ada">
                                     ADA
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-teal" value="on" name="alch">
                                    ALCH
                                    </label>
                                    <div class="form-group">
                                    <label>
                                    PHOTO
                                    </label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <input type="hidden" value="" name="">
                                    <div class="input-group">
                                    <div class="form-control uneditable-input">
                                    <i class="fa fa-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                    </div>
                                    <div class="input-group-btn">
                                    <div class="btn btn-light-grey btn-file">
                                    <span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Select file</span>
                                    <span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Change</span>
                                    <input type="file" class="file-input" name="photo">
                                    </div>
                                    <a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
                                    <i class="fa fa-times"></i> Remove
                                    </a>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div>
                                    <span class="symbol required"></span>Required Fields
                                    <hr>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                    <button class="btn btn-yellow btn-block" type="submit">
                                    Register <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                    </div>
                                    </div>
</form>
								</div>
							</div>
							<!-- end: FORM VALIDATION 1 PANEL -->
						</div>
					</div>
					
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
<?php 
 include('includes/footer.php');
?>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url('design/admin') ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/summernote/build/summernote.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/ckeditor/adapters/jquery.js"></script>
        <script src="<?php echo base_url('design/admin/plugins/bootstrap-datepicker') ?>/js/bootstrap-datepicker.js"></script>


		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			$(document).ready(function() {
				
				Main.init();
				//FormValidator.init();
				
		   $('#state').change(function()
			{
			var state_id=$(this).val();
			$('#cities_div').addClass('hidden');
			$('#loading_div').removeClass('hidden');
			$.ajax({
			type: "POST",
			url: "<?php echo site_url('Home/ajax_state_cities');?>",
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
			});
			
			$('#manufacture_date').datepicker({
			      format:"mm-dd-yyyy"
		       });
		</script>
        

