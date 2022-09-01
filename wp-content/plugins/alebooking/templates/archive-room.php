<?php
get_header('archive');
$options= get_option('booking_settings_options');
$instance = new AleBooking();
?>
<div class="wraper">
	<div class="booking_roooms">
	<h1><?php echo $options['title_for_rooms'];?></h1>
	<div class="filter">
		<form method="post" action="<?php echo get_post_type_archive_link('room');?>">
			<select name='location_opt'>
				<option value=""><?php esc_html_e('Select Location','alebooking')?></option>
						<?php
						$instance->get_terms_hierarchical('location',$_POST['location_opt']);
						?>		
			</select>
			<input type="submit" name="submit" value="<?php esc_html_e('Filter','alebooking')?>">
		</form>
	</div>
	<?php

	$posts_per_page=-1;
	if($options['post_per_page']){
		$posts_per_page=$options['post_per_page'];
	}
	$args = [
		'post_type'=>'room',
		'posts_per_page'=> esc_attr($posts_per_page),
		'tax_query' =>array('relation'=>'AND'),
	];

	if(!empty($_POST['submit'])){
		if(isset($_POST['location_opt'])&&$_POST['location_opt']!=''){
			array_push($args['tax_query'],array(
					'taxonomy' => 'location',
					'terms' => $_POST['location_opt'],
					));
}
			$rooms_listing = new WP_Query($args);

	if($rooms_listing->have_posts()){
		while($rooms_listing->have_posts()){
			$rooms_listing->the_post();?>
	
		<article id="post-<?php the_ID();?>" <?php post_class();?>>
			<?php echo '<div class="image">'.get_the_post_thumbnail(get_the_ID(),'small').'</div>';?>
			<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<div class="description">
				<?php the_content();?>
			</div>
			<?php
				$locations=get_the_terms(get_the_ID(),'location');
				foreach($locations as $location){
					echo 'Category: '.$location->name;
				}
			?>
				
		</article>
		<?php 
		}
	}else {echo esc_html__("No posts",'alebooking');}
	
	}
else {

	$rooms_listing = new WP_Query($args);

	if($rooms_listing->have_posts()){
		while($rooms_listing->have_posts()){
			$rooms_listing->the_post();?>
	
		<article id="post-<?php the_ID();?>" <?php post_class();?>>
			<?php echo '<div class="image">'.get_the_post_thumbnail(get_the_ID(),'small').'</div>';?>
			<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<div class="description">
				<?php the_content();?>
			</div>
			<?php
				$locations=get_the_terms(get_the_ID(),'location');
				foreach($locations as $location){
					echo 'Category: '.$location->name;
				}
			?>
				
		</article>
	<?php }
	
}
	else {echo esc_html__("No posts",'alebooking');}}
	?>
	</div>
</div>
<?php
get_footer();