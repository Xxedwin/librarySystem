<?php

// * PROYECTO: Bibliotécnica Escuela de Educación Técnica N°3
/// En caso de que el parametro action este definido evitamos que se muestre
/// El layout por defecto y ejecutamos el action sin mostrar nada de vista
// print_r($_GET);
if(!isset($_GET["action"])){
//	Bootload::load("default");
	Module::loadLayout("index");
}else{
	Action::load($_GET["action"]);
}

?>