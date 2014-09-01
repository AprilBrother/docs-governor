<?php
include('./lib/governor.php');
$config=include('./config.php');
$instance=new governor($config);
$instance->login();
echo $instance->message;