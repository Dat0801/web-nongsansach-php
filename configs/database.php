<?php 
$config['database'] = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'ql_nongsan'
];
$config['api'] = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'api'
];
var_dump($config);
print_r($config['api']['db']);