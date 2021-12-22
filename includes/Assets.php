<?php

namespace WPS\Includes;

class Assets
{
    protected function __construct() {}

    public static function init(){
        static::setup_hooks();
    }

    protected static function setup_hooks() {
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'register_styles' ] );
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'register_scripts' ] );
        add_action( 'admin_enqueue_scripts', [__CLASS__,'register_admin_styles'] );
        add_action( 'admin_enqueue_scripts', [__CLASS__,'register_admin_scripts'] );
    }

    public static function register_styles()
    {
        wp_register_style('wps', WPS_PLUGIN_URL . '/dist/css/style.css',  false,WPS_PLUGIN_VERSION . date("h:i:s"));
        wp_enqueue_style('wps');
    }

    public static function register_scripts()
    {
        wp_enqueue_script('wps', WPS_PLUGIN_URL . '/dist/js/main.js', array('jquery'), WPS_PLUGIN_VERSION,  true);
    }

    public static function register_admin_styles()
    {
        wp_register_style('wps-admin', WPS_PLUGIN_URL . '/dist/css/admin.css',  false,WPS_PLUGIN_VERSION . date("h:i:s"));
        wp_enqueue_style('wps-admin');
    }

    public static function register_admin_scripts()
    {
        wp_enqueue_script('wps-admin', WPS_PLUGIN_URL . '/dist/js/main.js', array('jquery'), WPS_PLUGIN_VERSION,  true);
    }

}