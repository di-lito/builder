<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonTestimonial extends SppagebuilderAddons {

	public function render() {

		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
		$class .= (isset($this->addon->settings->alignment) && $this->addon->settings->alignment) ? $this->addon->settings->alignment : 'sppb-text-left';
		$style = (isset($this->addon->settings->style) && $this->addon->settings->style) ? $this->addon->settings->style : '';
		$show_avatar = (isset($this->addon->settings->show_avatar) && $this->addon->settings->show_avatar) ? $this->addon->settings->show_avatar : 1;
		$avatar_position = (isset($this->addon->settings->alignment) && $this->addon->settings->alignment) ? $avatar_position = $this->addon->settings->alignment : $avatar_position = 'left';
		$style = (isset($this->addon->settings->style) && $this->addon->settings->style) ? $this->addon->settings->style : '';
		$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';
		$show_quote = (isset($this->addon->settings->show_quote)) ? $this->addon->settings->show_quote : 1;

		//Options
		$review = (isset($this->addon->settings->review) && $this->addon->settings->review) ? $this->addon->settings->review : '';
		$name = (isset($this->addon->settings->name) && $this->addon->settings->name) ? $this->addon->settings->name : '';
		$company = (isset($this->addon->settings->company) && $this->addon->settings->company) ? $this->addon->settings->company : '';
		$avatar = (isset($this->addon->settings->avatar) && $this->addon->settings->avatar) ? $this->addon->settings->avatar : '';
		$avatar_size = (isset($this->addon->settings->avatar_width) && $this->addon->settings->avatar_width) ? $this->addon->settings->avatar_width : '';
		//$avatar_shape = (isset($this->addon->settings->avatar_shape) && $this->addon->settings->avatar_shape) ? $this->addon->settings->avatar_shape : 'sppb-avatar-circle';
		$link = (isset($this->addon->settings->link) && $this->addon->settings->link) ? $this->addon->settings->link : '';
		$link_target = (isset($this->addon->settings->link_target) && $this->addon->settings->link_target) ? ' target="' . $this->addon->settings->link_target . '"' : '';
		//$link_target = (isset($value->link_target) && $value->link_target) ? $link_target = ' target="' . $value->link_target . '"' : '';
		$show_footer_link = (isset($this->addon->settings->show_footer_link) && $this->addon->settings->show_footer_link) ? $this->addon->settings->show_footer_link : '';
		
		$link != '' ? $active_link = '' : $active_link = ' inactive';
		$link_strip = preg_replace("/^(http:\/\/|https:\/\/)/", "", $link);

		//Output
		$output  = '<div class="sppb-addon sppb-addon-testimonial ' . $class . '">';
		$output .= ($title) ? '<'.$heading_selector.' class="sppb-addon-title">' . $title . '</'.$heading_selector.'>' : '';
		$output .= '<div class="sppb-addon-content">';

		if($style == 'flex') {
		$output .= '<div class="sppb-media flex">';
		
		if ($avatar_position != 'center') {
			
			if ($avatar) {
				
				if ($link != '') {
					$output .= '<a' . $link_target . ' class="pull-'.$avatar_position.'" href="'.$link.'" data-toggle="tooltip" data-placement="top" title="'.$link_strip.'">';
					$output .= '<img class="sppb-media-object" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
					$output .= '</a>';
				} else {
					$output .= '<img class="sppb-media-object pull-'.$avatar_position.'" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
					
				}
					
			} else {
				
				if ($link != '') {
				$output .= '<a' . $link_target . ' class="pull-'.$avatar_position.'" href="'.$link.'" data-toggle="tooltip" data-placement="top" title="'.$link_strip.'">';
				$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 5 ) . 'px;line-height:' . ( $avatar_size + 3 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user"></i>';
				$output .= '</a>';	
				} else {
					$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 5 ) . 'px;line-height:' . ( $avatar_size + 3 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user pull-'.$avatar_position.'"></i>';
				}
				
			}
		
		} else {
			if ($avatar) {
				if ($link != '') {
					$output .= '<a' . $link_target . ' class="pull-center" href="'.$link.'">';
					$output .= '<img class="sppb-media-object" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
					$output .= '</a>';
				} else {
					$output .= '<img class="sppb-media-object pull-center" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
				}
			} else {
				if ($link != '') {
				$output .= '<a' . $link_target . ' class="pull-center" href="'.$link.'">';
				$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user"></i>';
				$output .= '</a>';	
				} else {
					$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user pull-center"></i>';
				}
			}
			$output .= '<div class="div-pull-center clearfix"></div>';
		}
		
		$output .= '<div style="text-align:'.$avatar_position.'" class="sppb-media-body">';
		if($show_quote){
			$output .= '<i class="fa fa-quote-left'. $active_link .'"></i>';
		}
		$output .= $review;
		if($show_quote){
			$output .= '<i class="fa fa-quote-right'. $active_link .'"></i>';
		}
		if ($avatar_position != 'center') {
			$output .= '<footer class="pull-'.$avatar_position.'"><strong><em>'.$name.'</em></strong> <cite>'.$company.'</cite></footer>';
			
		} else {
			$output .= '<footer class="pull-center"><strong class="pull-center">'.$name.'</strong> <cite>'.$company.'</cite>';
			$output .= '</footer>';	
		}
		
		// Link bellow
		if($show_footer_link){
			$output .= $link ? '<div style="margin:8px auto;" class="row-fluid clearfix"></div><a' . $link_target . ' href="'.$link.'" ><em class="client-url">'.$link_strip.'</em></a>' : '';
		}

		$output .= '</div>';
		$output .= '</div>';

	
		} else {
	
		$output .= '<div class="sppb-media default">';
		
		if ($avatar_position != 'center') {
			
			if ($avatar) {
				if ($link != '') {
					$output .= '<a' . $link_target . ' class="pull-'.$avatar_position.'" href="'.$link.'">';
					$output .= '<img class="sppb-media-object" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
					$output .= '</a>';
				} else {
					$output .= '<img class="sppb-media-object pull-'.$avatar_position.'" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
				}
			} else {
				if ($link != '') {
				$output .= '<a' . $link_target . ' class="pull-'.$avatar_position.'" href="'.$link.'">';
				$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user"></i>';
				$output .= '</a>';	
				} else {
					$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user pull-'.$avatar_position.'"></i>';
				}
			}
		
		} 
	
		$output .= '<div class="sppb-media-body">';
		//$output .= '<div>';
		$output .= $review;
		
		
		if ($avatar_position != 'center') {
			$output .= '<footer><strong>'.$name.'</strong> <cite>'.$company.'</cite></footer>';
		} else {
			$output .= '<footer><strong>'.$name.'</strong> <cite>'.$company.'</cite>';
			if ($avatar) {
				$output .= '<div style="margin-top:15px;" class="div-pull-center clearfix"></div>';
				if ($link != '') {
					$output .= '<a' . $link_target . ' class="pull-center" href="'.$link.'">';
					$output .= '<img class="sppb-media-object pull-center" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
					$output .= '</a>';
				} else {
					$output .= '<img class="sppb-media-object pull-center" src="'.$avatar.'" width="' . $avatar_size . '" alt="'.$name.'">';
				}
			} else {
				$output .= '<div style="margin-top:15px;" class="div-pull-center clearfix"></div>';
				if ($link != '') {
				//$output .= '<div class="div-pull-center clearfix"></div>';
				$output .= '<a' . $link_target . ' class="pull-center" href="'.$link.'">';
				$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user"></i>';
				$output .= '</a>';	
				} else {
					$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user pull-center"></i><hr />';
				}
			}
			$output .= '</footer>';
		}
		
		// Link bellow
		if($show_footer_link){
			$output .= $link ? '<div class="clearfix"></div><a' . $link_target . ' href="'.$link.'"><em style="vertical-align:top;" class="pro-client-url">'.$link_strip.'</em></a><i class="pe pe-7s-link"></i>' : '';
		}
		
		$output .= '</div>';
		$output .= '</div>';
	}
	 
		$output .= '</div>';
		$output .= '</div>';
	
		return $output;

	}


	public function css() {
		$css = '';

		$style = '';
		$style_sm = '';
		$style_xs = '';

		$style .= (isset($this->addon->settings->review_color) && $this->addon->settings->review_color) ? "color: " . $this->addon->settings->review_color . ";" : "";

		$style .= (isset($this->addon->settings->review_size) && $this->addon->settings->review_size) ? "font-size: " . $this->addon->settings->review_size . "px;" : "";
		$style_sm .= (isset($this->addon->settings->review_size_sm) && $this->addon->settings->review_size_sm) ? "font-size: " . $this->addon->settings->review_size_sm . "px;" : "";
		$style_xs .= (isset($this->addon->settings->review_size_xs) && $this->addon->settings->review_size_xs) ? "font-size: " . $this->addon->settings->review_size_xs . "px;" : "";

		$style .= (isset($this->addon->settings->review_line_height) && $this->addon->settings->review_line_height) ? "line-height: " . $this->addon->settings->review_line_height . "px;" : "";
		$style_sm .= (isset($this->addon->settings->review_line_height_sm) && $this->addon->settings->review_line_height_sm) ? "line-height: " . $this->addon->settings->review_line_height_sm . "px;" : "";
		$style_xs .= (isset($this->addon->settings->review_line_height_xs) && $this->addon->settings->review_line_height_xs) ? "line-height: " . $this->addon->settings->review_line_height_xs . "px;" : "";
		

		if($style){
			$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-media-body{ ' . $style . ' }';
		}

		if($style_sm){
			$css .= '@media (min-width: 768px) and (max-width: 991px) {#sppb-addon-' . $this->addon->id . ' .sppb-media-body{ ' . $style_sm . ' }}';
		}

		if($style_xs){
			$css .= '@media (max-width: 767px) {#sppb-addon-' . $this->addon->id . ' .sppb-media-body{ ' . $style_xs . ' }}';
		}

		$icon_style = '';
		$icon_style_sm = '';
		$icon_style_xs = '';

		$icon_style .= (isset($this->addon->settings->icon_color) && $this->addon->settings->icon_color) ? "color: " . $this->addon->settings->icon_color . ";" : "";
		
		$icon_style .= (isset($this->addon->settings->icon_size) && $this->addon->settings->icon_size) ? "font-size: " . $this->addon->settings->icon_size . "px;width: " . $this->addon->settings->icon_size . "px;" : "";
		$icon_style_sm .= (isset($this->addon->settings->icon_size_sm) && $this->addon->settings->icon_size_sm) ? "font-size: " . $this->addon->settings->icon_size_sm . "px;" : "";
		$icon_style_xs .= (isset($this->addon->settings->icon_size_xs) && $this->addon->settings->icon_size_xs) ? "font-size: " . $this->addon->settings->icon_size_xs . "px;" : "";
		

		if($icon_style){
			$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial .fa{ ' . $icon_style . ' }';
		}

		if($icon_style_sm){
			$css .= '@media (min-width: 768px) and (max-width: 991px) {#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial .fa{ ' . $icon_style_sm . ' }}';
		}

		if($icon_style_xs){
			$css .= '@media (max-width: 767px) {#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial .fa{ ' . $icon_style_xs . ' }}';
		}

		return $css;
	}

}
