<?php

class Bw_assets {

    static $assets;

    static function init() {

        if( is_admin() ) {
            add_action( 'admin_enqueue_scripts', array( 'Bw_assets', 'register_assets' ) );
        }else {
            add_action( 'wp_enqueue_scripts', array( 'Bw_assets', 'register_assets' ) );
        }
    }

    static function addAsset( $type, $name, $src, $deps, $ver, $in_footer_or_media ) {

        self::$assets[] = array(
            'type' => $type,
            'name' => $name,
            'src' => $src,
            'deps' => $deps,
            'in_footer_or_media' => $in_footer_or_media,
            'ver' => $ver
        );
    }

    static function addStyle( $name, $src = '', $deps = array(), $ver = BW_VERSION, $media = 'all' ) {
        self::addAsset( 'style', $name, $src, $deps, $ver, $media );
    }

    static function addScript( $name, $src = '', $deps = array(), $ver = BW_VERSION, $in_footer = true ) {
        self::addAsset( 'script', $name, $src, $deps, $ver, $in_footer );
    }
    
    static function register_assets() {

        if( is_array( self::$assets ) ) {

            foreach( self::$assets as $asset ) {

                if( !empty( $asset['src'] ) ) {

                    $parse_url = parse_url( $asset['src'] );
                    
                    $path = ( ( is_child_theme() and $asset['name'] == 'style' ) ) ? get_stylesheet_directory_uri() : get_template_directory_uri();

                    $src = ( isset( $parse_url['host'] ) ) ? $asset['src'] : $path . '/' . $asset['src'];

                    $fun = "wp_enqueue_{$asset['type']}";

                    $fun( $asset['name'], $src, $asset['deps'], $asset['ver'], $asset['in_footer_or_media'] );
                }
            }
        }
    }

}
