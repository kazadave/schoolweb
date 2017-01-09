<?php

class BWGEControllerParameters_bwge extends BWGEController {
	////////////////////////////////////////////////////////////////////////////////////////
	// Events                                                                             //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Constants                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Variables                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Constructor & Destructor                                                           //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Public Methods                                                                     //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Getters & Setters                                                                  //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Private Methods                                                                    //
	////////////////////////////////////////////////////////////////////////////////////////
	protected function save(){		
		$this->store_data();
		//BWGEHelper::bwge_redirect("admin.php?page=".$this->page);	
		BWGEHelper::message(__("Item Succesfully Saved.","bwge_back"),'updated');
		$this->display();			
	}

	protected function apply(){
		$id = $this->store_data();
		//BWGEHelper::bwge_redirect("admin.php?page=".$this->page.'&task=edit&id='.$id );	
		BWGEHelper::message(__("Item Succesfully Saved.","bwge_back"),'updated');
		$this->view->edit($id);				
	}


	private function store_data(){
		global $wpdb;
		$data = array();
		$data["id"] = BWGEHelper::get("id");
		$data["title"] = esc_html(BWGEHelper::get("title"));
		$data["type"] = esc_html(BWGEHelper::get("type"));	
		$data["default_values"] = esc_html(BWGEHelper::get("default_values"));
		
		
		$format = array('%d','%s','%s','%s','%d');
		
		if( BWGEHelper::get("id") == NULL){
			$data["published"] = 1;
			$wpdb->insert( $wpdb->prefix . "bwge_parameters", $data, $format );
			return $wpdb->get_var("SELECT MAX(id) FROM ". $wpdb->prefix . "bwge_parameters");
		}
		else{
			$data["published"] = esc_html(BWGEHelper::get("published"));
			$where = array("id"=>BWGEHelper::get("id"));
			$where_format = array('%d');
			$wpdb->update( $wpdb->prefix . "bwge_parameters", $data, $where, $format, $where_format );
			return BWGEHelper::get("id");
		}

	}
	
	////////////////////////////////////////////////////////////////////////////////////////
	// Listeners                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
}