<?php

add_action( 'widgets_init', 'register_home_slider_widget' ); // function to load my widget
 
function register_home_slider_widget() {
  register_widget( 'Widget_Home_Slider' );

}                        // function to register my widget
 
class Widget_Home_Slider extends WP_Widget {
  function __construct() {
    parent::__construct(
      'home_slide_widget', // Base ID
      __( 'Home Slide', 'text_domain' ), // Name
      array( 'description' => __( 'Slide for the home page slider', 'text_domain' ), ) // Args
    );

    // add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    // add_action('admin_enqueue_styles', array($this, 'upload_styles'));    
  }
  // public function upload_scripts()
  // {
  //     wp_enqueue_script('media-upload');
  //     wp_enqueue_script('thickbox');
  //     wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/widgets/upload-media.js', array('jquery'));
  // }

  // /**
  //  * Add the styles for the upload media box
  //  */
  // public function upload_styles()
  // {
  //     wp_enqueue_style('thickbox');
  // }   

  public function widget( $args, $instance ) {
    $active = $instance['active'] ? true : false;
    $imgData = wp_get_attachment_image_src($instance['image'],'full');
    $img = $imgData[0];
    $link = $instance['link'];
    $title = $instance['title'];
    ?>
      <div class="item <?php if($active) echo 'active'; ?>" style="background-image:url(<?php echo $img; ?>);">
        <!-- <img src="" alt="First slide"> -->
        <div class="white-stripe"></div>
        <div class="overlay"></div>          
        <div class="container">
          <div class="carousel-caption">
            <h1><?php echo $title; ?></h1>
            <div class="cta-wrapper">
              <a class="btn btn-cta btn-sm" href="<?php echo $link; ?>" role="button">Read More</a>
            </div>
          </div>
        </div>
      </div>
    <?php
  }
   
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
    $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
    $instance['active'] = ( ! empty( $new_instance['active'] ) ) ? strip_tags( $new_instance['active'] ) : '';

    return $instance;
  }
   
  function form($instance) {
    $title = __('Title');
    if(isset($instance['title']))
    {
        $title = $instance['title'];
    }

    $image = __('Image ID');
    if(isset($instance['image']))
    {
        $image = $instance['image'];
    }

    $link = '';
    if(isset($instance['link']))
    {
        $link = $instance['link'];
    }   
    $active = '';
    if(isset($instance['active']))
    {
        $active = $instance['active'];
    }      

    ?>
    <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image ID:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_attr($image); ?>" />
        <!-- <input class="upload_image_button button button-primary" type="button" value="Upload Image" /> -->
    </p>  

    <p>
        <label for="<?php echo $this->get_field_name( 'link' ); ?>"><?php _e( 'Link:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'link' ); ?>" id="<?php echo $this->get_field_id( 'link' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $link ); ?>" />
        <!-- <input class="upload_image_button button button-primary" type="button" value="Upload Image" /> -->
    </p>  

    <p>
        <label for="<?php echo $this->get_field_name( 'active' ); ?>"><?php _e( 'Active:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'active' ); ?>" id="<?php echo $this->get_field_id( 'link' ); ?>" class="widefat" type="checkbox" size="36"  <?php checked($instance['active'], 'on'); ?> />
        <!-- <input class="upload_image_button button button-primary" type="button" value="Upload Image" /> -->
    </p>          
    <?php
  }
}

?>