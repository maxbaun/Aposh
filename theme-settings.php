<?php

function setup_theme_admin_menus() {  
    add_menu_page('Theme settings', 'A Posh Settings', 'manage_options',   
        'theme_settings', 'theme_settings_page');    
    
//     add_submenu_page('themes.php',   
//         'Social Media Settings', 'Social Media', 'manage_options',   
//         'social-media-settings', 'theme_social_media_settings');   
}   

function theme_settings_page(){
  if (isset($_POST["update_settings"])) {  
    $facebook_url = esc_attr($_POST["facebook_url"]);     
    update_option("aposh_facebook_url", $facebook_url);
    
    $twitter_url = esc_attr($_POST["twitter_url"]);     
    update_option("aposh_twitter_url", $twitter_url); 
    
    $pinterest_url = esc_attr($_POST["pinterest_url"]);     
    update_option("aposh_pinterest_url", $pinterest_url); 
    
    $instagram_url = esc_attr($_POST["instagram_url"]);     
    update_option("aposh_instagram_url", $instagram_url);
    
    $youtube_url = esc_attr($_POST["youtube_url"]);     
    update_option("aposh_youtube_url", $youtube_url); 
    
    $ww_url = esc_attr($_POST["ww_url"]);     
    update_option("aposh_ww_url", $ww_url);   
  
    
    $aposh_posts_per_page = esc_attr($_POST["aposh_posts_per_page"]);     
    update_option("aposh_posts_per_page", $aposh_posts_per_page); 
    
    $aposh_coordinates_long = esc_attr($_POST["aposh_coordinates_long"]);     
    update_option("aposh_coordinates_long", $aposh_coordinates_long); 
    
    $aposh_coordinates_lat = esc_attr($_POST["aposh_coordinates_lat"]);     
    update_option("aposh_coordinates_lat", $aposh_coordinates_lat);  
       
    $aposh_phone = esc_attr($_POST["aposh_phone"]);     
    update_option("aposh_phone", $aposh_phone); 
    
    $aposh_website = esc_attr($_POST["aposh_website"]);     
    update_option("aposh_website", $aposh_website); 
    
    $aposh_email = esc_attr($_POST["aposh_email"]);     
    update_option("aposh_email", $aposh_email);
    
    $aposh_address_0 = esc_attr($_POST["aposh_address_0"]);     
    update_option("aposh_address_0", $aposh_address_0);     
    
    $aposh_address_1 = esc_attr($_POST["aposh_address_1"]);     
    update_option("aposh_address_1", $aposh_address_1); 
    
    $aposh_address_2 = esc_attr($_POST["aposh_address_2"]);     
    update_option("aposh_address_2", $aposh_address_2);
    
    $aposh_address_3 = esc_attr($_POST["aposh_address_3"]);     
    update_option("aposh_address_3", $aposh_address_3);           

    $aposh_review_count = esc_attr($_POST["aposh_review_count"]);     
    update_option("aposh_review_count", $aposh_review_count);  

    $aposh_availability_page = esc_attr($_POST["aposh_availability_page"]);
    update_option("aposh_availability_page",$aposh_availability_page);  

    $aposh_client_login_page = esc_attr($_POST["aposh_client_login_page"]);
    update_option("aposh_client_login_page",$aposh_client_login_page); 

    $aposh_tagline = esc_attr($_POST["aposh_tagline"]);
    update_option("aposh_tagline",$aposh_tagline);  

    $aposh_carousel_interval = esc_attr($_POST["aposh_carousel_interval"]);
    update_option("aposh_carousel_interval",$aposh_carousel_interval);           
    ?>  
      <div id="message" class="updated">Settings saved</div>  
    <?php     
  }
  else{
    $facebook_url = get_option("aposh_facebook_url");
    $twitter_url = get_option("aposh_twitter_url");
    $pinterest_url = get_option("aposh_pinterest_url");
    $instagram_url = get_option("aposh_instagram_url");
    $youtube_url = get_option("aposh_youtube_url");
    $ww_url = get_option("aposh_ww_url");
    
    $aposh_posts_per_page = get_option("aposh_posts_per_page");

    $aposh_coordinates_long = get_option("aposh_coordinates_long");
    $aposh_coordinates_lat = get_option("aposh_coordinates_lat");     
    $aposh_phone = get_option("aposh_phone");
    $aposh_website = get_option("aposh_website");
    $aposh_email = get_option("aposh_email");
    $aposh_address_0 = get_option("aposh_address_0");
    $aposh_address_1 = get_option("aposh_address_1");
    $aposh_address_2 = get_option("aposh_address_2");
    $aposh_address_3 = get_option("aposh_address_3");

    $aposh_review_count = get_option("aposh_review_count");
    $aposh_availability_page = get_option("aposh_availability_page");
    $aposh_client_login_page = get_option("aposh_client_login_page");
    $aposh_carousel_interval = get_option("aposh_carousel_interval");
    
    $aposh_tagline = get_option("aposh_tagline");
  }
?>
  
  <div class="wrap">
    <?php screen_icon('themes'); ?> <h2>Theme Settings</h2>  
  
    <form method="POST" action="">  
      <table class="form-table">
        <th><h3>Social Media Settings</h3></th>  
        <tr valign="top">  
          <th scope="row">  
            <label for="facebook_url">  
              Facebook URL:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="facebook_url" value="<?php echo $facebook_url;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="twitter_url">  
              Twitter URL:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="twitter_url" value="<?php echo $twitter_url;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="pinterest_url">  
              Pinterest URL:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="pinterest_url" value="<?php echo $pinterest_url;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="instagram_url">  
              instagram URL:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="instagram_url" value="<?php echo $instagram_url;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="youtube_url">  
              YouTube URL:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="youtube_url" value="<?php echo $youtube_url;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="ww_url">  
              Wedding Wire URL:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="ww_url" value="<?php echo $ww_url;?>"/>  
          </td>  
        </tr>                                                              
      </table>
      
      <table class="form-table">
        <th><h3>Blog Settings</h3></th>

        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_posts_per_page">  
              Posts Per Page:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_posts_per_page" id="aposh_posts_per_page" value="<?php echo $aposh_posts_per_page;?>"/>  
          </td>  
        </tr>             
      </table>

      <table class="form-table">
        <th><h3>Review Settings</h3></th>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_review_count">  
              Review Count:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_review_count" id="aposh_review_count" value="<?php echo $aposh_review_count;?>"/>  
          </td>  
        </tr>             
      </table> 

      <table class="form-table">
        <th><h3>Carousel Settings</h3></th>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_carousel_interval">  
              Carousel Interval (in milliseconds ex: 3000):  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_carousel_interval" id="aposh_carousel_interval" value="<?php echo $aposh_carousel_interval;?>"/>  
          </td>  
        </tr>             
      </table>      

      <table class="form-table">
        <th><h3>Pages</h3></th>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_availability_page">  
              Availability Page:  
            </label>  
          </th>  
          <td>
            <select name="aposh_availability_page">
          <?php
            $pages = get_pages(array(
              'post_type' => 'page',
              'post_status' => 'publish',
              'sort_column' => 'post_title'
            ));
            foreach ($pages as $page):
          ?>
            <?php $selected = ($page->ID == $aposh_availability_page) ? "selected" : ""; ?>
            <option value="<?php echo $page->ID; ?>" <?php echo $selected; ?> ><?php echo $page->post_title; ?></option>
          <?php endforeach; ?> 
            </select>
          </td>  
        </tr>   
        <tr valign="top">
          <th scope="row">  
            <label for="aposh_client_login_page">  
              Client Login Page:  
            </label>  
          </th>  
          <td>  
            <select name="aposh_client_login_page">
              <?php
                $pages = get_pages(array(
                  'post_type' => 'page',
                  'post_status' => 'publish',
                  'sort_column' => 'post_title'
                ));
                foreach ($pages as $page):
              ?>
                <?php $selected = ($page->ID == $aposh_client_login_page) ? "selected" : ""; ?>
                <option value="<?php echo $page->ID; ?>" <?php echo $selected; ?> ><?php echo $page->post_title; ?></option>
              <?php endforeach; ?> 
            </select>
          
          </td>
        </tr> 
        <tr valign="top">
          <th scope="row">  
            <label for="aposh_tagline">Tagline</label> 
          </th>         
          <td>
            <input type="text" name="aposh_tagline" value="<?php echo $aposh_tagline; ?>"/>
          </td>
        </tr>         
      </table>                 
      
      <table class="form-table">
        <th><h3>Contact Settings</h3></th>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_coordinates_long">  
              Longitude:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_coordinates_long" value="<?php echo $aposh_coordinates_long;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_coordinates_lat">  
              Latitude:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_coordinates_lat" value="<?php echo $aposh_coordinates_lat;?>"/>  
          </td>  
        </tr>           
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_phone">  
              Phone:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_phone" value="<?php echo $aposh_phone;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_website">  
              Website:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_website" value="<?php echo $aposh_website;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_email">  
              Email:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_email" value="<?php echo $aposh_email;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_address_0">  
              Address Line 0:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_address_0" value="<?php echo $aposh_address_0;?>"/>  
          </td>  
        </tr>                               
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_address_1">  
              Address Line 1:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_address_1" value="<?php echo $aposh_address_1;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_address_2">  
              Address Line 2:  
            </label>  
          </th>  
          <td>
            <input type="text" name="aposh_address_2" value="<?php echo $aposh_address_2;?>"/>  
          </td>  
        </tr>
        <tr valign="top">  
          <th scope="row">  
            <label for="aposh_address_3">  
              Address Line 3:  
            </label>  
          </th>  
          <td>  
            <input type="text" name="aposh_address_3" value="<?php echo $aposh_address_3;?>"/>  
          </td>  
        </tr>                                                                  
      </table>            
      <input type="hidden" name="update_settings" value="Y" />
      <p>  
        <input type="submit" value="Save settings" class="button-primary"/>  
      </p>        
    </form>       
  </div>  
 

<?php

}

// This tells WordPress to call the function named "setup_theme_admin_menus"  
// when it's time to create the menu pages.  
add_action("admin_menu", "setup_theme_admin_menus");  

?>