<?php

// Quote Shortcode [quote][/quote] 
function shortcode_quote($params = array(), $content) {

    extract(shortcode_atts(array(
      'type' => ''
    ), $params));
  
    return
      '<blockquote class="quote"' .
      ($type ? " class=\"$type\"" : '') .
      '>' .
      do_shortcode($content) .
      '</blockquote>';
}

add_shortcode('quote', 'shortcode_quote');
  
?>