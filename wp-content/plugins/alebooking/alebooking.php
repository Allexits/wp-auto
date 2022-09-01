<?php
/*
	Plugin Name: Alebooking
*/

if(!defined('ABSPATH'))die;

class AleBooking
{


	function register(){
		add_action('init',[$this,'custom_post_type']);
		add_action('admin_enqueue_scripts',[$this,'enqueue_admin']);
		add_action('wp_enqueue_scripts',[$this,'enqueue_front']);
		add_filter('template_include',[$this,'room_template']);
		add_action( 'admin_menu', [$this,'add_admin_menu']);
		add_action('admin_init',[$this,'settings_init']);
	}

	function custom_post_type(){
		register_post_type('room',[
			
			'label' => esc_html__('Room','alebooking'),
			'labels' => [
				'name' => 'Room',
				'singular_name' =>'Room',
			],
			'public' => true,
			'supports' => ['title','editor','thumbnail'],
			'has_archive' => true,
			'rewrite' => ['slug' => 'rooms']
		]);
		register_taxonomy('location','room',[
			'hierarchical'  => true,
			'labels'        => array(
				'name'              => _x( 'Locations', 'taxonomy general name','alebooking'),
				'singular_name'     => _x( 'Locations', 'taxonomy singular name','alebooking' ),
				'search_items'      =>  __( 'Search Locations','alebooking' ),
				'all_items'         => __( 'All Locations','alebooking'),
				'parent_item'       => __( 'Parent Locations','alebooking' ),
				'parent_item_colon' => __( 'Parent Locations:','alebooking' ),
				'edit_item'         => __( 'Edit Locations','alebooking' ),
				'update_item'       => __( 'Update Locations','alebooking' ),
				'add_new_item'      => __( 'Add New Locations','alebooking' ),
				'new_item_name'     => __( 'New Locations Name','alebooking' ),
				'menu_name'         => __( 'Locations','alebooking' ),
			),
		'show_ui'       => true,
		'show_admin_column' =>true,
		'query_var'     => true,
		'rewrite' => array('slug' => 'rooms/location'),
	]);
	}

	function settings_init(){

		register_setting('booking_settings','booking_settings_options');
		add_settings_section('booking_settings_section',esc_html__('Settings','alebooking'),[$this,'settings_section_html'],'alebooking_set');
		add_settings_field('post_per_page',esc_html__('Post per page','alebooking'),[$this,'posts_per_page_html'],'alebooking_set','booking_settings_section');
		add_settings_field('title_for_rooms',esc_html__('Title for rooms','alebooking'),[$this,'title_for_rooms_html'],'alebooking_set','booking_settings_section');
		
	}

	function settings_section_html(){
		echo esc_html__('Hello','alebooking');
	}

	function posts_per_page_html(){
		$options= get_option('booking_settings_options');
		?>
			<input type="text" name="booking_settings_options[post_per_page]" value="<?php echo isset($options['post_per_page']) ? $options['post_per_page'] : ""; ?>">
		<?php
	}
	function title_for_rooms_html(){
		$options= get_option('booking_settings_options');
		?>
			<input type="text" name="booking_settings_options[title_for_rooms]" value="<?php echo isset($options['title_for_rooms']) ? $options['title_for_rooms'] : ""; ?>">
		<?php
	}

	function add_admin_menu(){
		add_menu_page( 
			'AleBooking',
			'AleBooking',
			'manage_options',
			'alebooking_set',
			[$this,'alebooking_page'],
			'dashicons-admin-multisite',
			6 
		);
	}

	function get_terms_hierarchical($tax_name,$cur_term){
		$taxonomy_terms = get_terms($tax_name,['hide_empty' => false,'parent'=>0]);
		if(!empty($taxonomy_terms)){
			foreach($taxonomy_terms as $term){

				if($cur_term==$term->term_id)
					echo '<option value="'.$term->term_id.'" selected>'.$term->name.'</option>';
				else
				 echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';

				$child_terms = get_terms($tax_name,['hide_empty' => false,'parent'=>$term->term_id]);
						if(!empty($child_terms)){
							echo '<option value="'.$child_terms->term_id.'"> --'.$child_terms->name.'</option>';
						}
				}
		}
	}

	function alebooking_page(){
		require_once plugin_dir_path(__FILE__)."admin/admin.php";
	}

	function enqueue_admin(){
		wp_enqueue_style('adminStyle',plugins_url('/assets/admin/styles.css',__FILE__));
		wp_enqueue_script('adminScript',plugins_url('/assets/admin/scripts.js',__FILE__));
	}

	function enqueue_front(){
		wp_enqueue_style('frontStyle',plugins_url('/assets/front/styles.css',__FILE__));
		wp_enqueue_script('frontScript',plugins_url('/assets/front/scripts.js',__FILE__));
	}

	function room_template($template){

		if(is_post_type_archive('room')){
			$theme_files = ['archive-room.php','alebooking/archive-room.php'];
			$exist = locate_template($theme_files,false);
			if($exist !=''){
				return $exist;
			}else{
				return plugin_dir_path(__FILE__).'templates/archive-room.php';
			}
		}
		return $template;
	}

	static function activation(){
		flush_rewrite_rules();
	}

	static function deactivation(){

	}

	static function uninstall(){
	$rooms= get_posts(['post_type'=>'room','numberposts'=>-1]);
	foreach($rooms as $room){
		wp_delete_post($room->ID,true);
		}
	}
}

if(class_exists('AleBooking')){
	$alebooking = new AleBooking();
}

$alebooking->register();
register_activation_hook(__FILE__,array($alebooking,'activation'));
register_deactivation_hook(__FILE__,array($alebooking,'deactivation'));
register_uninstall_hook(__FILE__,array($alebooking,'uninstall'));