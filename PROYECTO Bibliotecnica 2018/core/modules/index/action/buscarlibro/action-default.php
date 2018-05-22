
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

if(count($products)>0){
	?>

<h3>Resultados de la Busqueda</h3>		

<table class="table table-bordered table-hover">
	<thead>
		<th>ISBN</th>
		<th>Titulo</th>
		<th>Institución</th>
		<th>Autor</th>
		<th>Ejemplares</th>
		<th>Disponibles</th>
		<th>Detalle</th>
	</thead>
	<?php
$products_in_cero=0;
	 foreach($products as $product):
	 	$id=$product->id;
	?>
		
	<tr>
		<td><?php echo $product->isbn; ?></td>
		<td><?php echo $product->title; ?></td>
		<td><?php echo $product->institucion; ?></td>
		<td><?php echo $product->name; ?> <?php echo $product->lastname; ?></td>
		<td><?php echo ItemData::countByBookId($product->id)->c; ?></td> 
		<td><?php echo ItemData::countAvaiableByBookId($product->id)->c; ?></td>		
		<td>
		    <a href='#' data-toggle="modal" data-target="#myModal" <?php echo "onClick=\"idBook('./?action=idBook','$id')\"" ?>><i class='fa fa-eye'></i>Ver</a>
		</td>		
	</tr>
	
	<?php endforeach;?>

</table>

	<div class="modal  fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header text-blue">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span></button>
	                    <h4 class="modal-title">Descripcion del libro</h4>
	                </div>
	                <div class="modal-body">
	                    <div class="row">
	                        <div class="col-sm-4">
	                            <!-- <img src="" alt="" class="imagen img-responsive"> -->
	                        </div>
	                        <div class="col-sm-8" id="characteristicsBook">	                              
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

	    <script type="text/javascript">    	
	    	
	    	idBook = function(jRuta,jid_book)
	    	{

	    	     var parametros = {
	    	         "id" : jid_book
	    	     };
	    	     
	    	     $.ajax({
	    	           data:  parametros,
	    	           type: "POST",
	    	           url: jRuta,
	    	            beforeSend: function () {
	    	            },
	    	            success: function(data)
	    	            {
	    	            	$("#characteristicsBook").html(data);
	    	            }
	    	     });

	    	}
	    </script>

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