<?php
require_once('init_config.php');

$db_conn = new mysqli($config['db_host'], $config['db_user'], $config['db_password'],  $config['db_name']) or die('Could not connect to database!');
?>