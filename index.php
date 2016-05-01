<?php 
	//include config
	require_once('config.php');
	require_once('classes/bootstrap.php');

	$bootstrap = new Bootstrap($_GET);
	$controller = $bootstrap->createController();
 ?>