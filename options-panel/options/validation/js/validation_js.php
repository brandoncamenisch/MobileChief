<?php
class PLUGINCHIEFMSB_Validation_js extends PLUGINCHIEFMSB_Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function __construct($field, $value, $current){
		
		parent::__construct();
		$this->field = $field;
		$this->value = $value;
		$this->current = $current;
		$this->validate();
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and validates them
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function validate(){
		
		$this->value = esc_js($this->value);
				
	}//function
	
}//class
?>