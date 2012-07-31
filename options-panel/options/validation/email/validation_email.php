<?php
class PLCHF_MSB__Validation_email extends PLCHF_MSB__Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since PLCHF_MSB__Options 1.0
	*/
	function __construct($field, $value, $current){
		
		parent::__construct();
		$this->field = $field;
		$this->field['msg'] = (isset($this->field['msg']))?$this->field['msg']:__('You must provide a valid email for this option.', 'plchf_msb_opts');
		$this->value = $value;
		$this->current = $current;
		$this->validate();
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since PLCHF_MSB__Options 1.0
	*/
	function validate(){
		
		if(!is_email($this->value)){
			$this->value = (isset($this->current))?$this->current:'';
			$this->error = $this->field;
		}
		
	}//function
	
}//class
?>