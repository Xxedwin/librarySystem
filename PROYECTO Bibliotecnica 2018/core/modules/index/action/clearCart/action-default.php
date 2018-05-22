<?php

// ---
// PROYECTO: Bibliotécnica
// Este archivo elimina todo rastro de Cookie

// -- Eliminación del cart
if(isset($_SESSION['cart'])){
	unset($_SESSION['cart']);
}

/*session_destroy();*/
// v0 29 jul 2013
// En cualquier lugar que estemos, nos redirigirá a la vista buscar libro.php
print "<script>window.location='index.php?view=home';</script>";

?>