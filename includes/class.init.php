<?php

class refresh_init {

    public $version;
    public $slug;

    public function __construct($version, $slug) {
        $this->version = $version;
        $this->slug = $slug;
        add_action('plugins_loaded', array($this, 'plugins_loaded'));
        add_action('admin_enqueue_scripts', array($this,'admin_enequeue_scripts'));
        $this->load_modules();
    }

    public function plugins_loaded() {
        load_plugin_textdomain( $this->slug , false, RNGRF_PRT . "/languages" );
    }

    public function public_enequeue_scripts() {
        return;
    }

    public function admin_enequeue_scripts() {
        wp_enqueue_style('rngrf-admin-style', RNGRF_PDU . 'assets/css/admin-style.css');
        wp_enqueue_script('rngrf-admin-script', RNGRF_PDU . 'assets/js/admin-script.js', array('jquery'), '', TRUE);
    }
    
    public function load_modules(){
        require_once 'class.controller.refresh.php';
        require_once 'class.controller.settings.php';
    }

}