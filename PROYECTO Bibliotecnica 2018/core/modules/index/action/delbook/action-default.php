<?php
$user = BookData::getById($_GET["id"]);

if ($user->image!='') {
	$folder= "uploads/";
	$nameImage=$user->image;
	unlink($folder.$nameImage);
}

$user->del();
print "<script>window.location='index.php?view=books';</script>";

?>

