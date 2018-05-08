<?php
session_start();
// ---
// PROYECTO: Bibliotécnica
// Este archivo elimina todo rastro de Cookie

// -- Eliminación del usuario
if(isset($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
}

session_destroy();
// v0 29 jul 2013
// En cualquier lugar que estemos, nos redirigirá al Index.php
print "<script>window.location='index.php';</script>";
?>