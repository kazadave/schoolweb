<?php
        
class BWGEModelFrontend {
	////////////////////////////////////////////////////////////////////////////////////////
	// Events                                                                             //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Constants                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Variables                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	public $params;
	////////////////////////////////////////////////////////////////////////////////////////
	// Constructor & Destructor                                                           //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Public Methods                                                                     //
	////////////////////////////////////////////////////////////////////////////////////////
	public function __construct($params){
		$this->params = $params;
	}
	
	public function get_row_by_id($id , $table_name){
		global $wpdb;
		
		$table_name = $wpdb->prefix . "bwge_".$table_name ;
		if($id){
			$query = "SELECT * FROM " . $table_name ." WHERE id='".$id."'";			
			$row = $wpdb->get_row($query);
		}
		else{					
			$columns = $this->get_columns($table_name);			
			$row = new stdClass();
			foreach($columns as $column){
				$row->$column = "";
			}
		}

		return $row;
	}
	
	public function get_columns($table_name){
		global $wpdb;
		$query = "SHOW COLUMNS  FROM " . $table_name ;			
		$columns = $wpdb->get_col( $query , 0 );
		return 	$columns;	
	}
	
	public function  get_options(){
		global $wpdb;
		//options	
		$options_rows = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'bwge_ecommerceoptions ');
		$options = new stdClass();
		foreach ($options_rows as $row) {
			$name = $row->name;
			$value = $row->value;
			$options->$name = $value;
		}

		return 	$options;
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