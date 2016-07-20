<?php include(APPPATH.'/views/front/includes/header.php'); ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBI-2jfmKoU4QzkNpTePhnY_9OmgpJ4Tg4&libraries=places"></script>
<script src="<?php echo base_url('design/front');?>/js/main.js"></script>
<script src="<?php echo base_url('design/front');?>/js/script.min.js"></script>
<style>
.adp-directions{
	display:none;
}
</style>
<img src="<?php echo $this->config->base_url();?>images/general/distance_calculator_banner.jpg" alt="Distance calculator" height="250" width="100%">
<section class="section section-dark">
    <div class="container">
        <div class="row">
             <div class="col-md-12">  
                <div class="col-md-5">
                    <div class="thumbnail">
                          <div id="p1" class="guttered-s margin-top" style="width:100%; display:inline-block;">
                               <div class="col-md-6">
                                   <label for="From" class="control-label">From<span class="required">*</span></label>
                                   <div class="inner-addon left-addon">
                                       <i class="glyphicon glyphicon-map-marker"></i>
                                       <input type="text" name="from" id="fromAddress" class="form-control" placeholder="From" />
                                   </div>
                               </div>
                               <div class="col-6">
                                    <a href="javascript:void(0)" onclick="return add_waypoint();" class="btn btn-success" style="margin-top:24px;">Add Waypoints</a>
                               </div>
                          </div>
                          <div id="p2" class="guttered-s source-container margin-top-s" style="width:100%; display:inline-block;">
                               <div class="col-md-6">
                                   <label for="To" class="control-label">To<span class="required">*</span></label>
                                   <div class="inner-addon left-addon">
                                       <i class="glyphicon glyphicon-map-marker"></i>
                                       <input type="text" name="to" id="toAddress" class="form-control" placeholder="To"/>
                                   </div>
                               </div>
                          </div>
                          <div class="col-md-12">
                               <div class="form-group">
                                  <input type="button" value="Calculate" class="btn btn-primary" onclick="return calcRoute();" />  
                               </div>
                          </div>
                    </div>
                </div>
                
                <div class="col-md-7" >
                    <div class="thumbnail" id="multi_cities_map_div" style="height:100%; width:100%;">
                        <div id="summary" class="margin-top" style="height:100%; width:100%;"></div>
                        <div id="map_area" style="height:100%; width:100%;">
                            <div id="map_canvas" style="height:300px;"></div>
                        </div>
                        <div id="locations" class="margin-top padding-top-s border-top"></div>
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
<script type="text/javascript">	
	
	$(document).ready(function () 
	{

		/*$('#resize').on('click', function () { 
			  $('#multi_cities').show(); 
			  $('#multi_cities').css('display','inline-block');
			  map_center = map.getCenter();
			  google.maps.event.trigger(map, "resize");
	  
			  map.setCenter(map_center);
			  map.setZoom(map_zoom); 
        });*/
		$(document).on("click", ".to_waypoints_remove", function()
		{
			calcRoute();
		});
    });
</script>