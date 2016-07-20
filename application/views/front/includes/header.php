<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <?php

	if(isset($title))

	{

	?>

        <title><?php echo $title;?></title>

    <?php

	}

	else

	{

	?>

        <title>Welcome to Go Bus Rentals</title>

    <?php

	}

	?>



    <!-- Bootstrap -->
    <link href="<?php echo base_url('design/front'); ?>/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url('design/front'); ?>/css/custom.css" rel="stylesheet">

    <link href="<?php echo base_url('design/front'); ?>/css/chosen.css" rel="stylesheet">

    <link href="<?php echo base_url('design/front'); ?>/css/tstr.css" rel="stylesheet">
    
    <link href="<?php echo base_url('design/front'); ?>/css/wickedpicker.css" rel="stylesheet">

    <link href="<?php echo base_url('design/admin/plugins/datepicker'); ?>/css/datepicker.css" rel="stylesheet">
    
    <link href="<?php echo base_url('design/admin/plugins/bootstrap-timepicker'); ?>/css/bootstrap-timepicker.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body>



<!--Start of Navbar-->

<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" href="#">Brand</a>

        </div>



        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php $currentPage =  $this->uri->segment(2); ?>
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav ">

                <li <?php if($currentPage==""||$currentPage=="index"){?> class="active"<?php }?>><a href="<?php echo base_url(); ?>">Home</a></li>

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clients <b class="caret"></b></a>

                    <ul class="dropdown-menu multi-column columns-4">

                        <div class="row">

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Toup Operators</a></li>

                                    <li><a href="#">Meeting Planners</a></li>

                                    <li><a href="#">Trade Shows Organisers </a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Associations</a></li>

                                    <li><a href="#">Corporations</a></li>

                                    <li><a href="#">Clubs</a></li>

                                    <li><a href="#">Government</a></li>

                                    <li><a href="#">Military </a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Event Planners</a></li>

                                    <li><a href="#">Schools</a></li>

                                    <li><a href="#">Universities</a></li>

                                    <li><a href="#">Show / Concert Organisers</a></li>

                                    <li><a href="#">Political Parties</a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Hotels</a></li>

                                    <li><a href="#">Resorts</a></li>

                                    <li><a href="#">Theme / Ammusment Parks</a></li>

                                </ul>

                            </div>                            

                        </div>

                    </ul>

                </li>

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>

                    <ul class="dropdown-menu multi-column columns-4">

                        <div class="row">

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Transfers</a></li>

                                    <li><a href="#">Daily</a></li>

                                    <li><a href="#">Hourly </a></li>

                                    <li><a href="#">Short Haul </a></li>

                                    <li><a href="#">Long Haul</a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Shuttle</a></li>

                                    <li><a href="#">Meetings & Conventions</a></li>

                                    <li><a href="#">Signseeing</a></li>

                                    <li><a href="#">Private Events</a></li>

                                    <li><a href="#">Designation Weddings </a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Family Reunion</a></li>

                                    <li><a href="#">Field Trip</a></li>

                                    <li><a href="#">Sports</a></li>

                                    <li><a href="#">Political Events</a></li>

                                    <li><a href="#">Festivals</a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li><a href="#">Public Events</a></li>

                                    <li><a href="#">Team Building Events</a></li>

                                    <li><a href="#">Logistics</a></li>

                                    <li><a href="#">Marching Brands</a></li>

                                </ul>

                            </div>                            

                        </div>

                    </ul>

                </li>

                <li <?php if($currentPage=="cost_calculator"){?> class="active"<?php }?>><a href="<?php echo $this->config->base_url();?>Home/cost_calculator">Cost Calculator</a></li>

                <li <?php if($currentPage=="distance_calculator"){?> class="active"<?php }?>><a href="<?php echo $this->config->base_url();?>Home/distance_calculator">Distance Calculator</a></li>

                <li><a href="#">FAQ</a></li>

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources <span class="caret"></span></a>

                    <ul class="dropdown-menu dropdown-menu-right multi-column columns-4">

                        <div class="row">

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li class="dropdown-header">Useful Links</li>

                                    <li role="separator" class="divider"></li>

                                    <li><a href="#">Transfers</a></li>

                                    <li><a href="#">Daily</a></li>

                                    <li><a href="#">Hourly </a></li>

                                    <li><a href="#">Short Haul </a></li>

                                    <li><a href="#">Long Haul</a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li class="dropdown-header">Useful Links</li>

                                    <li role="separator" class="divider"></li>                                

                                    <li><a href="#">Shuttle</a></li>

                                    <li><a href="#">Meetings & Conventions</a></li>

                                    <li><a href="#">Signseeing</a></li>

                                    <li><a href="#">Private Events</a></li>

                                    <li><a href="#">Designation Weddings </a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li class="dropdown-header">Bus Manufacturers</li>

                                    <li role="separator" class="divider"></li>                               

                                    <li><a href="#">Family Reunion</a></li>

                                    <li><a href="#">Field Trip</a></li>

                                    <li><a href="#">Sports</a></li>

                                    <li><a href="#">Political Events</a></li>

                                    <li><a href="#">Festivals</a></li>

                                </ul>

                            </div>

                            <div class="col-sm-3">

                                <ul class="multi-column-dropdown">

                                    <li class="dropdown-header">Bus Associations</li>

                                    <li role="separator" class="divider"></li>                                

                                    <li><a href="#">Public Events</a></li>

                                    <li><a href="#">Team Building Events</a></li>

                                    <li><a href="#">Logistics</a></li>

                                    <li><a href="#">Marching Brands</a></li>

                                </ul>

                            </div>                            

                        </div>

                    </ul>

                </li>

                <li><a href="<?php echo $this->config->base_url();?>Admin/login">Login</a></li>

                <li><a class="highlight" href="#">Quick Quote</a></li>

            </ul>

        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->

</nav>

<!--/End of Navbar-->



