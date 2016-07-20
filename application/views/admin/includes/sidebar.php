<?php
$user_type=$this->session->userdata('user_type');
?>
<div class="navbar-content">
				<!-- start: SIDEBAR -->
				<div class="main-navigation navbar-collapse collapse">
					<!-- start: MAIN MENU TOGGLER BUTTON -->
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
					</div>
					<!-- end: MAIN MENU TOGGLER BUTTON -->
					<!-- start: MAIN NAVIGATION MENU -->
					<ul class="main-navigation-menu">
						<li class="active open">
							<a href="<?php echo base_url('Admin');?>"><i class="clip-home-3"></i>
								<span class="title"> Dashboard </span><span class="selected"></span>
							</a>
						</li>
                        <?php
						if($user_type==1)
						{
						?>
                            <li>
                                <a href="javascript:void(0)"><i class="clip-screen"></i>
                                    <span class="title">Companies</span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#">
                                            <span class="title">Approve Companies</span>
                                            <span class="badge badge-new">new</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="title">Add Company</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="title">Manage Companies</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
						}
						?>
						<li>
							<a href="javascript:void(0)"><i class="clip-cog-2"></i>
								<span class="title">Fleets</span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
										<span class="title">Add Fleet</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Add Fleets in Batch</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Manage Fleets</span>
									</a>
								</li>
                                <li>
									<a href="#">
										<span class="title">Upload Fleet Photos</span>
									</a>
								</li>
							</ul>
						</li>
                        <?php
						if($user_type==1)
						{
						?>
                            <li>
                                <a href="javascript:void(0)"><i class="clip-user-2"></i>
                                    <span class="title">Users</span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#">
                                            <span class="title">Approve Users</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="title">Add User</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="title">Manage Users</span>
                                        </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                            <span class="title">Add Company Admin</span>
                                    </a>
                                    </li>
    
                                </ul>
                            </li>
                        
                            <li>
                                <a href="javascript:void(0)"><i class="clip-file"></i>
                                    <span class="title">Mail Box</span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#">
                                            <span class="title">Inobx</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="title">Inbound Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="clip-grid-6"></i>
                                    <span class="title"> Gallery </span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="table_static.html">
                                            <span class="title">Add Gallery</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
						}
						?>
                        <li>
							<a href="javascript:void(0)"><i class="clip-attachment-2"></i>
								<span class="title">Accounting</span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
										<span class="title">Accounts Receiveable Report</span>
									</a>
								</li>
								
								<li>
									<a href="#">
										<span class="title">Accounts Payable Report</span>
									</a>
								</li>
                                <?php
								if($user_type==1)
								{
								?>
                                    <li>
                                        <a href="#">
                                            <span class="title">Manage Commision</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->config->base_url('Admin/per_mile_costing');?>">
                                            <span class="title">Manage Per Mile Cost</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->config->base_url('Admin/per_day_costing');?>">
                                            <span class="title">Manage Per Day Cost</span>
                                        </a>
                                    </li>
                                <?php
								}
								?>
							</ul>
						</li>
                        <li>
							<a href="javascript:;">
								<i class="clip-folder-open"></i>
								<span class="title">RFP</span><i class="icon-arrow"></i>
								<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="<?php echo $this->config->base_url('Quotes/all_quotes');?>">
										<span class="title">View Quotes</span>
									</a>
								</li>
								<?php
								if($user_type==1)
								{
								?>
                                    <li>
                                        <a href="#">
                                            <span class="title">Quick Quotes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="title">View Payments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="title">View Proposals</span>
                                        </a>
                                    </li>
                                <?php
								}
								?>
							</ul>
						</li>
                        <?php
						if($user_type==1)
						{
						?>
                            <li>
                                <a href="javascript:;">
                                    <i class="clip-folder-open"></i>
                                    <span class="title">Logo</span><i class="icon-arrow"></i>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#">
                                            <span class="title">Update Logo</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
						}
						?>
                       </ul>
					<!-- end: MAIN NAVIGATION MENU -->
				</div>
				<!-- end: SIDEBAR -->
			</div>
