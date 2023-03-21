<?php
    $args = array(
        'post_type' => 'states',
        'posts_per_page' => -1,
        'post_status' => array('publish'),
        'order' => 'ASC',
        'orderby' => 'title',
      );
      
      $all_pages = new WP_Query($args);
?>
<div class="nav-mobile">
    <select id="state_select" class="select-ui select-ui--state">
    <option value="" selected>Select a State</option>
    <?php
        if ($all_pages) {
            while ($all_pages->have_posts()) {
                $all_pages->the_post(); 
                $id = get_the_ID();
                $state_field = get_field_object('state_name', $id);
                $state_short_name = get_field('state_name', $id);
                $state_name = $state_field['choices'][ $state_short_name ];
                $page_url = get_field('page_url', $id); 
    ?>
        <option value="<?php echo $page_url; ?>"><?php echo $state_name; ?></option>
    <?php 
            }
        }
        wp_reset_postdata();
    ?>
    </select>
</div>
<nav class="nav" role="navigation">
    <?php wp_nav_menu(); ?>
</nav>