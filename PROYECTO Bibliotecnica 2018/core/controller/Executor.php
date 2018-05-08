<?php

//Funcion que realiza ejecuciones repetitivas

class Executor {

	public static function doit($sql){
		$con = Database::getCon();
		return array($con->query($sql),$con->insert_id);
	}
}
?>