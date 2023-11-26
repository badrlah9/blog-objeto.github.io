<?php
    session_start();
    require_once "modelo/Articulo.php";
    require_once "templates/header.php";

    $art = unserialize($_SESSION["listadoArticulos"]);

    $id = $_GET["id"];

    $articulo = $art[$id];

    echo $articulo->mostrar();

    require_once "templates/footer.php";