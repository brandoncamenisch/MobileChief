<?php

function plchf_msb_front_end($atts) {
#if [plchf_msb_front_end] option is enabled
#if Require users to register is enabled
#if Enable front end download is enabled
#if front end URL stripper
#if user meta _mobilechief_user_check
var_dump(plchf_msb_get_site_id());
}
add_shortcode('plchf_msb_front_end', 'plchf_msb_front_end');