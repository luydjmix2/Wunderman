<?php
header('Content-Type: application/json; charset=utf-8');
$var = $_GET['wpapic_api'];
$username = $_GET['user'];
$password = $_GET['pass'];
$headers = apache_request_headers();
if ($headers['token'] == '123456789asdasdasd$5') {
    $user = wp_authenticate($username, $password);
    if (!is_wp_error($user)) {
        // print_r($user->ID);
        switch ($var) {
            case '1':
                global $wpdb;
                $table_name1 = $wpdb->prefix . 'preferencias';
                $items = $wpdb->get_results("SELECT `mail`, `preferencia` FROM `$table_name1` WHERE `mail` = '" . $user->user_email . "'");
                print_r(json_encode(array('message' => __('Ok.'), 'data' => $items, array('status' => 200))));
                break;

            case '2':
                global $wpdb;
                $table_name2 = $wpdb->prefix . 'estado_alertas';
                $items = $wpdb->get_results("SELECT `id_user`, `estado` FROM `$table_name2` WHERE `id_user` = " . $user->ID);
                print_r(json_encode(array('message' => __('Ok.'), 'data' => $items, array('status' => 200))));
                break;
            case '3':
                global $wpdb;
                $table_name2 = $wpdb->prefix . 'estado_alertas';
                $state = $headers['estado'];
                $wpdb->get_results("UPDATE `$table_name2` SET `estado` = '$state' WHERE `$table_name2`.`id` =" . $user->ID);
                $items = $wpdb->get_results("SELECT `id_user`, `estado` FROM `$table_name2` WHERE `id_user` = " . $user->ID);
                print_r(json_encode(array('message' => __('Ok.'), 'data' => $items, array('status' => 200))));
                break;

            default:
        }
    } else {
        print_r(json_encode(array('message' => __('Invalid logincredentials.'), array('status' => 401))));
    }
    // print_r($var);
    // print_r(json_encode($items));
    // print_r(json_encode(array('name' => 'carlos')));

} else {
    print_r(json_encode(array('message' => __('Invalid credentials.'), array('status' => 403))));
}
