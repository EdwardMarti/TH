<?php

$b_name = get_browser_name($_SERVER['HTTP_USER_AGENT']);

function get_browser_name($user_agent) {
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/'))
        return 'Opera';
    elseif (strpos($user_agent, 'Edge'))
        return 'Edge';
    elseif (strpos($user_agent, 'Chrome'))
        return 'Chrome';
    elseif (strpos($user_agent, 'Safari'))
        return 'Safari';
    elseif (strpos($user_agent, 'Firefox'))
        return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7.0; rv:11.0'))
        return 'Internet Explorer';
    return 'Other';
}

function get_style($b_name) {
    switch ($b_name) {
        case 'Internet Explorer':
            //echo "You browser is <b>$b_name</b> .";
            return 'extra/comboeditableautocomplete/css/selecteditableie.css';
            break;
        case 'Edge':
            //echo "You browser is <b>$b_name</b> .";
            return 'extra/comboeditableautocomplete/css/selecteditableed.css';
            break;
        case 'Chrome':
            //echo "You browser is <b>$b_name</b> .";
            return 'extra/comboeditableautocomplete/css/selecteditablech.css';
            break;
        case 'Firefox':
            //echo "You browser is <b>$b_name</b> .";
            return 'extra/comboeditableautocomplete/css/selecteditablefi.css';
            break;
        case 'Opera':
            //echo "You browser is <b>$b_name</b> .";
            return 'extra/comboeditableautocomplete/css/selecteditableop.css';
            break;
        default;
            //echo "You browser is <b>$b_name</b> .";
            return 'extra/comboeditableautocomplete/css/selecteditable.css';
            break;
    }
}

?>