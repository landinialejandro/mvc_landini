<?php
// Load configs
require_once 'config/config.php';

// Auto Load libraries

spl_autoload_register( function($className){
    require_once "libraries/{$className}.php";
});

