<?php

class WP_Bootstrap_Shortcodes_Col {
    
    public function __call($name, $args) {    
    //    return do_shortcode("Call to {$name} with args: <pre>" . print_r($args, true) . "</pre>");        
    }
    public  static function __callStatic ($name, $attribs) {
        list($args,$content) = $attribs;
        list($screen,$size) = explode("_",$name);
        return do_shortcode(self::col($size,$screen,$args, $content));
    }
    
    
    public static function col($size=4, $screen="sm", $args, $content) {
        $class = isset($args['class']) ? $args['class'] : null;
        foreach($args as $att) {
            if(preg_match("/^offset(\d+)$/i",$att,$m)) {
                $class .= " col-{$screen}-offset-" . $m[1];
            }
        }
        return "
        <div class=\"col-{$screen}-{$size} {$class}\">
            {$content}
        </div>
        ";
    }
}