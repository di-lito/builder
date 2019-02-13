<?php
/**
 * @package Helix3 Framework
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2014 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/
//no direct accees
defined ('_JEXEC') or die('restricted access');

class Helix3FeatureTitle {

	private $helix3;

	public function __construct($helix){
		$this->helix3 = $helix;
		$this->position = 'title';
	}

	public function renderFeature() {

		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();
		$menuitem = $app->getMenu()->getActive(); // get the active item

		if($menuitem) {

			$params 	= $menuitem->params; // get the menu params

			if($params->get('enable_page_title', 0)) {

				$page_title  = $menuitem->title;
				$enable_page_title_parallax = $params->get('enable_page_title_parallax', 0);
				$page_title_size = $params->get('page_title_size');
				$page_title_height = $params->get('page_title_height');
				$page_title_align = $params->get('page_title_align');
				$page_title_alt = $params->get('page_title_alt');
				$page_subtitle = $params->get('page_subtitle');
				$page_title_bg_color = $params->get('page_title_bg_color');
				$page_title_bg_image = $params->get('page_title_bg_image');
				$include_breadcrumbs = $params->get('include_breadcrumbs', 1);
				// Background Image options (added in Flex 3.0):
				$page_title_bg_image_repeat = $params->get('page_title_bg_image_repeat', 'no-repeat');
				$page_title_bg_image_size = $params->get('page_title_bg_image_size', 'cover');
				$page_title_bg_image_attachment = $params->get('page_title_bg_image_attachment', 'fixed');
				$page_title_bg_image_hor_position = $params->get('page_title_bg_image_hor_position', 50);
				$page_title_bg_image_vert_position = $params->get('page_title_bg_image_vert_position', 50);

				$style = '';
				$parallax = '';
				$page_title_align_style = '';
	
				
				if($enable_page_title_parallax) {
					$parallax = ' parallax_4';
				}
				
				if($page_title_size != '') {
					if($page_title_size > '32') {
						$page_title_size_style = ' style="font-size:' . $page_title_size . 'px;text-shadow:1px 2px 4px rgba(0,0,0,0.2);"';
					} else {
						$page_title_size_style = ' style="font-size:' . $page_title_size . 'px;"';
					}
				} else {
					$page_title_size_style = '';
				}
				
				if($page_title_height) {
				    $style .= 'height:' . $page_title_height . 'px;';
				} else {
					$style .= 'padding:60px 0;';
				}
				
				if($page_title_align) {
				    $style .= 'text-align:' . $page_title_align . ';';
				}
			
				if($page_title_bg_color) {
					$style .= 'background-color:' . $page_title_bg_color . ';';
				}
				
				if($page_title_bg_image) {
					
					if (strpos($page_title_bg_image, '://') === false) {
					//if(strpos($page_title_bg_image, "http://") === false && strpos($page_title_bg_image, "https://") === false){
						$style .= 'background-image:url(' . JURI::root(true) . '/' . $page_title_bg_image . ');';
					} else {
						$style .= 'background-image:url(' . $page_title_bg_image . ');';
					}
					$style .= 'background-repeat:'. $page_title_bg_image_repeat .';';
					$style .= 'background-position:'. $page_title_bg_image_hor_position .'% '. $page_title_bg_image_vert_position .'%;';
					$style .= 'background-size:'. $page_title_bg_image_size .';';
					$style .= 'background-attachment:'. $page_title_bg_image_attachment .';';
				}
			
				// Add styles
				$css = '.sp-page-title, .sp-page-title-no-img {'. $style .'}';		 
				$doc->addStyleDeclaration($css);

				if($page_title_alt) {
					$page_title = $page_title_alt;
				}

				$output = '';

				if($page_title_bg_image) {
					$output .= '<div class="sp-page-title'. $parallax .'">';
				} else {
					$output .= '<div class="sp-page-title-no-img'. $parallax .'">';
				}
				$output .= '<div class="container">';

				$output .= '<h2 itemprop="headline"' . $page_title_size_style . '>'. $page_title .'</h2>';

				if($page_subtitle) {
					$output .= '<h3>'. $page_subtitle .'</h3>';
				}

				if($include_breadcrumbs == 1) {
					$output .= '<jdoc:include type="modules" name="breadcrumb" style="none" />';
				}

				$output .= '</div>';
				$output .= '</div>';

				return $output;

			}

		}

	}
}
