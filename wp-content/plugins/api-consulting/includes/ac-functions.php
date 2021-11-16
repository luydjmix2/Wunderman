<?php

add_action('init', 'wpapic_init_internal');
function wpapic_init_internal()
{
    add_rewrite_rule('api.php$', 'index.php?wpapic_api=1', 'top');
}

add_filter('query_vars', 'wpapic_query_vars');
function wpapic_query_vars($query_vars)
{
    $query_vars[] = 'wpapic_api';
    return $query_vars;
}

add_action('parse_request', 'wpapic_parse_request');
function wpapic_parse_request(&$wp)
{
    if (array_key_exists('wpapic_api', $wp->query_vars)) {
        include 'api.php';
        exit();
    }
    return;
}

