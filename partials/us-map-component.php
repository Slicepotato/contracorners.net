<div id="details-box"></div>

<?php
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_status' => array('publish', 'private'),
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => array('states')
          )
        )
      );
      
      $all_pages = new WP_Query($args);
?>

<svg version="1.1"
	xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" 
	xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" 
	xmlns:svg="http://www.w3.org/2000/svg" 
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" 
	xmlns:cc="http://creativecommons.org/ns#" 
	xmlns:dc="http://purl.org/dc/elements/1.1/" 
	inkscape:output_extension="org.inkscape.output.svg.inkscape" 
	sodipodi:docname="United States WIP.svg"
	xmlns="http://www.w3.org/2000/svg" 
	xmlns:xlink="http://www.w3.org/1999/xlink" 
	x="0px" y="0px" viewBox="0 0 959 593"
	style="enable-background:new 0 0 959 593;"
	id="us-map"
	class="map-panel"
	xml:space="preserve">
    <defs>
	    <inkscape:perspective  id="perspective64" inkscape:persp3d-origin="479.5 : 197.66667 : 1" inkscape:vp_x="0 : 296.5 : 1" inkscape:vp_y="0 : 1000 : 0" inkscape:vp_z="959 : 296.5 : 1" sodipodi:type="inkscape:persp3d">
	    </inkscape:perspective>
    </defs>
    <sodipodi:namedview  bordercolor="#666666" borderopacity="1.0" gridtolerance="10.0" guidetolerance="10.0" id="base" inkscape:current-layer="svg2" inkscape:cx="608.50443" inkscape:cy="298.13957" inkscape:guide-bbox="true" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:window-height="814" inkscape:window-width="1152" inkscape:window-x="-8" inkscape:window-y="-8" inkscape:zoom="0.70710678" objecttolerance="10.0" pagecolor="#ffffff" showgrid="false" showguides="true">
	</sodipodi:namedview>
<?php
    if ($all_pages) {
        while ($all_pages->have_posts()) {
            $all_pages->the_post(); 
            $id = get_the_ID();
            $state_field = get_field_object('state_name', $id);
            $state_short_name = get_field('state_name', $id);
            $state_name = $state_field['choices'][ $state_short_name ];
            $shape_coordinates = get_field('shape_coordinates', $id);
            $page_url = get_field('page_url', $id);       
?>
    <a xlink:href="<?php echo $page_url; ?>">
        <path 
            id="<?php echo $state_short_name; ?>" 
            class="st0" 
            data-name="<?php echo $state_name; ?>"
            data-id="<?php echo $state_short_name; ?>"
            d="<?php echo $shape_coordinates; ?>"/>
    </a>
<?php
        }
    }
    
    wp_reset_postdata();
?>
</svg>
