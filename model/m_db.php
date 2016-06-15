<?php
	function db_setup() {
        //$bbdd = new PDO('mysql:host=localhost;dbname=grupo_56', 'root', 'iaratute14');
		$bbdd = new PDO('mysql:host=localhost;dbname=grupo_56', 'grupo_56', 'OOPyLdgXX7bzLZSL');
		$bbdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $bbdd;
	}
?>