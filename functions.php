<?php

if ( ! function_exists( 'lba_freemius' ) ) {
    function lba_freemius() {
        global $lba_freemius;

        if ( ! isset( $lba_freemius ) ) {
            require_once dirname(__FILE__) . '/freemius/start.php';

            $lba_freemius = fs_dynamic_init( array(
                'id'                  => '15284',
                'slug'                => 'lbaddons-pro',
                'type'                => 'plugin',
                'public_key'          => 'pk_7e1c8a000a4b21ea6b163f7a443b4',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'first-path'     => 'plugins.php',
                    'account'        => false,
                ),
            ) );
        }

        return $lba_freemius;
    }

    lba_freemius();
    do_action( 'lba_freemius_loaded' );
}