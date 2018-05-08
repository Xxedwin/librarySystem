<?php


// Un action corresponde a una rutina de un modulo.

class Action {
	/**
	* La funcion load carga una vista correspondiente a un modulo
	**/	
	public static function load($action){
		// Module::$module;
		
		if(!isset($_GET['action'])){
			include "core/modules/".Module::$module."/action/".$action."/action-default.php";
		}else{


			if(Action::isValid()){
				include "core/modules/".Module::$module."/action/".$_GET['action']."/action-default.php";				
			}else{
				Action::Error("<b>404 NOT FOUND</b> Action <b>".$_GET['action']."</b> folder  !!");
			}



		}
	}

	/**
	* Válida la existencia de una vista
	**/	
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "core/modules/".Module::$module."/action/".$_GET['action']."/action-default.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public function execute($action,$params){
		$fullpath =  "core/modules/".Module::$module."/action/".$action."/action-default.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}else{
			assert("wtf");
		}
	}

}



?>