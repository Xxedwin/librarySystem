<?php
$book = BookData::getById($_GET["id"]);
$categories = CategoryData::getAll();
$authors = AuthorData::getAll();
$editorials = EditorialData::getAll();

?>

<div class="row">
<div class="col-md-12">
<h1><?php echo $book->title; ?> <small>Editar libro</small></h1>
<form class="form-horizontal" role="form" method="post" action="./?action=updatebook" id="addbook" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">ISBN</label>
    <div class="col-lg-10">
      <input type="text" name="isbn" class="form-control" value="<?php echo $book->isbn; ?>" id="inputEmail1" placeholder="ISBN">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="title" required class="form-control" value="<?php echo $book->title; ?>" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Subtitulo</label>
    <div class="col-lg-10">
      <input type="text" name="subtitle" class="form-control" value="<?php echo $book->subtitle; ?>" id="inputEmail1" placeholder="Subtitulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Institucion</label>
    <div class="col-lg-10">
      <input type="text" name="institucion" class="form-control" value="<?php echo $book->institucion; ?>" id="inputEmail1" placeholder="Institucion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" placeholder="Descripcion"><?php echo $book->description; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ubicacion y Estante</label>
    <div class="col-lg-10">
    <input type="text" name="locationShelf" class="form-control" value="<?php echo $book->locationShelf; ?>" id="inputEmail1" placeholder="Ubicacion y Estante">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Palabras Claves</label>
    <div class="col-lg-5">
    <input type="text" name="keywords" class="form-control" data-role="tagsinput" value="<?php echo $book->keywords; ?>" id="inputEmail1" placeholder="Palabras Claves">
    </div>
    <label for="inputEmail1" class="col-lg-1 control-label">Portada</label>
    <div class="col-lg-4">
      <input type="file" name="file" id="file" class="form-control" id="inputEmail1">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Num. Paginas</label>
    <div class="col-lg-4">
      <input type="text" name="n_pag" class="form-control" id="inputEmail1" value="<?php echo $book->n_pag; ?>" placeholder="Num. Paginas">
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">A&ntilde;o</label>
    <div class="col-lg-4">
      <input type="text" name="year" class="form-control" id="inputEmail1" value="<?php echo $book->year; ?>" placeholder="A&ntilde;o">
    </div>

  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tema</label>
    <div class="col-lg-10">
<select name="category_id" class="form-control">
<option value=""> Seleccionar </option>
  <?php foreach($categories as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($book->category_id!=null && $book->category_id==$p->id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Editorial</label>
    <div class="col-lg-10">
<select name="editorial_id" class="form-control">
<option value=""> Seleccionar </option>
  <?php foreach($editorials as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($book->editorial_id!=null && $book->editorial_id==$p->id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Autor</label>
    <div class="col-lg-10">
<select name="author_id" class="form-control">
<option value=""> Seleccionar </option>
  <?php foreach($authors as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($book->author_id!=null && $book->author_id==$p->id){ echo "selected"; }?>><?php echo $p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>






  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $book->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Libro</button>
      <button type="reset" class="btn btn-default" id="clear">Limpiar Campos</button>
    </div>
  </div>
</form>

</div>
</div>
