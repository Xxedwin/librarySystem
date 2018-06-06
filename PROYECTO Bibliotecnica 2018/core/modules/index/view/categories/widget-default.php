<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcategory" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Tema</a>
</div>
		<h1>Temas</h1>
<br>
		<?php

		$users = CategoryData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<tbody>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td style="width:130px;"><a href="index.php?view=editcategory&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?action=delcategory&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}
			?>
			</tbody>
			</table>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Temas</p>";
		}


		?>


	</div>
</div>

<script type="text/javascript">
	$('#example').DataTable({
	  "language": {	    
	    "url": "res/Spanish.json"
	  }
	});
</script>

