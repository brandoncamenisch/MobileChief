<?php
class PLCHF_MSB__Validation_url extends PLCHF_MSB__Options{	
	
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
		$this->field['msg'] = (isset($this->field['msg']))?$this->field['msg']:__('You must provide a valid URL for this option.', 'plchf_msb_opts');
		$this->value = $value;
		$this->current = $current;
		$this->validate();
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and validates them
	 *
	 * @since PLCHF_MSB__Options 1.0
	*/
	function validate(){
		
		if (filter_var($this->value, FILTER_VALIDATE_URL) == false) {
			$this->value = (isset($this->current))?$this->current:'';
			$this->error = $this->field;
		}else{
			$this->value = esc_url_raw($this->value);
		}
				
	}//function
	
}//class
?>