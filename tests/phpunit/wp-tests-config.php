<?php

// change the next line to points to your wordpress dir
define( 'ABSPATH',  '/home/runner/work/woocommerce-testcases/woocommerce-testcases/.wp-install/web/');

define( 'PLUGIN_DIR',  realpath(dirname(__FILE__) . '/../../'));

define( 'WP_DEBUG', false );

// WARNING WARNING WARNING!
// tests DROPS ALL TABLES in the database. DO NOT use a production database

