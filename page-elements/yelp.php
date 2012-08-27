<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_yelp_element_yelp() {
	
		plchf_msb_add_page_element('Yelp');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_yelp_element_yelp', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Text Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_yelp($count, $values){
		
		// Define Element Type
		$element_type 	= 'Yelp';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your FULL Yelp Url',
				'id' 			=> '_yelp_',
				'tooltip' 		=> 'Enter your Yelp URL here',
				'placeholder' 	=> 'Enter your Yelp URL',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_yelp','plchf_msb_page_element_settings_yelp', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Text Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_yelp($values) {
		
		// Get the Values
		$text 	= $values['_yelp_'];
		
		require_once(PLUGINCHIEFMSB_PATH . 'functions/simple_html_dom.php');
		
		$html = file_get_html($text);

		foreach($html->find('div[id=bizInfoBody]') as $article) {

		   $item['title'] = $article->find('div.[id=bizInfoHeader] h1', 0)->plaintext;
  		   $item['review'] = $article->find('span.review-count span[itemprop=reviewCount]', 0)->plaintext;    
  		   $item['star'] = $article->find('div.[id=bizInfoHeader] div.[id=bizRating] div div.rating i img', 0)->alt;

  		   $item['categories'] = $article->find('div[id=bizInfoContent]  p[id=bizCategories] span[id=cat_display]', 0)->plaintext;    
  		   $item['address'] = $article->find('div[id=bizInfoContent] address[itemprop="address"] span[itemprop="streetAddress"]', 0)->plaintext;    
  		   $item['addressLocality'] = $article->find('div[id=bizInfoContent] address[itemprop="address"] span[itemprop="addressLocality"]', 0)->plaintext;    
  		   $item['addressRegion'] = $article->find('div[id=bizInfoContent] address[itemprop="address"] span[itemprop="addressRegion"]', 0)->plaintext;    
  		   $item['postalCode'] = $article->find('div[id=bizInfoContent] address[itemprop="address"] span[itemprop="postalCode"]', 0)->plaintext;    
  		   $item['telephone'] = $article->find('div[id=bizInfoContent] span[itemprop="telephone"]', 0)->plaintext;    

		}
		
		$output .= '
		<div class="alert alert-error">
			<a href="'.$text.'" target="_blank"><img src="'.PLUGINCHIEFMSB.'/theme-assets/img/yelp.png" class="img pull-left" alt="yelp" width="25px" height="auto" /><h3>'. $item['title'].'</h3></a><br />
			<address itemtype="http://schema.org/PostalAddress">
				<i class="icon-road">&nbsp;</i><span itemprop="streetAddress">'.$item['address'].'</span>&#44;&nbsp;<span itemprop="addressLocality">'.$item['addressLocality'].'</span> 
				<span itemprop="addressRegion">'.$item['addressRegion'].'</span>
				<span itemprop="postalCode">'.$item['addressCode'].'</span><br>
				<i class="icon-phone">&nbsp;<a href="tel:'.$item['telephone'].'">'.$item['telephone'].'</a></i>
			</address>
			
			<hr>
			
			'.'<i class="icon-star">&nbsp;'. $item['star'] .'</i><br/>
			'.'<i class="icon-pencil">&nbsp;</i>'. $item['review'].'&nbsp;Reviews<br/>
			'.'<i class="icon-tags">&nbsp;</i>'. $item['categories'].'
		</div>
		
		<hr>
		';

		echo apply_filters('plchf_msb_page_element_output_yelp_filter',$output);

	}
	
	add_action('plchf_msb_page_element_output_yelp','plchf_msb_page_element_output_yelp', 1, 1);