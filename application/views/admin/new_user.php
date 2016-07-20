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
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-pencil"></i>
									<a href="<?php echo base_url();?>admin">
										Dashboard
									</a>
								</li>
								<li class="active">
									Add New User
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
								<h1>User Registration <small>form</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
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
					<div class="row">
						<div class="col-md-12">
							<!-- start: FORM VALIDATION 1 PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Enter User Details
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
	<form action="<?php echo site_url('user/register_user');?>" role="form" id="form" enctype="multipart/form-data" method="post">
									<div class="row">
									<div class="col-md-12">
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
                            First Name <span class="symbol required"></span>
                            </label>
        <input type="text" placeholder="Insert your First Name" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Middle Name 
                            </label>
        <input type="text" placeholder="Insert your Middle Name" class="form-control" id="middle_name" name="middle_name">
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Last Name <span class="symbol required"></span>
                            </label>
       <input type="text" placeholder="Insert your Last Name" class="form-control" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Orgnization
                            </label>
       <input type="text" class="form-control" id="organization" name="organization">
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Country <span class="symbol required"></span>
                            </label>
      <input type="text" class="form-control" value="USA" id="country" name="country" readonly="readonly">
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            State <span class="symbol required"></span>
                            </label>
                            <select name="state" class="form-control" id="state" required>
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
                                    Address 
                                </label>
                  <input type="text" placeholder="Enter Your Address" class="form-control" id="address" name="address">
                                </div>                        
			</div>
            <div class="col-md-6">
                 <div class="form-group">
            <label class="control-label">
            Email Address <span class="symbol required"></span>
            </label>
             <input type="email" placeholder="Text Field" class="form-control" id="email" name="email" required>
                 </div>
            <div class="form-group">
                    <label class="control-label">
                        Password <span class="symbol required"></span>
                    </label>
                    <input type="password" class="form-control" name="password" id="password" required>
            </div>
                  <div class="form-group">
                    <label class="control-label">
                        Confirm Password <span class="symbol required"></span>
                    </label>
                    <input type="password" class="form-control" id="password_again" name="password_again" required>
                </div>
                <div class="form-group">
                        <label class="control-label">
                        Phone<span class="symbol required"></span>
                        </label>
                <input type="text" placeholder="Text Field" class="form-control" id="phone_no" name="phone_no" required>
                </div>

              <div class="form-group">
                <label class="control-label">
                  Mobile 
                </label>
                 <input type="text" placeholder="Text Field" class="form-control" id="mobile_no" name="mobile_no">
            </div>
           <div class="form-group">
                <label class="control-label">
                Emergency Phone
                </label>
        <input type="text" placeholder="Text Field" class="form-control" id="emergency_contact_no" name="emergency_contact_no">
            </div>
           <div class="form-group">
                <label class="control-label">
                Fax
                </label>
                <input type="text" placeholder="Text Field" class="form-control" id="fax" name="fax">
            </div>
            
        <div class="form-group">
                <label>
                    Profile Photo
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
                    <input type="file" class="file-input" name="profil_picture">
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
												<button id="submit" class="btn btn-yellow btn-block" type="submit">
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
<script src="<?php echo base_url('design/admin') ?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url('design/admin') ?>/js/form-validation.js"></script>
<script src="<?php echo base_url('design/admin') ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		Main.init();
		FormValidator.init();
	});
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
</script>
<script src="<?php echo base_url('design/admin') ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script>
	jQuery(function(){
        $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#password").val();
        var checkVal = $("#password_again").val();
        if (passwordVal == '') {
            $("#password").after('<span class="alert-danger">Please enter a password.</span>');
            hasError = true;
        } else if (checkVal == '') {
            $("#password_again").after('<span class="alert-danger">Please re-enter your password.</span>');
            hasError = true;
        } else if (passwordVal !== checkVal) {
            $("#password_again").after('<span class="alert-danger">Passwords do not match.</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
});

</script>

