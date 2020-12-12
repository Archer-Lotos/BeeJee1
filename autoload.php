<?php

function autoload($class_name){

    $class_path = str_replace("\\", "/", $class_name);

	$array_path = array(
		'/app/'
	);

	foreach($array_path as $path){
        $path = ROOT . $path . $class_path . '.php';
		if (is_file($path)) {
			include_once $path;
		}
	}
}
