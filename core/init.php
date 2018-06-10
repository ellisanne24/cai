<?php
session_start();

spl_autoload_register(function($class_name){
    $dirs = array(
        'controller/', // controller folder
        'dao/', // dao interfaces
        'daoimpl/',   // dao implementation
        'model/',
        '../controller/',
        '../dao/',
        '../daoimpl/',
        '../model/'
    );

    foreach( $dirs as $dir ) {
        if (file_exists($dir.strtolower($class_name).'.php')) {
            require_once($dir.strtolower($class_name).'.php');
            return;
        }
    }
});

