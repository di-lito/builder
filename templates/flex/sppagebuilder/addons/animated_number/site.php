<?php
/**
 * Flex @package SP Page Builder
 * Template Name - Flex
 * @author Aplikko http://www.aplikko.com
 * @copyright Copyright (c) 2017 Aplikko
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
// no direct access
defined('_JEXEC') or die;

class SppagebuilderAddonAnimated_number extends SppagebuilderAddons{

	public function render() {

		$number = (isset($this->addon->settings->number) && $this->addon->settings->number) ? $this->addon->settings->number : 0;
		
		$number_addtext = (isset($this->addon->settings->number_addtext) && $this->addon->settings->number_addtext) ? $this->addon->settings->number_addtext : '';
		
		$duration = (isset($this->addon->settings->duration) && $this->addon->settings->duration) ? $this->addon->settings->duration : 0;
		$counter_title = (isset($this->addon->settings->counter_title) && $this->addon->settings->counter_title) ? $this->addon->settings->counter_title : '';
		$alignment = (isset($this->addon->settings->alignment) && $this->addon->settings->alignment) ? $this->addon->settings->alignment : '';
		
		
		$font_size = (isset($this->addon->settings->font_size) && $this->addon->settings->font_size) ? $this->addon->settings->font_size : '';
		$color = (isset($this->addon->settings->color) && $this->addon->settings->color) ? $this->addon->settings->color : '';
		$title_font_size = (isset($this->addon->settings->title_font_size) && $this->addon->settings->title_font_size) ? $this->addon->settings->title_font_size : '';
		$counter_color = (isset($this->addon->settings->counter_color) && $this->addon->settings->counter_color) ? $this->addon->settings->counter_color : '';
		$background = (isset($this->addon->settings->background) && $this->addon->settings->background) ? $this->addon->settings->background : '';
		$border_color = (isset($this->addon->settings->border_color) && $this->addon->settings->border_color) ? $this->addon->settings->border_color : '';
		$border_width = (isset($this->addon->settings->border_width) && $this->addon->settings->border_width) ? $this->addon->settings->border_width : '';
		$border_radius = (isset($this->addon->settings->border_radius) && $this->addon->settings->border_radius) ? $this->addon->settings->border_radius : '';
		
		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
		
		
		// Styling
		$style = '';
		$number_style = '';
		$text_style 	= '';
	
		if($background) $class .= $class . ' sppb-hasbg';
	
		if($background) $style .= 'background-color:' . $background  . ';';
		if($border_color) $style .= 'border-style:solid;border-color:' . $border_color  . ';';
		
		$border_width != '' ? $padding = 'padding:20px;' : $padding = '';
		$class == 'shadow' ? $shadow = 'box-shadow:0 0 15px rgba(0,0,0,0.2);text-shadow: 1px 2px 2px rgba(0,0,0,0.2);padding:20px;' : $shadow = '';
		$class == 'padding' ? $paddingbox = 'padding:20px;' : $paddingbox = '';
		
		if($border_width) $style .= 'border-width:' . (int) $border_width  . 'px;';
		if($border_radius) $style .= 'border-radius:' . (int) $border_radius  . 'px;';
		
		if($counter_color) $text_style .= 'color:' . $counter_color  . ';';
		
		
		$number_addtext != '' ? $number_addtext = '<span class="number_addtext">'. $number_addtext .'</span>' : $number_addtext = '';

		$output  = '<div class="sppb-addon sppb-addon-animated-number '. $alignment . ' ' . $class .'">';
		
		$output .= '<div class="sppb-addon-content" style="' . $paddingbox . $padding . $style . $shadow . '">';
		$output .= '<span class="sppb-animated-number" data-digit="'. $number .'" data-duration="' . $duration . '">0</span>'. $number_addtext .'';
		if($counter_title) $output .= '<div class="sppb-animated-number-title" style="' . $text_style . '">' . $counter_title . '</div>';
		$output .= '</div>';
	
		$output .= '</div>';
		
		return $output;
	}


	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$number_style  = (isset($this->addon->settings->color) && $this->addon->settings->color) ? "\tcolor: " . $this->addon->settings->color  . ";\n" : '';
		
		$number_addtext = (isset($this->addon->settings->number_addtext) && $this->addon->settings->number_addtext) ? $this->addon->settings->number_addtext : '';	
		$number_addtext_style = '';
		if($this->addon->settings->color) $number_addtext_style .= 'color:' . $this->addon->settings->color  . ';';
		if($this->addon->settings->font_size) $number_addtext_style .= 'font-size:' . (int) $this->addon->settings->font_size . 'px;line-height:1.2;';
		
		$number_style_sm  = '';
		$number_style_xs  = '';

		$number_style .= (isset($this->addon->settings->font_size) && $this->addon->settings->font_size) ? 'font-size:' . (int) $this->addon->settings->font_size . 'px;line-height:' . (int) $this->addon->settings->font_size . 'px;' : '';
		$number_style_sm .= (isset($this->addon->settings->font_size_sm) && $this->addon->settings->font_size_sm) ? 'font-size:' . (int) $this->addon->settings->font_size_sm . 'px;line-height:' . (int) $this->addon->settings->font_size_sm . 'px;' : '';
		$number_style_xs .= (isset($this->addon->settings->font_size_xs) && $this->addon->settings->font_size_xs) ? 'font-size:' . (int) $this->addon->settings->font_size_xs . 'px;line-height:' . (int) $this->addon->settings->font_size_xs . 'px;' : '';

		$text_style = (isset($this->addon->settings->counter_color) && $this->addon->settings->counter_color) ? "\tcolor: " . $this->addon->settings->counter_color  . ";\n" : '';
		$text_style_sm = '';
		$text_style_xs = '';

		$text_style .= (isset($this->addon->settings->title_font_size) && $this->addon->settings->title_font_size) ? 'font-size:' . (int) $this->addon->settings->title_font_size . 'px;line-height:' . (int) $this->addon->settings->title_font_size . 'px;': '';
		$text_style_sm .= (isset($this->addon->settings->title_font_size_sm) && $this->addon->settings->title_font_size_sm) ? 'font-size:' . (int) $this->addon->settings->title_font_size_sm . 'px;line-height:' . (int) $this->addon->settings->title_font_size_sm . 'px;': '';
		$text_style_xs .= (isset($this->addon->settings->title_font_size_xs) && $this->addon->settings->title_font_size_xs) ? 'font-size:' . (int) $this->addon->settings->title_font_size_xs . 'px;line-height:' . (int) $this->addon->settings->title_font_size_xs . 'px;': '';

		$css = '';

		if($number_style) {
			$css .= $addon_id . ' .sppb-animated-number {';
			$css .= $number_style;
			$css .= '}';
		}

		if($text_style) {
			$css .= $addon_id . ' .sppb-animated-number-title {';
			$css .= $text_style;
			$css .= '}';
		}
		
		if($number_addtext != '') {
			$css .= $addon_id . ' .number_addtext{';
			$css .= $number_addtext_style;
			$css .= '}';
		}

		$css .= '@media (min-width: 768px) and (max-width: 991px) {';
			if($number_style_sm) {
				$css .= $addon_id . ' .sppb-animated-number {';
					$css .= $number_style_sm;
				$css .= '}';
			}

			if($text_style_sm) {
				$css .= $addon_id . ' .sppb-animated-number-title {';
					$css .= $text_style_sm;
				$css .= '}';
			}
		$css .= '}';

		$css .= '@media (max-width: 767px) {';
			if($number_style_xs) {
				$css .= $addon_id . ' .sppb-animated-number {';
					$css .= $number_style_xs;
				$css .= '}';
			}

			if($text_style_xs) {
				$css .= $addon_id . ' .sppb-animated-number-title {';
					$css .= $text_style_xs;
				$css .= '}';
			}
		$css .= '}';

		return $css;
	}

}
