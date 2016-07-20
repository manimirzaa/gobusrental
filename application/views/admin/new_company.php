<?php 
 include('includes/header.php');
 include('includes/sidebar.php');
?>
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">

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
								<h1>Company  Registration <small>form</small></h1>
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
									Enter Company Details
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
<form action="<?php echo site_url('company/register_company');?>" method="post" enctype="multipart/form-data" role="form" id="register-form">
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
                                    Company Owner
                                    </label>
                                    <select name="onwer_id" class="form-control" id="onwer_id">
                                    <option value="">SELECT OWNER NAME</option>
									<?php
                                    foreach($users as $key=>$val)
                                    {
                                    ?>
         <option value="<?php echo $val->id;?>"><?php echo $val->first_name." ".$val->middle_name." ".$val->last_name;?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Comapny Name <span class="symbol required"></span>
                                    </label>
                   <input type="text" placeholder="Enter Company Name" class="form-control" id="comp_name" name="comp_name">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Country <span class="symbol required"></span>
                                    </label>
                   <input type="text" value="USA" class="form-control" readonly="readonly" id="country" name="country">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    State <span class="symbol required"></span>
                                    </label>
                                    <select name="state" class="form-control" id="state">
                                     <option value="">SELECT STATE</option>
                                    <?php
										$all_states=get_all_states();
										
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
                       <div class="form-group">
                            <label class="control-label">
                            City <span class="symbol required"></span>
                            </label>
                              <div class="col-sm-12" id="cities_div">
                                    <select name="city" id="city" class="form-control input-sm chosen-select">
                                    <option value="">SELECT CITY</option>
                                    </select>
                                </div>
                     <div class="col-sm-12 hidden" id="loading_div">
                      <span class="form-control input-sm"><img src="<?php echo base_url();?>images/general/loading.gif" /></span>
                     </div>
                      </div>  
                                    <div class="form-group">
                                    <label class="control-label">
                                    Address <span class="symbol required"></span>
                                    </label>
            <input type="text" placeholder="Enter Your Address" class="form-control" id="address" name="address">
                                    </div>     
                                    <div class="form-group">
                                    <label class="control-label">
                                    Zip <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="Zip Code" class="form-control" id="zip_code" name="zip_code">
                                    </div>         
                                    
                                    <div class="form-group">
                                    <label class="control-label">
                                    Company Phone <span class="symbol required"></span>
                                    </label>
           <input type="text" placeholder="Company Phone" class="form-control" id="comp_phone" name="comp_phone">
                                    </div>
                                    
                                    <div class="form-group">
                                    <label class="control-label">
                                    Company Alt phone
                                    </label>
          <input type="text" placeholder="Company Alternate Phone" class="form-control" id="comp_phone_alt" name="comp_phone_alt">
                                    </div>                                                                                  
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">
                                    Email Address <span class="symbol required"></span>
                                    </label>
                                    <input type="email" placeholder="Email Address" class="form-control" id="email" name="email">
                                    </div>
                                    
                                    <div class="form-group">
                                    <label class="control-label">
                                    Website
                                    </label>
                                    <input type="text" class="form-control" id="website" name="website">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Area Of Service
                                    </label>
              <input type="text" placeholder="Area of Service" class="form-control" id="service_area" name="service_area">
                                    </div>
                                    
                                    <div class="form-group">
                                    <label class="control-label">
                                    Association 1
                                    </label>
             <input type="text" placeholder=" Association 1 " class="form-control" id="associat_1" name="associat_1">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Association 2
                                    </label>
            <input type="text" placeholder="Association 2" class="form-control" id="associat_2" name="associat_2">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Association 3
                                    </label>
           <input type="text" placeholder="Association 3" class="form-control" id="associat_3" name="associat_3">
                                    </div>   
                                    <p>
                                    Payment Methods
                                    </p>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-black" value="Y" name="visa">
                                    Visa
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-grey" value="Y" name="master_card">
                                    Master Card
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-red" value="Y"  name="american_express">
                                    American Express 	
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-green" value="Y" name="discover">
                                    Discover
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="square-teal" value="Y" name="paypal">
                                    Paypal
                                    </label>    
                                    <div class="form-group">
                                    <label>
                                    Logo Image
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
                                    <input type="file" class="file-input" name="logo_img">
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
                                    <div class="col-md-8">
                                    <p>
                                    By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
                                    </p>
                                    </div>
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
 include('includes/footer1.php');
?>
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url('design/admin') ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/summernote/build/summernote.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/js/form-validation.js"></script>
        <script src="<?php echo base_url('design/admin') ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			$(document).ready(function() {
				
				Main.init();
				FormValidator.init();
				
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
		</script>
        

