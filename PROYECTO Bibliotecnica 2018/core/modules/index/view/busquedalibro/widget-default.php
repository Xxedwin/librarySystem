<?php
//unset($_SESSION["cart"]);
$categories = CategoryData::getAll();
?>
<style type="text/css">
	  #wrapper {
		padding-left: 25px;
	  }
	  #show_search_results{
	  	top: 30px;
	  }
	  .allSearch{
	  	margin-right: -80px;
	  }
	  .search{
	  	margin-left: -15px;
	  }
	  .titleResult{	  	
	  	width: 25%;
	  }	  
	  @media (max-width: 1250px) {
	    .allSearch{
	    	margin-right: 0px;
	    }
	    .search{
	    	margin-left: 0px;
	    }
	    .titleResult{	  	
	    	width: 80%;
	    }	  
	    .searchGeneral{
	    	margin-left: -15px;
	    }
	    #show_search_results{
	    	top: 10px;
	    }
	  }
</style>
<div class="row">
	<div class="col-md-12">
	<h1>Buscar Libro</h1>
	<p><b>Buscar libro por título o por Código/ISBN:</b></p>
	<div class="searchGeneral">
		<div class="col-md-9">
			<form id="searchp">
			<div class="row allSearch">
				<div class="col-md-6 search">
					<input type="hidden" name="view" value="sell">
					<input type="text" id="product_code" name="product" placeholder="Ver todos los libros" class="form-control">
				</div>

				<div class="col-md-4">			    
				    <div class="col-lg-15">
						<select name="category_id" id="category_id" class="form-control">
						<option value="">SELECCIONE EL TEMA</option>
						  <?php foreach($categories as $p):?>
						    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
						  <?php endforeach; ?>
						</select>
				    </div>
				</div>	

				<div class="col-md-2">
				<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
				</div>									

			</div>
			</form>	
		</div>
		<div class="col-md-1">
			<form id="searchp2">
				<input type="hidden" name="all" value="all">
				<input type="hidden" name="product" >
				<input type="hidden" name="category_id" >
				<div class="col-md0">
				<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-eye-open"></i> Ver todos los libros</button>
				</div>				
			</form>	
		</div>	

		
	</div>
		
	</div>


<div class="col-md-12" id="show_search_results"></div>

<script>
//jQuery.noConflict();

$(document).ready(function(){
	$("#searchp").on("submit",function(e){
		e.preventDefault();
		
		$.get("./?action=buscarlibro",$("#searchp").serialize(),function(data){
			$("#show_search_results").html(data);
		});
		$("#product_code").val("");
		$("#category_id").val("");

	});

	$("#searchp2").on("submit",function(e){
		e.preventDefault();		
		$.get("./?action=buscarlibro",$("#searchp2").serialize(),function(data){
			$("#show_search_results").html(data);
		});		

	});
	});
</script>
