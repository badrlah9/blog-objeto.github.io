<?php
    session_start();
    require_once "modelo/Articulo.php";
    require_once "modelo/RepositorioArticulos.php";
    require_once "templates/header.php";
    require_once "modelo/conexion.php";    

    //Utilizo la conexión que se crea en conexion.php para pasarla como parámetro al repo
    $rep = new RepositorioArticulos($conexion);

    $articulos=$rep->findAll();

    if(empty($articulos) || sizeof($articulos)<5){
        $a = new Articulo();
        $a->setPropiedades("Gran titular", "Mejor contenido", "imagen.jpg");
        $rep->save($a);
    }

    foreach($articulos as $a){
        echo "<a href='detalle.php?id=" . $a->getId() . "'><h2>" . $a->mostrarMini() . "</h2></a>";
    }   
    
    require_once "templates/footer.php";
