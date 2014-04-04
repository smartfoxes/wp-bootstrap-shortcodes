<?php

add_shortcode( 'row' , "wp_bootstrap_shortcodes_row");
add_shortcode( 'well' , "wp_bootstrap_shortcodes_well");
add_shortcode( 'button' , "wp_bootstrap_shortcodes_button");
add_shortcode( 'glyphicon' , "wp_bootstrap_shortcodes_glyph");
add_shortcode( 'hr' , "wp_bootstrap_shortcodes_hr");
add_shortcode( 'quote' , "wp_bootstrap_shortcodes_quote");

add_shortcode( 'accordion' , "wp_bootstrap_shortcodes_accordion");
add_shortcode( 'accordion-item' , "wp_bootstrap_shortcodes_accordion_item");

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
    add_shortcode( 'col'.$i , array("WP_Bootstrap_Shortcodes_Col", "md_".$i));
}

function wp_bootstrap_shortcodes_hr($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;

    return do_shortcode("
    <hr class=\"{$class}\"\>{$content}");
}
 
function wp_bootstrap_shortcodes_quote($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;
    $author = isset($atts['author']) ? $atts['author'] : null;
    
    return do_shortcode("
    <blockquote class=\"quote {$class}\">
        {$content}
        ".($author ? '<small class="quote-author">'.$author.'</small>' : '')."
    </blockquote>
    ");
}

function wp_bootstrap_shortcodes_accordion_id($inc = 0) {
    static $i = 0;
    
    if($inc) { $i++; }
    return $i;
}

function wp_bootstrap_shortcodes_accordion($atts, $content="") {
    $class = isset($atts['class']) ? $atts['class'] : null;
    return do_shortcode('
    <div class="panel-group '.$class.'" id="accordion-'.wp_bootstrap_shortcodes_accordion_id(1).'">
        '.$content.'
    </div>
    ');
}
function wp_bootstrap_shortcodes_accordion_item($atts, $content="") {
    static $i = 0;
    
    $class = isset($atts['class']) ? $atts['class'] : "panel-default";
    $active = isset($atts['active']) ? $atts['active'] : false;
    $title = isset($atts['title']) ? $atts['title'] : "";
    
    $i++;
    $content = '
    <div class="panel '.$class.'"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-'.wp_bootstrap_shortcodes_accordion_id().'" href="#accordion-item-'.$i.'">' 
        . $title
        . '</a></h4></div><div id="accordion-item-'.$i.'" class="panel-collapse collapse '.($active ? "in":"").'"><div class="panel-body">'
        . $content
        . '</div></div></div>';
  return do_shortcode($content);
}