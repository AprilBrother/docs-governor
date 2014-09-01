<?php
include('./lib/governor.php');
$config=include('./config.php');
$instance=new governor($config);
$instance->login();
var_dump($instance->getlist(5));




