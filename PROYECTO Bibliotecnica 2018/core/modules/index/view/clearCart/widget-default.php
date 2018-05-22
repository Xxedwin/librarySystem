<?php
$idCart=array($_GET["book_id"],$_GET["item_id"]);
$contentCart=$_SESSION['cart'];

if (count($contentCart)<2) {
	unset($_SESSION['cart']);
}else{
	$i=0;
	$newContent = array();
	while ($i < count($contentCart)) {	
		$array = array_diff($contentCart[$i], $idCart);
		if ($array!=NULL) {
			$newContent[]=$array;				
		}		
		$i=$i+1;
	}
	$_SESSION["cart"] = $newContent;
}

print "<script>window.location='index.php?view=home';</script>";

?>
