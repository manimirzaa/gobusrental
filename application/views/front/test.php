<?php include(APPPATH.'/views/front/includes/header.php'); ?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBI-2jfmKoU4QzkNpTePhnY_9OmgpJ4Tg4&libraries=places"></script>
<script src="<?php echo base_url('design/front') ?>/js/main.js"></script>
<script src="<?php echo base_url('design/front') ?>/js/script.min.js"></script>
<section class="section section-dark">
    <div class="container">
        <div class="row">
                 <div class="col-md-12">
	                  <div id="content" class="article form padding">
        <div id="map_area" style="height:400px;">
            <div id="map_canvas" style="height:400px;"></div>
        </div>
        <div id="summary" class="margin-top"></div>
        <div id="p1" class="row guttered-s margin-top">
            <div class="col-2 align-right padding-top-s"><label for="fromAddress">From</label></div>
            <div class="col-5"><input type="text" id="fromAddress" name="from" /></div>
            <div class="col-5">
                <a href="#" onclick="return getLocation();" class="button blue fixed">GPS</a>
                <a href="#" onclick="return add_waypoint();" class="button link">Add Waypoints</a>
            </div>
        </div>

        <div id="p2" class="row guttered-s source-container margin-top-s">
            <div class="col-2 align-right padding-top-s"><label>To</label></div>
            <div class="col-5"><input type="text" id="toAddress" name="to" /></div>
            <div class="col-5">
                <a href="#" class="button blue fixed" onclick="return calcRoute();">ROUTE</a>
                <span id="loader"></span>
            </div>
        </div>

        <div>
            <div id="locations" class="margin-top padding-top-s border-top"></div><!-- To Display list of locations entered -->

            <div id="directions" class="margin-top">
                <h4>Your Route :</h4>
            </div>
        </div>
	</div>
                 </div>
        </div>
    </div>
</section>
<?php include(APPPATH.'/views/front/includes/footer.php'); ?>