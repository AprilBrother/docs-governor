<?php
include('./lib/governor.php');
$config=include('./config.php');
$instance=new governor($config);
$instance->login();
$ibeacons=$instance->getlist(5);

$data=array(
	array(
		"mac"=>"20CD39862FA2",
		"uuid"=>"e2c56db5-dffb-48d2-b060-d0f5a71096e0",
		"major"=>"6",
		"minor"=>"1",
		"rssi"=>"2",
		'measuredpower'=>"-58",
		'status'=>"1",
		'batterylevel'=>"10"
		));
var_dump($instance->update("38:0B:40:CC:62:0E",$data));

echo $instance->message;
