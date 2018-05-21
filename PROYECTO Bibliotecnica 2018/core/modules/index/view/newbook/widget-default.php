<?php

$categories = CategoryData::getAll();
$authors = AuthorData::getAll();
$editorials = EditorialData::getAll();

?>

<div class="row">
<div class="col-md-12">
<h1>Nuevo Libro</h1>
<form class="form-horizontal" role="form" method="post" action="./?action=addbook" id="addbook">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">ISBN</label>
    <div class="col-lg-10">
      <input type="text" name="isbn" class="form-control" id="inputEmail1" placeholder="ISBN">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Subtitulo</label>
    <div class="col-lg-10">
      <input type="text" name="subtitle" required class="form-control" id="inputEmail1" placeholder="Subtitulo">
    </div>
  </div>
    <!-- institucion -->
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Institución</label>
    <div class="col-lg-10">
      <input type="text" name="institucion" class="form-control" id="inputEmail1" placeholder="Institucion">
    </div>
	</div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" placeholder="Descripcion"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ubicacion y Estante</label>
    <div class="col-lg-10">    
    <input type="text" name="locationShelf" class="form-control" id="inputEmail1" placeholder="Ubicacion y Estante">
    </div>
  </div>  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Palabras Claves</label>
    <div class="col-lg-10">      
      <input type="text" name="keywords" class="form-control" id="inputEmail1" data-role="tagsinput" placeholder="Palabras Claves">
    </div>
    <!-- <label for="inputEmail1" class="col-lg-1 control-label">Portada</label>
    <div class="col-lg-4">
      <input type="file" name="image" id="name" class="form-control" id="inputEmail1">
    </div> -->

  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Num. Paginas</label>
    <div class="col-lg-5">
      <input type="text" name="n_pag" required class="form-control" id="inputEmail1" placeholder="Num. Paginas">
    </div>
    <label for="inputEmail1" class="col-lg-1 control-label">A&ntilde;o</label>
    <div class="col-lg-4">
      <input type="text" name="year" required class="form-control" id="inputEmail1" placeholder="A&ntilde;o">
    </div>

  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tema</label>
    <div class="col-lg-10">
<select name="category_id" required class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($categories as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Editorial</label>
    <div class="col-lg-10">
<select name="editorial_id" required class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($editorials as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Autor</label>
    <div class="col-lg-10">
<select name="author_id" required class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($authors as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Libro</button>
      <button type="reset" class="btn btn-default" id="clear">Limpiar Campos</button>
    </div>
  </div>
</form>

</div>
</div>
