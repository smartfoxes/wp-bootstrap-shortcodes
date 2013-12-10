<?php

add_shortcode( 'row' , "wp_bootstrap_shortcodes_row");
add_shortcode( 'well' , "wp_bootstrap_shortcodes_well");

function wp_bootstrap_shortcodes_row($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;
    return do_shortcode("
    <div class=\"row {$class}\">
        {$content}
    </div>
    ");
}

function wp_bootstrap_shortcodes_well($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;
    
    return do_shortcode("
    <div class=\"well {$class}\">
        {$content}
    </div>
    ");
}

for($i=1;$i<=12;$i++) {
    add_shortcode( 'col_xs_'.$i , array("WP_Bootstrap_Shortcodes_Col", "xs_".$i));
    add_shortcode( 'col_sm_'.$i , array("WP_Bootstrap_Shortcodes_Col", "sm_".$i));
    add_shortcode( 'col_lg_'.$i , array("WP_Bootstrap_Shortcodes_Col", "lg_".$i));
    add_shortcode( 'col_md_'.$i , array("WP_Bootstrap_Shortcodes_Col", "md_".$i));
    add_shortcode( 'col'.$i , array("WP_Bootstrap_Shortcodes_Col", "md_".$i));
}

//add_shortcode( 'baztag', array( 'MyPlugin', 'baztag_func' ) );
 