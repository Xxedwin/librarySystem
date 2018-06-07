
<?php if(isset($_POST["id"]) 
 ):?>
	<?php

	$id=$_POST["id"];						
	$book = BookData::getById($id);		
    $idAuthor=$book->author_id;
    $idEditorial=$book->editorial_id;
    $idCategory=$book->category_id;
    $author = AuthorData::getById($idAuthor);     
    $editorial = EditorialData::getById($idEditorial);     
    $category = CategoryData::getById($idCategory);     
	
?>
<div class="col-sm-4">
  <?php if($book->image === ''): ?>    
    <img src="uploads/default-book.png" alt="" class="imagen img-responsive">
  <?php else: ?>  
    <img src="uploads/<?php echo $book->image; ?>" alt="" class="imagen img-responsive">
  <?php endif; ?>    
</div>
<div class="col-sm-8">      
 <dl>
    <dt>ISBN:</dt>
    <dd class="codigo_libro"><?php echo $book->isbn; ?></dd>
    <dt>Titulo:</dt>
    <dd class="titulo_libro"><?php echo $book->title; ?></dd>
    <dt>Subtitulo:</dt>
    <dd class="subtitulo_libro"><?php echo $book->subtitle; ?></dd>
    <dt>Institucion:</dt>
    <dd class="autor_libro"><?php echo $book->institucion; ?></dd>
    <dt>Descripcion:</dt>
    <dd class="isbn_libro"><?php echo $book->description; ?></dd>
    <dt>Año:</dt>
    <dd class="publicacion_libro"><?php echo $book->year; ?></dd>
    <dt>Numero de paginas:</dt>
    <dd class="editorial_libro"><?php echo $book->n_pag; ?></dd>
    <dt>Autor:</dt>
    <dd class="ediccion_libro"><?php echo $author->name; ?> <?php echo $author->lastname;?></dd>
    <dt>Editorial:</dt>
    <dd class="idioma_libro"><?php echo $editorial->name; ?></dd>
    <dt>Categoria:</dt>
    <dd class="idioma_libro"><?php echo $category->name ?></dd>
    <dt>Ubicacion y Estante:</dt>
    <dd class="idioma_libro"><?php echo $book->locationShelf; ?></dd>
</dl>                         
</div>


<?php else:			
?>
<?php endif; ?>