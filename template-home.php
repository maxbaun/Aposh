<?php
/* Template Name: Home Template */
?>
<?php get_header() ?>

<div id="home-slider" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#home-slider" data-slide-to="0" class="active"></li>
        <li data-target="#home-slider" data-slide-to="1" class=""></li>
        <li data-target="#home-slider" data-slide-to="2" class=""></li>
      </ol>

      <div class="carousel-inner" role="listbox">
        <?php dynamic_sidebar( 'home_slider' ); ?>
      </div> 
      <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
        <div></div>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
        <div></div>
        <span class="sr-only">Next</span>
      </a>
</div>
<div id="page-content">  
  <section class="white">
    <div class="container">
      <div class="section-content">
        <div class="title-lines">
          <hr>
          <div class="title-text text-center lines">
            <span>What Posh Has To Offer</span>
          </div>
        </div>
        <div class="featured-content row">
          <?php dynamic_sidebar( 'home_featured' ); ?>
<!--           <div class="col-md-4 item">
            <p class="title">award winning entertainment</p>
            <div class="thumb" style="background-image: url(<?php themeImage('home_featured_1.jpg'); ?>);">
              <div class="overlay">
                <div class="vertical-center-wrapper text-center">
                  <div class="vertical-center">
                    <a class="btn btn-learn">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <p class="text">Have a memorable event with help from our experienced DJ’s! A Posh Production Masters of Ceremony and DJ’s work closely with all their clients. Choose a professional, entertaining DJ from A Posh Production for your special event! </p>
            <hr/>
            <a href="#" class="cta">Learn More <span class="glyphicon glyphicon-arrow-right"></span></a>
          </div>
          <div class="item col-md-4">
            <p class="title">Event Lighting & Decor</p>
            <div class="thumb" style="background-image: url(<?php themeImage('home_featured_2.jpg'); ?>);">
              <div class="overlay">
                <div class="vertical-center-wrapper text-center">
                  <div class="vertical-center">
                    <a class="btn btn-learn">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <p class="text">Select A Posh Production for your Chicago event lighting rental needs! We are Chicago’s event lighting experts! We create the best event staging with elegant decorations, uplighting and dance lighting packages.</p>
            <hr/>
            <a href="#" class="cta">Learn More <span class="glyphicon glyphicon-arrow-right"></span></a>
          </div>
          <div class="item col-md-4">
            <p class="title">Photo Booths</p>
            <div class="thumb" style="background-image: url(<?php themeImage('home_featured_3.jpg'); ?>);">
              <div class="overlay">
                <div class="vertical-center-wrapper text-center">
                  <div class="vertical-center">
                    <a class="btn btn-learn">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <p class="text">Our Photo Booths, Green Screens, Hashtag Printing, and Video Booths are guaranteed to be a hit at every party! </p>
            <hr/>
            <a href="#" class="cta">Learn More <span class="glyphicon glyphicon-arrow-right"></span></a>
          </div>   -->            
        </div>
      </div>
    </div>
  </section>
  <section class="bg-image" style="background-image: url(<?php themeImage('bg_availability.jpg'); ?> )">
    <div class="container">
      <div class="section-content">
        <div class="row">
          <div class="col-md-3 review-widget">
<script type="text/javascript" src="//wwcdn.weddingwire.com/static/js/widgets/myReviews.js"></script><div id="ww-widget-reviews" class="ww-reset ww-reviews-widget"><div class="ww-reviews-placeholder">Read all of our <a target="_new" href="http://www.weddingwire.com/biz/posh-production-lighting-decor-dj-and-photo-booth-elmhurst/bbf392ccded13860.html">Wedding Disc Jockey, Wedding Rentals, Wedding Flowers, Wedding Lighting & Decor Reviews</a> at <a target="_new" href="http://www.weddingwire.com"><img src="//wwcdn.weddingwire.com/static/images/logo/WWlogo-83x19.gif" alt="Weddings, Wedding Cakes,  Wedding Planning, Wedding Checklists, Free Wedding Websites, Wedding Dresses, Wedding Ideas & more"/></a></div></div><script type="text/javascript"><!--

WeddingWire.createReview({"vendorId":"bbf392ccded13860", "id":"ww-widget-reviews"});

--></script>          
          </div>
          <div class="col-md-8 col-md-offset-1 availability-widget-wrapper">
          <div class="vertical-center-wrapper">
            <div class="vertical-center">
          <?php echo do_shortcode('[availability-widget lines=false caption="Choose the date of your event below to immediately find out if your date is available." classes=""]'); ?>
            </div>
          </div>
          </div>
<!--           <div class="col-md-8 availability-widget">
            <h1 class="title">Are we available?</h1>
            <h3 class="text">Choose the date of your event below to immediately find out if your date is available.</h3>
            <div style="">
              <div class="availability-checker">
                <div class="dropdowns">
                  <div class="btn-group dropdown">
                    <button class="btn btn-availability dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </button>
                    <button class="btn btn-availability dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret caret-reversed"></span>
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">January</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">February</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">March</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">April</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">May</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">June</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">July</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">August</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">September</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">October</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">November</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">December</a></li>
                    </ul>
                  </div>
                  <div class="btn-group dropdown">
                    <button class="btn btn-availability dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </button>
                    <button class="btn btn-availability dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret caret-reversed"></span>
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu dates" role="menu" aria-labelledby="dropdownMenu1">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">1</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">2</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">3</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">4</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">5</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">6</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">7</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">8</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">9</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">10</a></li>

                    </ul>
                  </div>
                  <div class="btn-group dropdown">
                    <button class="btn btn-availability dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </button>
                    <button class="btn btn-availability dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret caret-reversed"></span>
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2015</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2016</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2017</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2018</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2019</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2020</a></li>
                    </ul>
                  </div>
                </div>          
                <div class="btn-wrapper">
                  <a class="btn btn-cta">Check Now</a>  
                </div>          
              </div>
            </div>
          </div> -->
        </div>
      </div>  
    </div>

  </section>
  <section class="white">
    <div class="container">
      <div class="section-content">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="<?php themeImage('reviews_weddingwire.jpg'); ?>"/>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php themeImage('rewards_weddingful.jpg'); ?>"/>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php themeImage('rewards_knot.jpg'); ?>"/>
          </div>                
        </div>
      </div>
    </div>
  </section>
  <span class="section-breaker"></span>
  <section class="white">
    <div class="container">
      <div class="section-content">
        <h1 class="text-center">Chicago wedding lighting <br/>& dj by posh production</h1>
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <?php dynamic_sidebar( 'home_video' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer() ?>