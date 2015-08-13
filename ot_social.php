<?php
/*
Plugin Name: OT Social Icons
Plugin URI: http://orangeit-info.com
Description: You can show your social icons in your widget area.It is an awesome design.
Tags: social icons, social icon, social widget icon, social, icons, icon, social widgets, facebook icon, twitter icon, google-plus icons
Author: Jobayer
Author URI: http://freelancer-jobayer.com
version: 1.1
License: GPLv2 or later
Text Domain: ot_social_icons
*/
add_action('wp_enqueue_scripts', function(){
	wp_register_style('OTstyle', plugins_url('/css/style.css', __FILE__));
	wp_register_style('OTreset', plugins_url('/css/reset.css', __FILE__));
	wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
	
	wp_enqueue_style('OTstyle');
	wp_enqueue_style('OTreset');
	wp_enqueue_style('font-awesome');
});
class ot_social extends WP_Widget{
	function __construct(){
		$params = array(
			'description' => 'You can show your social icons  in your widget area.',
			'name' => 'OT Social Icons'
		);
		parent::__construct('ot_social', '', $params);
	}
	public function form($instance){
		extract($instance);
		$instance = wp_parse_args( (array) $instance, array( 'facebook' => 'DEFAULT_VALUE_HERE' ) );
		?>
		<p>Add you All Social Link icons bellow the social text box</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook');?>">Facebook</label>
			<input type="text" placeholder="http://facebook.com" class="widefat" id="<?php echo $this->get_field_id('facebook');?>"
					name="<?php echo $this->get_field_name('facebook'); ?>"
					value="<?php if(isset($facebook)) echo esc_attr($facebook); ?>"
			/>
			<p>Add you Facebook link</p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter');?>">Twitter</label>
			<input type="text" placeholder="http://twitter.com" class="widefat" id="<?php echo $this->get_field_id('twitter');?>"
					name="<?php echo $this->get_field_name('twitter'); ?>"
					value="<?php if(isset($twitter)) echo esc_attr($twitter); ?>"
			/>
			<p>Add you Twitter link</p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('googleplus');?>">Google Plus</label>
			<input type="text" placeholder="http://plug.google.com" class="widefat" id="<?php echo $this->get_field_id('googleplus');?>"
					name="<?php echo $this->get_field_name('googleplus'); ?>"
					value="<?php if(isset($googleplus)) echo esc_attr($googleplus); ?>"
			/>
			<p>Add you Google Plus link</p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest');?>">Pinterest</label>
			<input type="text" placeholder="http://pinterest.com" class="widefat" id="<?php echo $this->get_field_id('pinterest');?>"
					name="<?php echo $this->get_field_name('pinterest'); ?>"
					value="<?php if(isset($pinterest)) echo esc_attr($pinterest); ?>"
			/>
			<p>Add you Pinterest link</p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin');?>">Linked In</label>
			<input type="text" placeholder="http://linkedin.com" class="widefat" id="<?php echo $this->get_field_id('linkedin');?>"
					name="<?php echo $this->get_field_name('linkedin'); ?>"
					value="<?php if(isset($linkedin)) echo esc_attr($linkedin); ?>"
			/>
			<p>Add you Linked In link</p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram');?>">Instagram</label>
			<input type="text" placeholder="http://instragram.com" class="widefat" id="<?php echo $this->get_field_id('instagram');?>"
					name="<?php echo $this->get_field_name('instagram'); ?>"
					value="<?php if(isset($instagram)) echo esc_attr($instagram); ?>"
			/>
			<p>Add you Instagram link</p>
		</p>
		<?php
		
	}
	
	public function widget($args, $instance){
		extract($args);
		extract($instance);
		$otsocial = '
					<div class="ot_container">
						 <div class="ot_row">
							<a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="'.$googleplus.'" target="_blank"><i class="fa fa-google-plus"></i></a>
							<a href="'.$pinterest.'" target="_blank"><i class="fa fa-pinterest"></i></a>
							<a href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a>
							<a href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a>
						</div>
					</div>';
		echo $args[before_widget].$otsocial.$args['after_widget'];
	}
	
}
add_action('widgets_init', 'ot_social_widget');
function ot_social_widget(){
	register_widget('ot_social');
	
}