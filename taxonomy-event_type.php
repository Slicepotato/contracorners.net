<?php get_header();

	$tax = get_query_var( 'taxonomy' );
	$term = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term, $tax );

	$lang = isset($_GET['lang']) ? sanitize_text_field( $_GET['lang'] ): 'L1';

	$tax_name = EVO()->frontend->get_localized_event_tax_names_by_slug($tax, $lang);
	$term_name = evo_lang_get('evolang_'. $tax .'_'. $term->term_id, $term->name, $lang);

	do_action('eventon_before_main_content');
?>

<div class='wrap evotax_term_card evotax_term_card alignwide'>
	
	<div id='' class="content-area">

		<div class='eventon site-main'>
		
			<div class='entry-content'>
				<div class='<?php echo apply_filters('evotax_template_content_class', 'eventon site-main');?>'>
                    <h1 class="h1">Ready to Dance the Weekend Away?</h1>
				
					<div class="evotax_term_details endborder_curves" >					
						<div class='tax_term_description'><?php echo category_description();?></div>
					</div>

                    <hr />

					<?php 
						$eventtop_style = 5;
						
						$shortcode = apply_filters('evo_tax_archieve_page_shortcode', 
							'[add_eventon_list number_of_months="12" '.$tax.'='.$term->term_id.' hide_mult_occur="no" hide_empty_months="yes" lang="'.$lang.'" eventtop_style="'. $eventtop_style.'" event_past_future="future"]', 
							$tax,
							$term->term_id
						);
						echo do_shortcode($shortcode);
					?>
				</div>
			</div>
		</div>
	</div>	
</div>

<?php	do_action('eventon_after_main_content'); ?>
<?php get_footer(); ?>