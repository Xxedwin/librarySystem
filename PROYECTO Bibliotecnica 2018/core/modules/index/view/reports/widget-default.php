<?php 
	$statusOperations = statusOperationData::getAll();
 ?>
<div class="row">
	<div class="col-md-12">
<h1>Estadísticas</h1>
<br>
<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="reports">
  <div class="form-group">
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">Desde</span>
		  <input required type="date" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; }else{ echo $date = date("Y-m-d");} ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">Hasta</span>
		  <input required type="date" name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; }else{
		  	$newDate = strtotime ( '+1 month' , strtotime ( $date ) ) ;
		  	$newDate = date ( 'Y-m-d' , $newDate );		  	 
		  	echo $newDate;
		  } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-md-3">			    
        <div class="col-lg-15">
    		<select required name="status_id" id="status_id" class="form-control">
    		<option value="">Seleccione el estado</option>
    		  <?php foreach($statusOperations as $o):?>
    		    <option value="<?php echo $o->id; ?>"><?php echo $o->name; ?></option>
    		  <?php endforeach; ?>
    		</select>
        </div>
	</div>

    <div class="col-lg-3">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>

  </div>
</form>

<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""): ?>
    <div id="container"></div>
<?php endif ?>

<?php
if(isset($_GET["start_at"]) && $_GET["start_at"]!="" && isset($_GET["finish_at"]) && $_GET["finish_at"]!="" && isset($_GET["status_id"]) && $_GET["status_id"]!=""){
	$users = OperationData::getByRange($_GET["start_at"],$_GET["finish_at"],$_GET["status_id"]);
    $registers = OperationData::countRegister($_GET["start_at"],$_GET["finish_at"],$_GET["status_id"]);
    
		if(count($users)>0){
			// si hay usuarios
			$_SESSION["report_data"] = $users;
			?>
			<div class="panel panel-default">
			<div class="panel-heading">
			Estadísticas de Libros</div>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Ejemplar</th>
			<th>Titulo</th>
			<th>Cliente</th>
			<th>Fecha de Entrega</th>		
			</thead>
			<?php
			$total = 0;
			foreach($users as $user){
				$item  = $user->getItem();
				$client  = $user->getClient();
				$book = $item->getBook();
				?>
				<tr>
				<td><?php echo $item->code; ?></td>
				<td><?php echo $book->title; ?></td>
				<td><?php echo $client->name." ".$client->lastname; ?></td>
				<td><?php echo $user->returned_at; ?></td>					
				</tr>
				<?php

			}
			echo "</table>";
			?>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay datos</p>";
		}
		}else{
			echo "<p class='alert alert-danger'>Establece un rango de fechas</p>";
		}

		?>

	</div>
</div>

<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Reporte Estadístico'
            },
            xAxis: {
                title: {
                    text: 'Días activos del mes'
                },
                categories: [

                <?php 
                foreach($registers as $register){
                    $day=$register->start_at;
                    $d=date_create($day);                    
                    echo date_format($d, 'd');  
                    echo ',';
                }   
                 ?>                

                    ]
            },
            yAxis: {
                title: {
                    <?php 
                    if ($_GET["status_id"]==3) {
                        ?>
                        text: 'Libros devueltos'
                        <?php 

                    }else{
                        ?>
                        text: 'Libros prestados'
                        <?php 
                    }
                     ?>
                    
                },
                min: 0
            },
            tooltip: {
                <?php 
                if ($_GET["status_id"]==3) {
                    ?>
                    formatter: function() {
                      return 'Libros devueltos: <b>'+ this.y +'</b><br>Dia: <b>'+ this.x +'</b>';
                    }<?php 

                }else{
                    ?>
                    formatter: function() {
                      return 'Libros prestados: <b>'+ this.y +'</b><br>Dia: <b>'+ this.x +'</b>';
                    }<?php 
                }
                 ?>
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                showInLegend: false,

                <?php 
                if ($_GET["status_id"]==3) {
                    ?>
                    name: 'Libros devueltos',
                    <?php 

                }else{
                    ?>
                    name: 'Libros prestados',
                    <?php 
                }
                 ?>
                
                marker: {
                    symbol: 'diamond'
                },
                data: [ 

                <?php 
                foreach($registers as $register){
                    echo $register->quantity;
                    echo ',';
                }                                    
                 ?>

                ]

            }]
        });
    });
</script>
