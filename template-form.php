<?php get_header(); the_post(); ?>

<div class="page-banner">
  <h1><?php the_title(); ?></h1>
</div>
<div id="page-content">
  <section class="page-section">
    <div class="section-container">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="contact-form">
              <div class="row">
                <div class="col-md-6 form-wrapper">
<!--                   <form>
                    <input type="text" class="form-control" name="name" placeholder="Name..."/>
                    <input type="email" class="form-control" name="email" placeholder="Email..."/>
                    <textarea class="form-control" name="message" placeholder="Message..."></textarea>
                    <div class="text-center">
                      <input type="submit" class="btn btn-cta btn-sm" value="Submit"/>
                    </div>
                  </form> -->
                  <?php the_content(); ?>
                </div>
                <div class="col-md-4">
                  <?php if(isset($weddingWire) && $weddingWire) echo do_shortcode('[wedding-wire-link][/wedding-wire-link]'); ?>
                  <?php if(isset($contactInfo) && $contactInfo) echo do_shortcode('[contact-info][/contact-info]'); ?>                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <?php if(isset($map) && $map): ?>
  <?php echo do_shortcode('[section-breaker][/section-breaker]'); ?> 
  <section style="clear:both;padding:0px;overflow:auto;">
  <?php echo do_shortcode('[google-map 
    longitude="'.get_option('aposh_coordinates_long').'" 
    latitude="'.get_option('aposh_coordinates_lat').'"
    location="'.get_option('aposh_location_name').'"
    address="'.get_option('aposh_address_0').'<br/>'.get_option('aposh_address_1').'"
    cta_link="'.get_option('aposh_directions').'"]
    [/google-map]')
  ;?> 
  <?php echo do_shortcode('[google-map 
    longitude="'.get_option('aposh_coordinates_long_2').'" 
    latitude="'.get_option('aposh_coordinates_lat_2').'"
    location="'.get_option('aposh_location_name_2').'"
    address="'.get_option('aposh_address_0_2').'<br/>'.get_option('aposh_address_1_2').'"
    cta_link="'.get_option('aposh_directions_2').'"]
    [/google-map]')
  ;?>  
  </section>
  
 <!--  <div id="map" 
    data-long="<?php echo get_option('aposh_coordinates_long'); ?>" 
    data-lat="<?php echo get_option('aposh_coordinates_lat'); ?>" 
    data-marker="<?php themeImage('map_marker.png'); ?>">
  </div>  -->
  <?php echo do_shortcode('[section-breaker][/section-breaker]'); ?> 
  <?php endif; ?>
</div>
<?php $class = (isset($availabilityClass) && $availabilityClass!="") ? $availabilityClass : "white"; ?>
<?php if(isset($availability) && $availability) echo do_shortcode('[availability-section class="'.$class.'" line="false"]'); ?> 
<?php get_footer() ?>