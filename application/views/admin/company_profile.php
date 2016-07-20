<?php 
 include('includes/header.php');
?>
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/plugins/bootstrap-social-buttons/social-buttons-3.css">
<link href="<?php echo base_url('design/admin/plugins/datepicker'); ?>/css/datepicker.css" rel="stylesheet">


<link rel="stylesheet" href="<?php echo base_url('design/admin') ?>/css/custom.css">

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
				<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title">EDIT FLEET</h4>
							</div>
							<div class="modal-body">
								<form action="<?php echo site_url('fleets/edit_fleet');?>" method="post" enctype="multipart/form-data" role="form" id="register-form">
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
                   <input type="hidden"  class="form-control" id="fleet_id" name="fleet_id" required>
                   <input type="hidden"  class="form-control" id="old_photo" name="old_photo" required>
                   <input type="hidden" name="fleet_comp" id="fleet_comp" value="<?php echo $comp_details->id;?>">
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
           <input type="text" placeholder="quantity" class="form-control" id="manufacture_date" name="manufacture_date" required>
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
                                    <input type="checkbox" class="" value="on" name="rstm" id="rstm">
                                    RSTM
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="" value="on" name="cd" id="cd">
                                    CD
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="" value="on"  name="dvd" id="dvd">
                                    DVD
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="" value="on" name="stv" id="stv">
                                    STV
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="" value="on" name="wifi" id="wifi">
                                    WIFI
                                    </label>    
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="" value="on" name="pa" id="pa">
                                     PA
                                    </label>
                                    
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="" value="on" name="ada" id="ada">
                                     ADA
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="checkbox" class="" value="on" name="alch" id="alch">
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
                                    UPDATE <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                    </div>
                                    </div>
                            </form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Close
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
									<i class="clip-file"></i>
									<a href="#">
										Dashboards
									</a>
								</li>
								<li class="active">
									Company  Profile
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
								<h1>Company Profile <small><?php echo $comp_details->company_name; ?></small></h1>
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
                                    <li>
										<a data-toggle="tab" href="#panel_fleets">
											Fleets
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="panel_overview" class="tab-pane in active">
										<div class="row">
											<div class="col-sm-5 col-md-4">
												<div class="user-left">
													<div class="center">
														<h4><?php echo $comp_details->company_name; ?></h4>
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="user-image">
						<div class="fileupload-new thumbnail">
                       <img src="<?php echo site_url()."images/logos/".$comp_details->logo; ?>" alt="">
				       </div>
																<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
																<div class="user-image-buttons">
																	<span class="btn btn-teal btn-file btn-sm"><span class="fileupload-new"><i class="fa fa-pencil"></i></span><span class="fileupload-exists"><i class="fa fa-pencil"></i></span>
																		<input type="file">
																	</span>
																	<a href="#" class="btn fileupload-exists btn-bricky btn-sm" data-dismiss="fileupload">
																		<i class="fa fa-times"></i>
																	</a>
																</div>
															</div>
														</div>
														<hr>
														<!--<p>
															<a class="btn btn-twitter btn-sm btn-squared">
																<i class="fa fa-twitter"></i>
															</a>
															<a class="btn btn-linkedin btn-sm btn-squared">
																<i class="fa fa-linkedin"></i>
															</a>
															<a class="btn btn-google-plus btn-sm btn-squared">
																<i class="fa fa-google-plus"></i>
															</a>
															<a class="btn btn-github btn-sm btn-squared">
																<i class="fa fa-github"></i>
															</a>
														</p>-->
														<!--<hr>-->
													</div>
													<table class="table table-condensed table-hover">
														<thead>
															<tr>
																<th colspan="3">Contact Information</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Website</td>
																<td>
																<a href="<?php echo $comp_details->website;  ?>">
																	<?php echo $comp_details->website;  ?>
																</a>
                                                                </td>
					<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
															<tr>
																<td>email:</td>
																<td>
																<a href="<?php echo $comp_details->email;  ?>">
																	<?php echo $comp_details->email;  ?>
																</a></td>
				<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            
															<tr>
																<td>phone:</td>
																<td><?php echo $comp_details->company_phone;  ?></td>
				<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            <tr>
																<td>Alt phone:</td>
																<td><?php echo $comp_details->alt_phone;  ?></td>
			    <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
															
														</tbody>
													</table>
													<table class="table table-condensed table-hover">
														<thead>
															<tr>
																<th colspan="3">General information</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Name:</td>
																<td><?php echo $comp_details->company_name; ?></td>
				<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            <tr>
																<td>Owner Name:</td>
																<td><?php echo $comp_details->owner_id; ?></td>
				<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            
															<tr>
															<td>State</td>
															<td><?php echo $comp_details->state; ?></td>
				<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
															<tr>
														<td>City</td>
													<td><?php echo $comp_details->city; ?></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            <tr>
														<td>Street</td>
													<td><?php echo $comp_details->street; ?></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            <tr>
														<td>Zip</td>
													<td><?php echo $comp_details->zip; ?></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            <tr>
														<td>Association1</td>
													<td><?php echo $comp_details->association; ?></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            <tr>
														<td>Association2</td>
													<td><?php echo $comp_details->association2; ?></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                            <tr>
														<td>association3</td>
													<td><?php echo $comp_details->association1; ?></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
															<tr>
														    <td>Status</td>
		    <td><span class="label label-sm label-info"><?php echo $comp_details->status; ?></span></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
                                                        <tr>
														    <td>Creation Date: </td>
		    <td><span class="label label-sm label-info"><?php echo $comp_details->date_created; ?></span></td>
			<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
															</tr>
														</tbody>
													</table>
													<table class="table table-condensed table-hover">
														<thead>
															<tr>
													    <th colspan="3">Payment Information</th>
															</tr>
														</thead>
														<tbody>
                                                        <tr>
                                                        <td>Visa</td>
                                                        <td><?php echo $comp_details->visa; ?></td>
                         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Master Card</td>
                                                        <td><?php echo $comp_details->master_card; ?></td>
                         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                        <td>American Express</td>
                                                        <td><?php echo $comp_details->american_express; ?></td>
                         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Discover</td>
                                                        <td><?php echo $comp_details->discover; ?></td>
                         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Paypal</td>
                                                        <td><?php echo $comp_details->paypal;?></td>
                         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
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
												<div class="panel panel-white">
													<div class="panel-heading">
														<i class="clip-menu"></i>
														Recent Activities
														<div class="panel-tools">
															<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
															</a>
															<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
																<i class="fa fa-wrench"></i>
															</a>
															<a class="btn btn-xs btn-link panel-refresh" href="#">
																<i class="fa fa-refresh"></i>
															</a>
															<a class="btn btn-xs btn-link panel-close" href="#">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</div>
													<div class="panel-body panel-scroll" style="height:300px">
														<ul class="activities">
															<li>
																<a class="activity" href="javascript:void(0)">
																	<i class="clip-upload-2 circle-icon circle-green"></i>
																	<span class="desc">You uploaded a new release.</span>
																	<div class="time">
																		<i class="fa fa-time bigger-110"></i>
																		2 hours ago
																	</div>
																</a>
															</li>
															<li>
																<a class="activity" href="javascript:void(0)">
																	<img alt="image" src="assets/images/avatar-2.jpg">
																	<span class="desc">Nicole Bell sent you a message.</span>
																	<div class="time">
																		<i class="fa fa-time bigger-110"></i>
																		3 hours ago
																	</div>
																</a>
															</li>
															<li>
																<a class="activity" href="javascript:void(0)">
																	<i class="clip-data circle-icon circle-bricky"></i>
																	<span class="desc">DataBase Migration.</span>
																	<div class="time">
																		<i class="fa fa-time bigger-110"></i>
																		5 hours ago
																	</div>
																</a>
															</li>
															<li>
																<a class="activity" href="javascript:void(0)">
																	<i class="clip-clock circle-icon circle-teal"></i>
																	<span class="desc">You added a new event to the calendar.</span>
																	<div class="time">
																		<i class="fa fa-time bigger-110"></i>
																		8 hours ago
																	</div>
																</a>
															</li>
															<li>
																<a class="activity" href="javascript:void(0)">
																	<i class="clip-images-2 circle-icon circle-green"></i>
																	<span class="desc">Kenneth Ross uploaded new images.</span>
																	<div class="time">
																		<i class="fa fa-time bigger-110"></i>
																		9 hours ago
																	</div>
																</a>
															</li>
															<li>
																<a class="activity" href="javascript:void(0)">
																	<i class="clip-image circle-icon circle-green"></i>
																	<span class="desc">Peter Clark uploaded a new image.</span>
																	<div class="time">
																		<i class="fa fa-time bigger-110"></i>
																		12 hours ago
																	</div>
																</a>
															</li>
														</ul>
													</div>
												</div>
												<div class="panel panel-white">
													<div class="panel-heading">
														<i class="clip-checkmark-2"></i>
														To Do
														<div class="panel-tools">
															<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
															</a>
															<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
																<i class="fa fa-wrench"></i>
															</a>
															<a class="btn btn-xs btn-link panel-refresh" href="#">
																<i class="fa fa-refresh"></i>
															</a>
															<a class="btn btn-xs btn-link panel-close" href="#">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</div>
													<div class="panel-body panel-scroll" style="height:300px">
														<ul class="todo">
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc" style="opacity: 1; text-decoration: none;">Staff Meeting</span>
																	<span class="label label-danger" style="opacity: 1;"> today</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
																	<span class="label label-danger" style="opacity: 1;"> today</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc"> Hire developers</span>
																	<span class="label label-warning"> tommorow</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc">Staff Meeting</span>
																	<span class="label label-warning"> tommorow</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc"> New frontend layout</span>
																	<span class="label label-success"> this week</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc"> Hire developers</span>
																	<span class="label label-success"> this week</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc"> New frontend layout</span>
																	<span class="label label-info"> this month</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc"> Hire developers</span>
																	<span class="label label-info"> this month</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc" style="opacity: 1; text-decoration: none;">Staff Meeting</span>
																	<span class="label label-danger" style="opacity: 1;"> today</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
																	<span class="label label-danger" style="opacity: 1;"> today</span>
																</a>
															</li>
															<li>
																<a class="todo-actions" href="javascript:void(0)">
																	<i class="fa fa-square-o"></i>
																	<span class="desc"> Hire developers</span>
																	<span class="label label-warning"> tommorow</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
		                             <div id="panel_edit_account" class="tab-pane">
        <form action="<?php echo site_url('company/edit_company');?>" role="form" id="form" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Account Info</h3>
                                            <hr>
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
                    <option value="<?php echo $val->id;?>" <?php if($val->id==$comp_details->owner_id){?> selected<?php }?>>
                         <?php echo $val->first_name." ".$val->middle_name." ".$val->last_name;?>
                         </option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                                <label class="control-label">
                                                Comapny Name 
                                                </label>
   <input type="text" value="<?php echo $comp_details->company_name;  ?>" class="form-control" id="comp_name" name="comp_name">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                 Country
                                                </label>
                             <input type="text" value="USA" class="form-control" readonly id="country" name="country">                                            </div>
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
                  <option value="<?php echo $val->id;?>" <?php if($val->id==$comp_details->state){?> selected<?php } ?>>
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
                         <option value="<?php echo $comp_details->city?>" selected><?php echo $comp_details->city?></option>
                                            </select>
                                            <div class="col-sm-12 hidden" id="loading_div">
                      <span class="form-control input-sm"><img src="<?php echo base_url();?>images/general/loading.gif" /></span>
                     </div>

                                            </div>
                                            <div class="col-sm-12 hidden" id="loading_div">
                 <span class="form-control input-sm"><img src="<?php echo base_url();?>images/general/loading.gif" /></span>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label">
                                            Address <span class="symbol required"></span>
                                            </label>
                <input type="text" value="<?php echo $comp_details->street?>" class="form-control" id="address" name="address">
                                            </div>
                                        <div class="form-group">
                                        <label class="control-label">
                                        Zip <span class="symbol required"></span>
                                        </label>
               <input type="text" value="<?php echo $comp_details->zip?>" class="form-control" id="zip_code" name="zip_code">
                                        </div>
                                        <div class="form-group">
                                    <label class="control-label">
                                    Company Phone <span class="symbol required"></span>
                                    </label>
     <input type="text" value="<?php echo $comp_details->company_phone?>"class="form-control" id="comp_phone" name="comp_phone">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Company Alt phone
                                    </label>
 <input type="text" value="<?php echo $comp_details->alt_phone?>" class="form-control" id="comp_phone_alt" name="comp_phone_alt">
                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                    <label class="control-label">
                                    Email Address <span class="symbol required"></span>
                                    </label>
              <input type="email" value="<?php echo $comp_details->email?>" class="form-control" id="email" name="email">
                                    </div>
                                            <div class="form-group">
                                    <label class="control-label">
                                    Website
                                    </label>
              <input type="text" class="form-control" id="website" name="website" value="<?php echo $comp_details->website?>">
                                    </div>
                                            <div class="form-group">
                                    <label class="control-label">
                                    Area Of Service
                                    </label>
              <input type="text" value="<?php echo $comp_details->area_of_service?>" class="form-control" id="service_area" name="service_area">
                                    </div>
                 <div class="form-group">
                                    <label class="control-label">
                                    Association 1
                                    </label>
             <input type="text" value="<?php echo $comp_details->association?>" class="form-control" id="associat_1" name="associat_1">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Association 2
                                    </label>
            <input type="text" value="<?php echo $comp_details->association2;?>" class="form-control" id="associat_2" name="associat_2">
                                <input type="hidden" value="<?php echo $comp_details->id;?>" name="comp_id">
                                 <input type="hidden" value="<?php echo $comp_details->logo;?>" name="old_logo">

                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">
                                    Association 3
                                    </label>
           <input type="text" value="<?php echo $comp_details->association1?>"class="form-control" id="associat_3" name="associat_3">
                                    </div>   
                    <p>
                    Payment Methods
                    </p>
        <label class="checkbox-inline">
        <input type="checkbox" class="square-black" value="Y" name="visa" <?php if($comp_details->visa=="Y"){?>checked<?php }?>>
            Visa
        </label>
        <label class="checkbox-inline">
   <input type="checkbox" class="square-grey" value="Y" name="master_card" <?php if($comp_details->master_card=="Y"){?>checked<?php }?>>
        Master Card
        </label>
        <label class="checkbox-inline">
        <input type="checkbox" class="square-red" value="Y"  name="american_express" <?php if($comp_details->american_express=="Y"){?>checked<?php }?>>
        American Express 	
        </label>
        <label class="checkbox-inline">
<input type="checkbox" class="square-green" value="Y" name="discover" <?php if($comp_details->discover=="Y"){?>checked<?php }?>>
        Discover
        </label>
        <label class="checkbox-inline">
  <input type="checkbox" class="square-teal" value="Y" name="paypal"  <?php if($comp_details->paypal=="Y"){?>checked<?php }?> >
        Paypal
        </label>    
                                            <div class="form-group">
                                                <label>
                                                 Logo
                                                </label>
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
     <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
     <img src="<?php echo site_url()."images/logos/".$comp_details->logo; ?>" alt="">
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                                    <div class="user-edit-image-buttons">
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Change Logo</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                      <input type="file" name="logo_img">
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
                                                Required Fields
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p>
                                                By clicking UPDATE, you are agreeing to the Policy and Terms &amp; Conditions.
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-teal btn-block" type="submit">
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
                                    <div id="panel_fleets" class="tab-pane">
										<div class="row">
                                            <?php
										    foreach($company_buses as $bus)
											{
											
											?>
											<div class="col-md-4">
											<div class="thumbnail">
											<div class="row">
											<div class="col-md-12">
											<div class="search-result-item-image">
											<?php
							if($bus->bus_type=="Charter bus")
											{
											if($bus->photo=="")
											   {
											?>
					<img class="img-responsive" src="<?php echo base_url();?>images/buses/charter_bus.jpg" alt="" />
											<?php
											   }
											 else
											   {
											?>
					<img class="img-responsive" src="<?php echo base_url();?>images/buses/<?php echo $bus->photo;  ?>" alt="" />
                                            <?php
											   }
											}
											elseif($bus->bus_type=="Mini bus")
											{
											 if($bus->photo=="")
											   {
											?>
					<img class="img-responsive" src="<?php echo base_url();?>images/buses/mini_bus.jpg" alt="" />
											<?php
											   }
											 else
											   {
											  ?>
					<img class="img-responsive" src="<?php echo base_url();?>images/buses/<?php echo $bus->photo;?>" alt="" />
                                              <?php 
											   }
										      
											}
											elseif($bus->bus_type=="Executive bus")
											{
											 if($bus->photo=="")
											   {
											?>
					<img class="img-responsive" src="<?php echo base_url();?>images/buses/executive_bus.jpg" alt="" />
											<?php
											   }
											 else
											   {
											?>
					 <img class="img-responsive" src="<?php echo base_url();?>images/buses/<?php echo $bus->photo;?>" alt="" />
                                            <?php
											   }
											}
									  elseif($bus->bus_type=="School bus")
											{
											?>
						   <img class="img-responsive" src="<?php echo base_url();?>images/buses/school_bus.jpg" alt="" />
											<?php
											}
									  elseif($bus->bus_type=="Party bus")
											{
											 if($bus->photo=="")
											   {
											?>
						   <img class="img-responsive" src="<?php echo base_url();?>images/buses/party_bus.jpg" alt="" />
											<?php
											   }
											 else
											   {
											?>
					<img class="img-responsive" src="<?php echo base_url();?>images/buses/<?php echo $bus->photo;?>" alt="" />
                                            <?php
											   }
											}
											else
											{
											 if($bus->photo=="")
											   {
											?>
				   <img class="img-responsive" src="<?php echo base_url();?>images/buses/10.jpg" alt="" />
											<?php
											   }
											  else
											   {
											?>
					<img class="img-responsive" src="<?php echo base_url();?>images/buses/<?php echo $bus->photo;?>" alt="" />
                                            <?php
											   }
											}
											?>
											</div>
											</div>
											<div class="col-md-12">
											<div class="search-result-item-content">
											<table class="table table-responsive">
											<tbody>
                                            <tr>
				<th><i class="glyphicon glyphicon-th"></i>Quantity:</th><td><?php echo $bus->quantity;?></td>
											</tr>
											<tr>
											<th><i class="glyphicon glyphicon glyphicon-calendar"></i> Model:</th>
											<td><i class="label label-default"><?php echo $bus->manufacture_date;?></i></td>
											</tr>
											<tr>
				<th><i class="glyphicon glyphicon-th"></i> No of Seats:</th><td><?php echo $bus->no_of_seat;?></td>
											</tr>
											<tr>
				<th><i class="glyphicon glyphicon-bed"></i> Bus Type:</th><td><?php echo $bus->bus_type;?></td>
											</tr>
											<tr>
			    <table class="table table-responsive table-bordered less_th_padding_tbl">
											<thead>
											  <tr>
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
											<tbody>
											  <tr>
                                              <td>
                                                 <?php 
                                                 if($bus->rstm)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($bus->cd)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($bus->dvd)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($bus->stv)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($bus->wifi)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($bus->pa)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($bus->ada)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($bus->alch)
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-ok glyphicon_yes"></i>';
                                                 }
                                                 else
                                                 {
                                                     echo'<i class="glyphicon glyphicon glyphicon-remove glyphicon_no"></i>';
                                                 }
                                                 ?>
                                              </td>
											  </tr>
											</tbody>
											</table>
											</tr>
											</tbody>
											</table>
                                            <table class="table table-hover table-striped table-bordered">
										<tbody>
											<tr>
                                            <td>
                        <a id="<?php echo $bus->id;  ?>" href="#panel-config" data-toggle="modal" class="demo btn btn-blue">
                                            EDIT
                                            </a>
                                            </td>
											</tr>
										</tbody>
									</table>
                                            
											</div>
											</div>
											</div>
											</div>
											</div>
											<?php
											
											}
                                            ?>
					                    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
<?php 
 include('includes/footer1.php');
?>    
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url('design/admin')?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url('design/admin')?>/plugins/jquery.pulsate/jquery.pulsate.min.js"></script>
		<script src="<?php echo base_url('design/admin')?>/js/pages-user-profile.js"></script>
        <script src="<?php echo base_url('design/admin') ?>/js/form-validation.js"></script>
        <script src="<?php echo base_url('design/admin/plugins/bootstrap-datepicker') ?>/js/bootstrap-datepicker.js"></script>

               

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