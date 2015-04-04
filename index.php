<?php
	# Config file for the project
	require_once 'config.php';

	# CUSTOM AUTOLOADER
	require_once 'utils/AutoLoader.php';

	# SLIM AUTOLOADER
	require_once 'vendor/autoload.php';

	\Utils\AutoLoader::register();

	$app = new \Slim\Slim();
	$app->contentType('text/html; charset=utf-8');

	$app->get("/", function () use ($app) {
		if(file_exists("app/controllers/index.Controller.php")){
			require_once "app/controllers/index.Controller.php";
		} else {
			$app->pass();
		}
	});

	$app->get("/:page", function ($page) use ($app) {
		if(file_exists("app/controllers/$page.Controller.php")){
			require_once "app/controllers/$page.Controller.php";
		} else {
			$app->pass();
		}

	});

	$app->get("/:page/:params+", function($page, $params){
		if(file_exists("app/controllers/$page.Controller.php")){
			require_once "app/controllers/$page.Controller.php";
		} else {
			$app->pass();
		}
	});

	$app->post("/:page/:method", function ($page, $method){
		if(file_exists("app/controllers/$page.Controller.php")){
			require_once "app/controllers/$page.Controller.php";
		} else {
			$app->pass();
		}
	});

	$app->post("/:page/:method/:param+", function ($page, $method, $param){
		if(file_exists("app/controllers/$page.Controller.php")){
			require_once "app/controllers/$page.Controller.php";
		} else {
			$app->pass();
		}
	});

	$app->run();
?>