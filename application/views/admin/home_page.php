	<!-- start: PAGE -->
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
									<i class="clip-home-3"></i>
									<a href="#">
										Home
									</a>
								</li>
								<li class="active">
									Dashboard
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
							<div class="page-header">
								<h1>Dashboard <small>overview &amp; stats </small></h1>
							</div>
                            
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<i class="clip-user-4 circle-icon circle-green"></i>
									<h2>Manage Users</h2>
								</div>
								<div class="content">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
								</div>
								<a class="view-more" href="#">
									View More <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<i class="clip-clip circle-icon circle-teal"></i>
									<h2>Manage Orders</h2>
								</div>
								<div class="content">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
								</div>
								<a class="view-more" href="#">
									View More <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="core-box">
								<div class="heading">
									<i class="clip-database circle-icon circle-bricky"></i>
									<h2>Manage Data</h2>
								</div>
								<div class="content">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
								</div>
								<a class="view-more" href="#">
									View More <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-7">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="clip-stats"></i>
									Site Visits
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
								<div class="panel-body">
									<div class="flot-medium-container">
										<div id="placeholder-h1" class="flot-placeholder"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="row">
								<div class="col-sm-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<i class="clip-pie"></i>
											Acquisition
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
										<div class="panel-body">
											<div class="flot-mini-container">
												<div id="placeholder-h2" class="flot-placeholder"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<i class="clip-bars"></i>
											Pageviews real-time
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
										<div class="panel-body">
											<div class="flot-mini-container">
												<div id="placeholder-h3" class="flot-placeholder"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-7">
							<div class="row space12">
								<ul class="mini-stats col-sm-12">
									<li class="col-sm-4">
										<div class="sparkline_bar_good">
											<span>3,5,9,8,13,11,14</span>+10%
										</div>
										<div class="values">
											<strong>18304</strong>
											Visits
										</div>
									</li>
									<li class="col-sm-4">
										<div class="sparkline_bar_neutral">
											<span>20,15,18,14,10,12,15,20</span>0%
										</div>
										<div class="values">
											<strong>3833</strong>
											Unique Visitors
										</div>
									</li>
									<li class="col-sm-4">
										<div class="sparkline_bar_bad">
											<span>4,6,10,8,12,21,11</span>+50%
										</div>
										<div class="values">
											<strong>18304</strong>
											Pageviews
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="row space12">
								<div class="col-sm-6">
									<div class="easy-pie-chart">
										<span class="bounce number" data-percent="44"> <span class="percent">44</span> </span>
										<div class="label-chart">
											Bounce Rate
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="easy-pie-chart">
										<span class="cpu number" data-percent="82"> <span class="percent">82</span> </span>
										<div class="label-chart">
											New Visits
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-7">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="clip-users-2"></i>
									Users
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
									<table class="table table-striped table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">Photo</th>
												<th>Full Name</th>
												<th class="hidden-xs">Email</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="center"><img src="<?php echo base_url('design/admin') ?>/images/avatar-1.jpg" alt="image"/></td>
												<td>Peter Clark</td>
												<td class="hidden-xs">
												<a href="#" rel="nofollow" target="_blank">
													peter@example.com
												</a></td>
												<td class="center">
												<div>
													<div class="btn-group">
														<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
															<i class="fa fa-cog"></i> <span class="caret"></span>
														</a>
														<ul role="menu" class="dropdown-menu pull-right">
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-edit"></i> Edit
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-share"></i> Share
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-times"></i> Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											<tr>
												<td class="center"><img src="<?php echo base_url('design/admin') ?>/images/avatar-2.jpg" alt="image"/></td>
												<td>Nicole Bell</td>
												<td class="hidden-xs">
												<a href="#" rel="nofollow" target="_blank">
													nicole@example.com
												</a></td>
												<td class="center">
												<div>
													<div class="btn-group">
														<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
															<i class="fa fa-cog"></i> <span class="caret"></span>
														</a>
														<ul role="menu" class="dropdown-menu pull-right">
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-edit"></i> Edit
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-share"></i> Share
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-times"></i> Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											<tr>
												<td class="center"><img src="<?php echo base_url('design/admin') ?>/images/avatar-3.jpg" alt="image"/></td>
												<td>Steven Thompson</td>
												<td class="hidden-xs">
												<a href="#" rel="nofollow" target="_blank">
													steven@example.com
												</a></td>
												<td class="center">
												<div>
													<div class="btn-group">
														<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
															<i class="fa fa-cog"></i> <span class="caret"></span>
														</a>
														<ul role="menu" class="dropdown-menu pull-right">
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-edit"></i> Edit
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-share"></i> Share
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-times"></i> Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											<tr>
												<td class="center"><img src="<?php echo base_url('design/admin') ?>/images/avatar-5.jpg" alt="image"/></td>
												<td>Kenneth Ross</td>
												<td class="hidden-xs">
												<a href="#" rel="nofollow" target="_blank">
													kenneth@example.com
												</a></td>
												<td class="center">
												<div>
													<div class="btn-group">
														<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
															<i class="fa fa-cog"></i> <span class="caret"></span>
														</a>
														<ul role="menu" class="dropdown-menu pull-right">
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-edit"></i> Edit
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-share"></i> Share
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-times"></i> Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											<tr>
												<td class="center"><img src="<?php echo base_url('design/admin') ?>/images/avatar-4.jpg" alt="image"/></td>
												<td>Ella Patterson</td>
												<td class="hidden-xs">
												<a href="#" rel="nofollow" target="_blank">
													ella@example.com
												</a></td>
												<td class="center">
												<div>
													<div class="btn-group">
														<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
															<i class="fa fa-cog"></i> <span class="caret"></span>
														</a>
														<ul role="menu" class="dropdown-menu pull-right">
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-edit"></i> Edit
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-share"></i> Share
																</a>
															</li>
															<li role="presentation">
																<a role="menuitem" tabindex="-1" href="#">
																	<i class="fa fa-times"></i> Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="clip-checkbox"></i>
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
					<div class="row">
						<div class="col-sm-7">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="clip-calendar"></i>
									Calendar
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
									<div id='calendar'></div>
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="row">
								<div class="col-sm-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<i class="clip-bubble-4"></i>
											Chats
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
										<div class="panel-body panel-scroll" style="height:460px">
											<ol class="discussion">
												<li class="other">
													<div class="avatar">
														<img alt="" src="assets/images/avatar-4.jpg">
													</div>
													<div class="messages">
														<p>
															Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
														</p>
														<span class="time"> 51 min </span>
													</div>
												</li>
												<li class="self">
													<div class="avatar">
														<img alt="" src="assets/images/avatar-1.jpg">
													</div>
													<div class="messages">
														<p>
															Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
														</p>
														<span class="time"> 37 mins </span>
													</div>
												</li>
												<li class="other">
													<div class="avatar">
														<img alt="" src="assets/images/avatar-3.jpg">
													</div>
													<div class="messages">
														<p>
															Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
														</p>
													</div>
												</li>
												<li class="self">
													<div class="avatar">
														<img alt="" src="assets/images/avatar-1.jpg">
													</div>
													<div class="messages">
														<p>
															Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
														</p>
													</div>
												</li>
												<li class="other">
													<div class="avatar">
														<img alt="" src="assets/images/avatar-4.jpg">
													</div>
													<div class="messages">
														<p>
															Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
														</p>
													</div>
												</li>
											</ol>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="chat-form">
										<div class="input-group">
											<input type="text" class="form-control input-mask-date" placeholder="Type a message here...">
											<span class="input-group-btn">
												<button class="btn btn-teal" type="button">
													<i class="fa fa-check"></i>
												</button> </span>
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
 include('includes/footer.php');
?> 
<!-- end: PAGE -->
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
		<script src="<?php echo base_url('design/admin') ?>/plugins/flot/jquery.flot.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/flot/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/jquery.sparkline/jquery.sparkline.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/plugins/fullcalendar/fullcalendar/fullcalendar.js"></script>
		<script src="<?php echo base_url('design/admin') ?>/js/index.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Index.init();
			});
		</script>
    </body>
	<!-- end: BODY -->
</html>