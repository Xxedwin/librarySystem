<?php

if($_SESSION["user_id"]!=""){
$operation = OperationData::getById($_GET["id"]);
$item = ItemData::getById($operation->item_id);
$item->avaiable();
if ($operation->finish_at<date("Y-m-d")) {
	$operation->finalizeDefeated();
	/*$operation->finalizeConsult();	*/
}else{	
	$operation->finalize();	
	/*$operation->finalizeConsult();	*/	
}
Core::redir("./?view=rents");

}

?>

