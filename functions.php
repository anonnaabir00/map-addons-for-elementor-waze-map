<?php

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_map_addons_for_elementor_waze_map() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( 'acf278b3-6de6-46a2-8602-83854beb8728', 'Local Business Addons For Elementor (Formally Waze Map)', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_map_addons_for_elementor_waze_map();