<?php 
 include('includes/header.php');
?>
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/bootstrap-social-buttons/social-buttons-3.css">
<link href="<?php echo base_url('design/admin/plugins/datepicker'); ?>/css/datepicker.css" rel="stylesheet">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<?php
 include('includes/sidebar.php');
?>
			<div class="main-content">
               <div class="modal fade" id="panel-config1" tabindex="-1" role="dialog" aria-hidden="true">
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
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
			
				<!-- /.modal -->
                
                
                
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-file"></i>
									<a href="#">
										Dashboards
									</a>
								</li>
								<li class="active">
									User  Profile
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
<h1>User Profile  <small><?php echo $user_details->first_name." ".$user_details->middle_name." ".$user_details->last_name; ?></small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
                        
					</div>
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
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-12">
							<div class="tabbable">
								<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
									<li class="active">
										<a data-toggle="tab" href="#panel_overview">
											Overview
										</a>
									</li>
                                    <li>
										<a data-toggle="tab" href="#panel_edit_account">
											Edit Account
										</a>
									</li>
                                    <li>
										<a data-toggle="tab" href="#panel_projects">
											Quotes
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="panel_overview" class="tab-pane in active">
										<div class="row">
											<div class="col-sm-5 col-md-4">
												<div class="user-left">
													<div class="center">
				<h4><?php echo $user_details->first_name." ".$user_details->middle_name." ".$user_details->last_name; ?></h4>
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="user-image">
						<div class="fileupload-new thumbnail">
                       <img src="<?php echo site_url()."images/profile_pics/".$user_details->picture; ?>" alt="">
				       </div>
					
															</div>
														</div>
														<hr>
													</div>
													
													<table class="table table-condensed table-hover">
														<thead>
															<tr>
																<th colspan="3">General information</th>
															</tr>
														</thead>
														<tbody>
															<tr>
													    <td>Name:</td>
			    <td><?php echo $user_details->first_name." ".$user_details->middle_name." ".$user_details->last_name; ?></td>
															</tr>
                                                            <tr>
																<td>Country</td>
																<td>
																	<?php echo $user_details->country;  ?>
                                                                </td>
															</tr>
                                                            <tr>
																<td>State</td>
																<td>
																	<?php echo $user_details->state;  ?>
                                                                </td>
															</tr>
                                                            <tr>
																<td>City</td>
																<td>
																	<?php echo $user_details->city;  ?>
                                                                </td>
															</tr>
                                                            <tr>
																<td>Address</td>
																<td>
																	<?php echo $user_details->address;  ?>
                                                                </td>
															</tr>
                                                            <tr>
																<td>Organization</td>
																<td>
																	<?php echo $user_details->organization;  ?>
                                                                </td>
															</tr>
                                                            <tr>
																<td>Status</td>
																<td>
															  <?php 
															  if($user_details->status==1)
															    {  
																 echo "Approved";
																}
															  else
															    {
																 echo "UnApproved";
																}
															  ?>
                                                                </td>
															</tr>
                                                            <tr>
																<td>Date Added</td>
																<td>
																	<?php echo $user_details->date_added;  ?>
                                                                </td>
															</tr>
														</tbody>
													</table>
                                                    <table class="table table-condensed table-hover">
														<thead>
															<tr>
																<th colspan="3">Contact Information</th>
															</tr>
														</thead>
														<tbody>
														
															<tr>
																<td>email:</td>
																<td>
																<a href="<?php echo $user_details->email;  ?>">
																	<?php echo $user_details->email;  ?>
																</a></td>
															</tr>
                                                            
															<tr>
																<td>phone:</td>
																<td><?php echo $user_details->phone_no;  ?></td>
															</tr>
                                                            <tr>
																<td>Mobile:</td>
																<td><?php echo $user_details->mobile_no;  ?></td>
															</tr>
                                                            <tr>
															<td>Emergency Contact No:</td>
															<td><?php echo $user_details->emergency_contact_no;  ?></td>
															</tr>
                                                            <tr>
															<td>Fax:</td>
															<td><?php echo $user_details->fax;?></td>
															</tr>
															
														</tbody>
													</table>
													
												</div>
											</div>
											<div class="col-sm-7 col-md-8">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas convallis porta purus, pulvinar mattis nulla tempus ut. Curabitur quis dui orci. Ut nisi dolor, dignissim a aliquet quis, vulputate id dui. Proin ultrices ultrices ligula, dictum varius turpis faucibus non. Curabitur faucibus ultrices nunc, nec aliquet leo tempor cursus.
												</p>
												<div class="row">
													<div class="col-sm-3">
														<button class="btn btn-icon btn-block">
															<i class="clip-clip"></i>
															Projects <span class="badge badge-info"> 4 </span>
														</button>
													</div>
													<div class="col-sm-3">
														<button class="btn btn-icon btn-block pulsate">
															<i class="clip-bubble-2"></i>
															Messages <span class="badge badge-info"> 23 </span>
														</button>
													</div>
													<div class="col-sm-3">
														<button class="btn btn-icon btn-block">
															<i class="clip-calendar"></i>
															Calendar <span class="badge badge-info"> 5 </span>
														</button>
													</div>
													<div class="col-sm-3">
														<button class="btn btn-icon btn-block">
															<i class="clip-list-3"></i>
															Notifications <span class="badge badge-info"> 9 </span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    <div id="panel_edit_account" class="tab-pane">
   <form action="<?php echo site_url('user/edit_user');?>" role="form" id="form" enctype="multipart/form-data" method="post">
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
<input type="text" value="<?php echo $user_details->first_name;  ?>" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Middle Name 
                            </label>
    <input type="text" value="<?php echo $user_details->middle_name;?>" class="form-control" id="middle_name" name="middle_name">
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Last Name <span class="symbol required"></span>
                            </label>
      <input type="text" value="<?php echo $user_details->last_name;?>" class="form-control" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Orgnization
                            </label>
  <input type="text" class="form-control" id="organization" name="organization" value="<?php echo $user_details->organization;?>">
                            </div>
                            <div class="form-group">
                            <label class="control-label">
                            Country <span class="symbol required"></span>
                            </label>
      <input type="text" class="form-control" value="<?php echo $user_details->country;?>" id="country" name="country" readonly>
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
						<option value="<?php echo $val->id;?>" <?php if($val->id==$user_details->state){?> selected<?php }?>>
										<?php echo $val->state_name;?>
                                        </option>
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
                          <option value="<?php echo $user_details->city; ?>" selected><?php echo $user_details->city; ?></option>
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
             <input type="text" value="<?php echo $user_details->address; ?>" class="form-control" id="address" name="address">
                                </div>                        
			</div>
            <div class="col-md-6">
                 <div class="form-group">
            <label class="control-label">
            Email Address <span class="symbol required"></span>
            </label>
           <input type="email" value="<?php echo $user_details->email; ?>" class="form-control" id="email" name="email" required>
                 </div>
                  
                <div class="form-group">
                        <label class="control-label">
                        Phone<span class="symbol required"></span>
                        </label>
                <input type="text" value="<?php echo $user_details->phone_no; ?>" class="form-control" id="phone_no" name="phone_no" required>
                </div>

              <div class="form-group">
                <label class="control-label">
                  Mobile 
                </label>
         <input type="text" value="<?php echo $user_details->mobile_no; ?>" class="form-control" id="mobile_no" name="mobile_no">
            </div>
           <div class="form-group">
                <label class="control-label">
                Emergency Phone
                </label>
        <input type="text" value="<?php echo $user_details->emergency_contact_no; ?>" class="form-control" id="emergency_contact_no" name="emergency_contact_no">
            </div>
           <div class="form-group">
                <label class="control-label">
                Fax
                </label>
       <input type="text" value="<?php echo $user_details->fax; ?>" class="form-control" id="fax" name="fax">
                 <input type="hidden" name="user_id" value="<?php echo $user_details->id; ?>">
                  <input type="hidden" name="old_pic" value="<?php echo $user_details->picture; ?>">
            </div>
            
        <div class="form-group">
                                                <label>
                                                 Profile Picture
                                                </label>
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
     <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
     <img src="<?php echo site_url()."images/profile_pics/".$user_details->picture; ?>" alt="">
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                                    <div class="user-edit-image-buttons">
<span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Change Profile Picture</span>
                                      <span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                      <input type="file" name="profil_picture">
                                     </span>
                                     <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                     <i class="fa fa-times"></i> Remove
                                      </a>
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
												<button id="submit" class="btn btn-yellow btn-block" type="submit">
													Update <i class="fa fa-arrow-circle-right"></i>
												</button>
											</div>
										</div>
									</form>
                                    </div>
                                    <div id="panel_projects" class="tab-pane">
										<table class="table table-striped table-bordered table-hover" id="projects">
											<thead>
												<tr>
												<th>Sr#</th>
												<th>Quote ID</th>
                                                <th>Comapny Name</th>
                                                <th>Status</th>
                                                <th>Quote Received Date</th>
                                                <th>Actions</th>
											</tr>
											</thead>
											<tbody>
                                             <?php 
										if(isset($quotes) && !empty($quotes))
										  {
										   $count=1;
                                           foreach($quotes as $key=>$val)
                                               {
											   ?>
											<tr>
												<td><span class="badge"><?php echo $count;  ?></td>
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
													   echo "<span class='label label-danger'>Quote rejected by company</span>";
												   }
												   elseif($val->quote_stage==1)
												   {
													   echo "<span class='label label-default'>Quote Received</span>";
												   }
												   elseif($val->quote_stage==2)
												   {
													   echo "<span class='label label-warning'>Quote Forwarded to Company</span>";
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
                                                  <?php /*?><a class="btn btn-green" href="<?php echo $this->config->base_url();?>Quotes/quote_details/<?php echo $val->id;?>"><i class="fa fa-search"></i> View Details</a><?php */?>
                                                  <a class="btn btn-green quote_details_btn" id="<?php echo $val->id;?>" href="#panel-config1" data-toggle="modal"><i class="fa fa-search"></i> Quote Details</a>
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
							</div>
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
<?php 
 include('includes/footer.php');
?>    
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url('design/admin')?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url('design/admin')?>/plugins/jquery.pulsate/jquery.pulsate.min.js"></script>
		<script src="<?php echo base_url('design/admin')?>/js/pages-user-profile.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				PagesUserProfile.init();
				
			});
		</script>
        <script>
			
		   $('#state').change(function()
			{
				//alert('------------');
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
			
			 $('.demo').click(function()
			    {
					
					var id=$(this).attr('id');
					//alert(id);
					$.ajax({
							type: "POST",
							url: "<?php echo base_url('fleets/get_fleet_details');?>",
							data:{id:id},
							success: function(data)
							{
								//alert(data);
								var rec = JSON.parse(data);
								$("#comp_id").val(rec.company_id);
								$('#quantity').val(rec.quantity);
								$('#no_of_seat').val(rec.no_of_seat);
								$('#manufacture_date').val(rec.manufacture_date);
								$('#fleet_id').val(rec.fleet_id);
								$('#old_photo').val(rec.old_photo);
								$('#bus_type').val(rec.bus_type);
								if(rec.rstm=='on')
								   {
								    $('#rstm').attr("checked", true);
								   }
								if(rec.cd=='on')
								   {
								    $('#cd').attr("checked", true);
								   }
								if(rec.dvd=='on')
								   {
								    $('#dvd').attr("checked", true);
								   }
								if(rec.stv=='on')
								   {
								    $('#stv').attr("checked", true);
								   }
								if(rec.wifi=='on')
								   {
								    $('#wifi').attr("checked", true);
								   }
								if(rec.pa=='on')
								   {
								    $('#pa').attr("checked", true);
								   }
								if(rec.ada=='on')
								   {
								    $('#ada').attr("checked", true);
								   }
								   
							    if(rec.alch=='on')
								   {
								    $('#alch').attr("checked", true);
								   }
							},
					});
				});
				
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
								//alert(data);
								var qt_details = JSON.parse(data);
								$('#loading_span').addClass('hidden');
								$('#quote_details_div').html(" ");
								$('#quote_details_div').html(qt_details);
							},
					});
				});
			
			$('#manufacture_date').datepicker({
			      format:"mm-dd-yyyy"
		       });
		</script>
        
	</body>
	<!-- end: BODY -->
</html>