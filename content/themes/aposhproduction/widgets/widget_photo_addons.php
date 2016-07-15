<?php

add_action( 'widgets_init', 'register_photo_addon_widget' ); // function to load my widget
 
function register_photo_addon_widget() {
  register_widget( 'Widget_Photo_Addon' );

}                        // function to register my widget
 
class Widget_Photo_Addon extends WP_Widget {
  function __construct() {
    parent::__construct(
      'widget_photo_addon', // Base ID
      __( 'Photo Addon Widget', 'text_domain' ), // Name
      array( 'description' => __( 'Content for the photo addon widget', 'text_domain' ), ) // Args
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
    $title = $instance['title'];
    ?>
      <?php echo do_shortcode('[page-section title="'.$title.'" class="photo-addon-section"]'.$text.'[/page-section][section-breaker][/section-breaker]'); ?>
    <?php
  }
   
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';

    return $instance;
  }
   
  function form($instance) {
    $title = __('Title');
    if(isset($instance['title']))
    {
        $title = $instance['title'];
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
        <label for="<?php echo $this->get_field_name( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
        <textarea name="<?php echo $this->get_field_name( 'text' ); ?>" id="<?php echo $this->get_field_id( 'text' ); ?>" class="widefat"   value="" ><?php echo ( $text ); ?></textarea>
    </p>          
    <?php
  }
}

?>