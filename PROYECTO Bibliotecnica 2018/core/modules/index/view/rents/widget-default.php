<div class="row">
	<div class="col-md-12">
		<h1><i class='fa fa-th-large'></i> Prestamos de Instituciones</h1>
<br>
<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="rents">
  <div class="form-group">
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">Desde</span>
		  <input type="date" name="start_at" required value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">Hasta</span>
		  <input type="date" name="finish_at" required value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-lg-6">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>

  </div>
</form>
<?php
$products = array();
if(isset($_GET["start_at"]) && $_GET["start_at"]!="" && isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){
if($_GET["start_at"]<$_GET["finish_at"]){
$products = OperationData::getRentsByRange($_GET["start_at"],$_GET["finish_at"]);
}
}else{
$products = OperationData::getRents();

}
if(count($products)>0){
?>
<br>
<table class="table table-bordered table-hover	">
	<thead>
		<th>Ejemplar</th>
		<th>Libro</th>
		<th>Cliente</th>
		<th>Inicio</th>
		<th>Fin</th>
		<th></th>
		<th></th>
		<th>Estado</th>
	</thead>
	<?php foreach($products as $sell):
$item = $sell->getItem();
$book = $item->getBook();
$client = $sell->getClient();
	?>
	<tr>
		<td style="width:30px;">
		<?php echo $item->code; ?>
		</td>
		<td>
		<?php echo $book->title; ?>
		</td>
		<td>
		<?php echo $client->name." ".$client->lastname; ?>
		</td>
		<td><?php echo $sell->start_at; ?></td>
		<td><?php echo $sell->finish_at; ?></td>
		<td style="width:60px;">
		<?php if($sell->returned_at==""):?>
		<a href="index.php?action=finalize&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-success">Finalizar</a>
	<?php endif;?>
		</td>
		<td style="width:30px;"><a href="index.php?action=deloperation&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>

		<?php if ($sell->finish_at<date("Y-m-d") ): ?>		    
			<td style="width:30px;"><a disabled class="btn btn-xs btn-danger">Vencido</a></td>		    
			<?php 
				$operation = OperationData::getById($sell->id);			
				$operation->defeated();	
			 ?>			
		<?php else: ?>		    
		    <td style="width:30px;"><a disabled class="btn btn-xs btn-success">Vigente</a></td>
		<?php endif;?>


	</tr>
<?php endforeach; ?>
</table>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<p class="alert alert-danger">No hay prestamos hasta la fecha</p>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>