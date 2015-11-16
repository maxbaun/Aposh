<?php

add_action( 'widgets_init', 'register_widget_home_featured_widget' ); // function to load my widget
 
function register_widget_home_featured_widget() {
  register_widget( 'Widget_Home_Featured' );

}                        // function to register my widget
 
class Widget_Home_Featured extends WP_Widget {
  function __construct() {
    parent::__construct(
      'home_featured_widget', // Base ID
      __( 'Home Featured Item', 'text_domain' ), // Name
      array( 'description' => __( 'Featured content widget for the home page', 'text_domain' ), ) // Args
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
    $text = $instance['text'];
    $imgData = wp_get_attachment_image_src($instance['image'],'full');
    $img = $imgData[0];
    $link = $instance['link'];
    $title = $instance['title'];
    ?>
      <div class="col-md-4 item">
        <p class="title"><?php echo $title; ?></p>
        <div class="thumb" style="background-image: url(<?php echo $img; ?>);">
          <div class="overlay">
            <div class="vertical-center-wrapper text-center">
              <div class="vertical-center">
                <a href="<?php echo $link; ?>" class="btn btn-learn">Learn More</a>
              </div>
            </div>
          </div>
        </div>
        <p class="text"><?php echo $text; ?></p>
        <hr/>
        <?php echo do_shortcode('[more text="Learn More" link="'.$link.'"][/more]'); ?>
      </div>
    <?php
  }
   
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
    $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';

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
    $text = '';
    if(isset($instance['text']))
    {
        $text = $instance['text'];
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
        <label for="<?php echo $this->get_field_name( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
        <textarea name="<?php echo $this->get_field_name( 'text' ); ?>" id="<?php echo $this->get_field_id( 'text' ); ?>" class="widefat"   value="" ><?php echo ( $text ); ?></textarea>
    </p>          
    <?php
  }
}

?>