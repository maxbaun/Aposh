<?php

add_action( 'widgets_init', 'register_home_video_widget' ); // function to load my widget
 
function register_home_video_widget() {
  register_widget( 'Widget_Home_Video' );

}                        // function to register my widget
 
class Widget_Home_Video extends WP_Widget {
  function __construct() {
    parent::__construct(
      'home_video_widget', // Base ID
      __( 'Home Video', 'text_domain' ), // Name
      array( 'description' => __( 'Video for the home page', 'text_domain' ), ) // Args
    );   
  } 

  public function widget( $args, $instance ) {
    $iframe = $instance['iframe'];
    ?>
      <div class="flex-video widescreen">
        <?php echo $iframe; ?>   
      </div>
    <?php
  }
   
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['iframe'] = ( ! empty( $new_instance['iframe'] ) ) ? $new_instance['iframe']  : '';

    return $instance;
  }
   
  function form($instance) {
    $iframe = __('iFrame Code');
    if(isset($instance['iframe']))
    {
        $iframe = $instance['iframe'];
    }    

    ?>
    <p>
        <label for="<?php echo $this->get_field_name( 'iframe' ); ?>"><?php _e( 'iFrame Code:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'iframe' ); ?>" name="<?php echo $this->get_field_name( 'iframe' ); ?>"><?php echo $iframe; ?></textarea>
    </p>
         
    <?php
  }
}

?>