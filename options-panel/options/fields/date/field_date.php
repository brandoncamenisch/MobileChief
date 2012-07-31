<?php
class PLCHF_MSB__Options_date extends PLCHF_MSB__Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since PLCHF_MSB__Options 1.0
	*/
	function __construct($field = array(), $value ='', $parent){
		
		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
		//$this->render();
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since PLCHF_MSB__Options 1.0
	*/
	function render(){
		
		$class = (isset($this->field['class']))?$this->field['class']:'';
		
		echo '<input type="text" id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" value="'.$this->value.'" class="'.$class.' plchf_msb_opts-datepicker" />';
		
		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
	}//function
	
	
	
	/**
	 * Enqueue Function.
	 *
	 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
	 *
	 * @since PLCHF_MSB__Options 1.0
	*/
	function enqueue(){
		wp_enqueue_style('plchf_msb_opts-jquery-ui-css');
		wp_enqueue_script(
			'plchf_msb_opts-field-date-js', 
			PLCHF_MSB__OPTIONS_URL.'fields/date/field_date.js', 
			array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
			time(),
			true
		);
		
	}//function
	
}//class
?>