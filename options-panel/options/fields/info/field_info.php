<?php
class PLCHF_MSB__Options_info extends PLCHF_MSB__Options{	
	
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
		
		$class = (isset($this->field['class']))?' '.$this->field['class']:'';
		
		echo '</td></tr></table><div class="plchf_msb_opts-info-field'.$class.'">'.$this->field['desc'].'</div><table class="form-table no-border"><tbody><tr><th></th><td>';
		
	}//function
	
}//class
?>