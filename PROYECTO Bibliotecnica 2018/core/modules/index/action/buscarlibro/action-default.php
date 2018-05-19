
<?php if(isset($_GET["product"]) && $_GET["product"]!="" or isset($_GET["category_id"]) && $_GET["category_id"]!=""
	or isset($_GET["all"]) && $_GET["all"]!=""
 ):?>
	<?php
	if ($_GET["product"]!="") {
		$myVar=$_GET["product"];
		$myText = (string)$myVar;
		$products = BookData::getLike($myVar);		

	}elseif($_GET["category_id"]!=""){
		$conver=$_GET["category_id"];
		$int=(int)$conver;
		$products = BookData::getLike($int);		
	}else{
		$all=$_GET["all"];
		$all="allTheBooks";		
		$products = BookData::getLike($all);		
		
	}	
$books = BookData::getAll();
if(count($products)>0){
	?>

<div class="" style="width: 100%;">
	<h3 style="    text-align: left;
    width: 25%;" >Resultados de la Busqueda</h3>		
</div>
<table class="table table-bordered table-hover">
	<thead>
		<th>ISBN</th>
		<th>Titulo</th>
		<th>Institución</th>
		<th>Autor</th>
		<!-- <th>Ejemplares</th> -->
		<th>Disponibles</th>
		<th>Detalle</th>
	</thead>
	<?php
$products_in_cero=0;
	 foreach($products as $product):
	?>
		
	<tr>
		<td style="width:80px;"><?php echo $product->isbn; ?></td>
		<td><?php echo $product->title; ?></td>
		<td><?php echo $product->institucion; ?></td>
		<td><?php echo $product->name; ?> <?php echo $product->lastname; ?></td>
		<!-- <td><?php echo ItemData::countByBookId($product->id)->c; ?></td> -->
		<td><?php echo ItemData::countAvaiableByBookId($product->id)->c; ?></td>
		<td><button type="button" class="btn btn-link btn-detalle" value="1" data-toggle="modal" data-target="#myModal">Ver</button></td>
	</tr>
	
	<?php endforeach;?>
</table>
	
	<div class="modal  fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">DESCRIPCION DEL LIBRO</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- <div class="col-sm-4">
                            <img src="" alt="" class="imagen img-responsive">
                        </div> -->
                        <div class="col-sm-8">
                        	<table class="table table-bordered table-hover">
	                        	<thead>
	                        	<th>ISBN</th>
	                        	<th>Titulo</th>
	                        	<th>Subtitulo</th>
	                        	<th>Institucion</th>
	                        	<th>Ejemplares</th>
	                        	<th>Disponibles</th>
	                        	<th>Tema</th>	                        	
	                        	</thead>
	                        	<?php	                        		                        		
		                        	foreach($books as $user){
		                        		$category  = $user->getCategory();
		                        		?>		                        		
		                        		<tr>
		                        		<td><?php echo $user->isbn; ?></td>
		                        		<td><?php echo $user->title; ?></td>
		                        		<td><?php echo $user->subtitle; ?></td>
		                        		<td><?php echo $user->institucion; ?></td>
		                        		<td><?php echo ItemData::countByBookId($user->id)->c; ?></td>
		                        		<td><?php echo ItemData::countAvaiableByBookId($user->id)->c; ?></td>
		                        		<td><?php if($category!=null){ echo $category->name; }  ?></td>
		                        		</tr> 
		                        		<?php
		                        	}
	                        	?>
                        	</table>	                       	                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
      <!-- /.modal-dialog -->
    </div>

	<?php
}else{
	echo "<br><p class='alert alert-danger'>No se encontró el libro que estás buscando</p>";
}
?>
<hr><br>
<?php else:		
	//echo "vacio";
?>
<?php endif; ?>