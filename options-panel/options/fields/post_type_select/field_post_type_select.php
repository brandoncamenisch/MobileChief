<?php
class PLUGINCHIEFMSB_Options_post_type_select extends PLUGINCHIEFMSB_Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0.1
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
	 * @since PLUGINCHIEFMSB_Options 1.0.1
	*/
	function render(){
		
		$class = (isset($this->field['class']))?'class="'.$this->field['class'].'" ':'';
		
		echo '<select id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" '.$class.' >';
		
		if(!isset($this->field['args'])){$this->field['args'] = array();}
		$pluginchiefmsb_args = wp_parse_args($this->field['args'], array('public' => true));
			
		$post_types = get_post_types($pluginchiefmsb_args, 'object'); 
		foreach ( $post_types as $k => $post_type ) {
			echo '<option value="'.$k.'"'.selected($this->value, $k, false).'>'.$post_type->labels->name.'</option>';
		}
		echo '</select>';

		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
	}//function
	
}//class
?>