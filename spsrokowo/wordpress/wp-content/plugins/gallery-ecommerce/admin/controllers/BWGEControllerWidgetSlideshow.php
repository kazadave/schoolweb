<?php

class BWGEControllerWidgetSlideshow extends WP_Widget {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $view;
  private $model;
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct() {
    $widget_ops = array(
      'classname' => 'bwp_gallery_slideshow',
      'description' => 'Add Photo Gallery slideshow to Your widget area.'
    );
    // Widget Control Settings.
    $control_ops = array('id_base' => 'bwp_gallery_slideshow');
    // Create the widget.
    parent::__construct('bwp_gallery_slideshow', 'Photo Gallery Slideshow', $widget_ops, $control_ops);
    require_once WD_BWGE_DIR . "/admin/models/BWGEModelWidgetSlideshow.php";
    $this->model = new BWGEModelWidgetSlideshow();

    require_once WD_BWGE_DIR . "/admin/views/BWGEViewWidgetSlideshow.php";
    $this->view = new BWGEViewWidgetSlideshow($this->model);
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function widget($args, $instance) {
    $this->view->widget($args, $instance);
	}

 	public function form( $instance ) {
    $this->view->form($instance, parent::get_field_id('title'), parent::get_field_name('title'), parent::get_field_id('gallery_id'), parent::get_field_name('gallery_id'), parent::get_field_id('width'), parent::get_field_name('width'), parent::get_field_id('height'), parent::get_field_name('height'), parent::get_field_id('filmstrip_height'), parent::get_field_name('filmstrip_height'), parent::get_field_id('effect'), parent::get_field_name('effect'), parent::get_field_id('interval'), parent::get_field_name('interval'), parent::get_field_id('shuffle'), parent::get_field_name('shuffle'), parent::get_field_id('theme_id'), parent::get_field_name('theme_id'));    
	}

	// Update Settings.
  public function update($new_instance, $old_instance) {
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['gallery_id'] = $new_instance['gallery_id'];
    $instance['width'] = $new_instance['width'];
    $instance['height'] = $new_instance['height'];
    $instance['filmstrip_height'] = $new_instance['filmstrip_height'];
    $instance['effect'] = $new_instance['effect'];
    $instance['interval'] = $new_instance['interval'];
    $instance['shuffle'] = $new_instance['shuffle'];
    $instance['theme_id'] = $new_instance['theme_id'];
    return $instance;
  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}