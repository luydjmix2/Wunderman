<?php

/**
 * Plugin Name: Api Consulting
 * Description: Consulta de preferencia y activacion y desactivacion de alertas.
 * Author: Luis Suarez
 * Author URI: http://demo.org
 * Version: 1.0
 * Plugin URI: https://github.com/
 * License: GPL2+
 */

ob_start();
echo "test";
ob_clean();

defined('ABSPATH') or die('No no no');

require_once plugin_dir_path(__FILE__) . 'includes/ac-functions.php';

/**
 * Activate the plugin.
 */
function ac_activate()
{
    global $wpdb;
    // Definimos el nombre de la tabla con el prefijo usado en la instalación:
    $table_name1 = $wpdb->prefix . 'preferencias';
    $table_name2 = $wpdb->prefix . 'estado_alertas';
    // $charset_collate = $wpdb->get_charset_collate();
    // Diseñamos la consulta SQL para la nueva tabla:
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name1'") != $table_name1) {
        $sql = "CREATE TABLE $table_name1 (
               id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
               id_user int(9) NOT NULL,
               mail varchar(255) NOT NULL,
               preferencia varchar(255) NOT NULL,
               reg_date TIMESTAMP
               );";

        dbDelta($sql);

        $sql2 = "INSERT INTO `$table_name1` (`id`, `id_user`, `mail`, `preferencia`, `reg_date`) VALUES (
            NULL,
            '1',
            'luydjmix@gmail.com',
            'Ropa',
            current_timestamp());";

        dbDelta($sql2);
    }

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name2'") != $table_name2) {
        $sql = "CREATE TABLE $table_name2 (
               id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
               id_user int(9) NOT NULL,
               estado int(9) NOT NULL,
               reg_date TIMESTAMP
               );";
        dbDelta($sql);

        $sql2 = "INSERT INTO `wm_estado_alertas` (`id`, `id_user`, `estado`, `reg_date`) VALUES (
            NULL,
            '1',
            '1',
            current_timestamp());";

        dbDelta($sql2);
    }
}
register_activation_hook(__FILE__, 'ac_activate');


/**
 * Deactivation hook.
 */
function ac_deactivate()
{

    global $wpdb;
    $tableArray = [
        $wpdb->prefix . 'preferencias',
        $wpdb->prefix . 'estado_alertas',
    ];

    foreach ($tableArray as $tablename) {
        $wpdb->query("DROP TABLE IF EXISTS $tablename");
    }
}
register_deactivation_hook(__FILE__, 'ac_deactivate');
