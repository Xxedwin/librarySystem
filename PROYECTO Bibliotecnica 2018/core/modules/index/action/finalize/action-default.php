<?php

if($_SESSION["user_id"]!=""){
$operation = OperationData::getById($_GET["id"]);
$item = ItemData::getById($operation->item_id);
$item->avaiable();
if ($operation->finish_at<date("Y-m-d")) {
	$operation->finalizeDefeated();	
}else{	
	$operation->finalize();		
}
Core::redir("./?view=rents");

}

?>

