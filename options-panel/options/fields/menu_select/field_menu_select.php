<?php
class PLUGINCHIEFMSB_Options_menu_select extends PLUGINCHIEFMSB_Options{	
	
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
		$pluginchiefmsb_args = wp_parse_args($this->field['args'], array());
			
		$menus = wp_get_nav_menus($pluginchiefmsb_args);
		if($menus){
			foreach ( $menus as $menu ) {
				echo '<option value="'.$menu->term_id.'"'.selected($this->value, $menu->term_id, false).'>'.$menu->name.'</option>';
			}
		}//if

		echo '</select>';

		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
	}//function
	
}//class
?>