<?php
/**
 * Flex @package SP Page Builder
 * Template Name - Flex
 * @author Aplikko http://www.aplikko.com
 * @copyright Copyright (c) 2018 Aplikko
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
// no direct access
defined ('_JEXEC') or die ('restricted aceess');

class SppagebuilderAddonTestimonial extends SppagebuilderAddons {

	public function render() {
		$settings = $this->addon->settings;
		$class = (isset($settings->class) && $settings->class) ? $settings->class : '';
		$class .= (isset($settings->alignment) && $settings->alignment) ? $settings->alignment : 'sppb-text-left';
		$style = (isset($settings->style) && $settings->style) ? $settings->style : '';
		$show_avatar = (isset($settings->show_avatar) && $settings->show_avatar) ? $settings->show_avatar : 1;
		$avatar_position = (isset($settings->alignment) && $settings->alignment) ? $avatar_position = $settings->alignment : $avatar_position = 'left';
		$style = (isset($settings->style) && $settings->style) ? $settings->style : '';
		$title = (isset($settings->title) && $settings->title) ? $settings->title : '';
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';
		$show_quote = (isset($settings->show_quote)) ? $settings->show_quote : 1;

		//Options
		$review = (isset($settings->review) && $settings->review) ? $settings->review : '';
		$name = (isset($settings->name) && $settings->name) ? $settings->name : '';
		$company = (isset($settings->company) && $settings->company) ? $settings->company : '';
		$avatar = (isset($settings->avatar) && $settings->avatar) ? $settings->avatar : '';
		$avatar_size = (isset($settings->avatar_width) && $settings->avatar_width) ? $settings->avatar_width : '';
		
		$link = (isset($settings->link) && $settings->link) ? $settings->link : '';
		$link_target = (isset($settings->link_target) && $settings->link_target) ? ' target="' . $settings->link_target . '"' : '';
		$show_footer_link = (isset($settings->show_footer_link) && $settings->show_footer_link) ? $settings->show_footer_link : '';
		
		//Rating
		$client_rating_enable = (isset($settings->client_rating_enable)) ? $settings->client_rating_enable : '';
		$client_rating = (isset($settings->client_rating)) ? $settings->client_rating : '';
		
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
					$output .= '<i style="margin:0 auto;display:table;width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user centered"></i>';
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
				// Rating
		if($client_rating_enable){
			$output .= '<div class="sppb-addon-testimonial-rating">';
			if($client_rating == 1){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 2){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 3){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 4){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 5){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
			}
			$output .= '</div>';
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
		if ($avatar_position != 'center') {
			$output .= '<div style="text-align:'.$avatar_position.'" class="sppb-media-body">';
		} else {
			$output .= '<div class="sppb-media-body centered">';
		}
		
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
					
				$output .= '<a' . $link_target . ' class="pull-center" href="'.$link.'">';
				$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user centered"></i>';
				$output .= '</a>';	
				} else {
					$output .= '<i style="width:' . $avatar_size . 'px;height:' . ( $avatar_size + 1 ) . 'px;line-height:' . ( $avatar_size - 2 ) . 'px;font-size:' . ( $avatar_size / 1.8 ) . 'px;" class="fa fa-user pull-center"></i>';
				}
			}
			$output .= '</footer>';
		}
		
		// Link bellow
		if($show_footer_link){
			$output .= $link ? '<div class="clearfix"></div><a' . $link_target . ' href="'.$link.'"><em style="vertical-align:top;" class="pro-client-url">'.$link_strip.'</em></a><i class="pe pe-7s-link"></i>' : '';
		}
		// Rating
		if($client_rating_enable){
			$output .= '<div class="sppb-addon-testimonial-rating">';
			if($client_rating == 1){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 2){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 3){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 4){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			} elseif($client_rating == 5){
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
				$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
			}
			$output .= '</div>';
		}
	
		$output .= '</div>';
		$output .= '</div>';
	}
	 
		$output .= '</div>';
		$output .= '</div>';
	
		return $output;

	}


	public function css() {
		$settings = $this->addon->settings;	
		$css = '';
		$style = '';
		$style_sm = '';
		$style_xs = '';
		$style .= (isset($settings->review_color) && $settings->review_color) ? "color: " . $settings->review_color . ";" : "";
		$style .= (isset($settings->review_size) && $settings->review_size) ? "font-size: " . $settings->review_size . "px;" : "";
		$style_sm .= (isset($settings->review_size_sm) && $settings->review_size_sm) ? "font-size: " . $settings->review_size_sm . "px;" : "";
		$style_xs .= (isset($settings->review_size_xs) && $settings->review_size_xs) ? "font-size: " . $settings->review_size_xs . "px;" : "";

		$style .= (isset($settings->review_line_height) && $settings->review_line_height) ? "line-height: " . $settings->review_line_height . "px;" : "";
		$style_sm .= (isset($settings->review_line_height_sm) && $settings->review_line_height_sm) ? "line-height: " . $settings->review_line_height_sm . "px;" : "";
		$style_xs .= (isset($settings->review_line_height_xs) && $settings->review_line_height_xs) ? "line-height: " . $settings->review_line_height_xs . "px;" : "";
		

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

		$icon_style .= (isset($settings->icon_color) && $settings->icon_color) ? "color: " . $settings->icon_color . ";" : "";
		
		$icon_style .= (isset($settings->icon_size) && $settings->icon_size) ? "font-size: " . $settings->icon_size . "px;width: " . $settings->icon_size . "px;" : "";
		$icon_style_sm .= (isset($settings->icon_size_sm) && $settings->icon_size_sm) ? "font-size: " . $settings->icon_size_sm . "px;" : "";
		$icon_style_xs .= (isset($settings->icon_size_xs) && $settings->icon_size_xs) ? "font-size: " . $settings->icon_size_xs . "px;" : "";
		
		
		//Rating style
		$client_rating_color = (isset($settings->client_rating_color) && $settings->client_rating_color) ? 'color:'.$settings->client_rating_color.';' : '';
		$client_unrated_color = (isset($settings->client_unrated_color) && $settings->client_unrated_color) ? 'color:'.$settings->client_unrated_color.';' : '';
		$rating_style = '';
		$rating_style .= (isset($settings->client_rating_fontsize) && $settings->client_rating_fontsize) ? 'font-size:'.$settings->client_rating_fontsize.'px;' : '';
		$rating_style .= (isset($settings->client_rating_margin) && $settings->client_rating_margin) ? 'margin:'.$settings->client_rating_margin.';box-shadow:none;border:0;background:transparent;' : '';
		if($rating_style){
			$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial-rating i.fa{ ' . $rating_style . ' }';
		}
		if($client_rating_color){
			$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial-rating i.fa-star{ ' . $client_rating_color . ' }';
		}
		if($client_unrated_color){
			$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial-rating i.fa-star-o{ ' . $client_unrated_color . ' }';
		}

		if($icon_style){
			$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial .fa{ ' . $icon_style . ' }';
		}
		
		//Rating tablet style
		$rating_style_sm = '';
		$rating_style_sm .= (isset($settings->client_rating_fontsize_sm) && $settings->client_rating_fontsize_sm) ? 'font-size:'.$settings->client_rating_fontsize_sm.'px;' : '';
		$rating_style_sm .= (isset($settings->client_rating_margin_sm) && $settings->client_rating_margin_sm) ? 'margin:'.$settings->client_rating_margin_sm.';' : '';
		
		
		if($icon_style_sm){
			$css .= '@media (min-width: 768px) and (max-width: 991px) {';
			if($icon_style_sm){
				$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial .fa{';
				$css .= $icon_style_sm;
				$css .= '}';
			}
			if($rating_style_sm){
				$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial-rating i.fa{ ' . $rating_style_sm . ' }';
			}
			$css .= '}';
		}
		
		//Rating tablet style
		$rating_style_xs = '';
		$rating_style_xs .= (isset($settings->client_rating_fontsize_xs) && $settings->client_rating_fontsize_xs) ? 'font-size:'.$settings->client_rating_fontsize_xs.'px;' : '';
		$rating_style_xs .= (isset($settings->client_rating_margin_xs) && $settings->client_rating_margin_xs) ? 'margin:'.$settings->client_rating_margin_xs.';' : '';

		if($icon_style_xs){
			$css .= '@media (max-width: 767px) {';
				if($icon_style_xs){
					$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial .fa{';
					$css .= $icon_style_xs;
					$css .= '}';
				}
				if($rating_style_xs){
					$css .= '#sppb-addon-' . $this->addon->id . ' .sppb-addon-testimonial-rating i.fa{ ' . $rating_style_xs . ' }';
				}
			$css .= '}';
		}

		return $css;
	}

}
