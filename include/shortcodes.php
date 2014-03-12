<?php

add_shortcode( 'row' , "wp_bootstrap_shortcodes_row");
add_shortcode( 'well' , "wp_bootstrap_shortcodes_well");
add_shortcode( 'button' , "wp_bootstrap_shortcodes_button");
add_shortcode( 'glyphicon' , "wp_bootstrap_shortcodes_glyph");
add_shortcode( 'hr' , "wp_bootstrap_shortcodes_hr");

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
    $background = isset($atts['background']) ? $atts['background'] : null;
    
    return do_shortcode("
    <div class=\"well {$class}\"".($background ? ' style="background:url('.$background.')"':"").">
        {$content}
    </div>
    ");
}

function wp_bootstrap_shortcodes_button($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;
    
    if(preg_match("/<a(.*?)>(.*?)<\/a>/is",$content,$m)) {
        // link found
        $params = $m[1];
        $content = $m[2];        
    } 
    return "<a class=\"btn btn-default $class\" {$params}>{$content}</a>";
}


function wp_bootstrap_shortcodes_glyph($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;
    if(!$class) {
        return $content;
    }
    return "<span class=\"glyphicon {$class}\"></span>{$content}";
}

for($i=1;$i<=12;$i++) {
    add_shortcode( 'col_xs_'.$i , array("WP_Bootstrap_Shortcodes_Col", "xs_".$i));
    add_shortcode( 'col_sm_'.$i , array("WP_Bootstrap_Shortcodes_Col", "sm_".$i));
    add_shortcode( 'col_lg_'.$i , array("WP_Bootstrap_Shortcodes_Col", "lg_".$i));
    add_shortcode( 'col_md_'.$i , array("WP_Bootstrap_Shortcodes_Col", "md_".$i));
    add_shortcode( 'col'.$i , array("WP_Bootstrap_Shortcodes_Col", "sm_".$i));
}

//add_shortcode( 'baztag', array( 'MyPlugin', 'baztag_func' ) );

function wp_bootstrap_shortcodes_hr($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;

    return do_shortcode("
    <hr class=\"{$class}\"\>{$content}");
}
 
