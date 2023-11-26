<?php
    session_start();
    require_once "modelo/Articulo.php";
    require_once "modelo/RepositorioArticulos.php";
    require_once "templates/header.php";
    require_once "modelo/conexion.php";    

    $art=[];
    $art[]=new Articulo();
    $art[0]->setPropiedades("Gran titular", "Clickbait", "imagen.jpg");
    $art[0]->setId(0);

    $art[]=new Articulo();
    $art[1]->setPropiedades("Mbappé se lo piensa", "No sabe si pedir Pepsi o Coca-Cola", "imagen.jpg");
    $art[1]->setId(1);

    $art[]=new Articulo();
    $art[2]->setPropiedades("No te vas a creer lo que contiene una patata del Mercadona", "Un tubérculo", "imagen.jpg");
    $art[2]->setId(2);

    foreach($art as $a){
        echo "<a href='detalle.php?id=" . $a->getId() . "'><h2>" . $a->mostrarMini() . "</h2></a>";
    }   

    $_SESSION["listadoArticulos"] = serialize($art);

    require_once "templates/footer.php";
