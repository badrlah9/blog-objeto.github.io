<?php
    require_once "Articulo.php";

    class RepositorioArticulos{
        private $conexion;

        public function __construct($con)
        {            
            $this->conexion = $con;
        }

        public function findAll() {
            //Escribo el texto de la consulta para recuperar todos los artículos de la BBDD
            $textoSQL = "SELECT * FROM articulos";
            //Realizo la consulta aprovechando la conexión que me han pasado en el constructor
            $resultado = $this->conexion->query($textoSQL);
            //Array de artículos que vamos a devolver
            $arts=[];
            $cont=0;
            //Mientras haya filas en la consulta, las convierto en artículos del array
            while($fila = $resultado->fetch_object()){
                $arts[]=new Articulo();
                $arts[$cont]->setPropiedades($fila->titulo, $fila->contenido, $fila->imagen);
                $arts[$cont]->setId($fila->id);
                $arts[$cont]->setModelo($fila->modelo);
                $arts[$cont]->setDestacado($fila->destacado);
                $cont++;
            }
            return $arts;
        }


        public function findById($idABuscar){
            $textoSQL = "SELECT * FROM articulos WHERE id=$idABuscar";
            $resultado = $this->conexion->query($textoSQL);
            $fila = $resultado->fetch_object();            
            $articulo = new Articulo();
            $articulo->setPropiedades($fila->titulo, $fila->contenido, $fila->imagen);
            $articulo->setId($fila->id);
            return $articulo;
        }

        public function save($articulo){
            $textoSQL = "INSERT INTO articulos (titulo, contenido, imagen, fecha, modelo, destacado) VALUES ";
            $textoSQL .= "('$articulo->titulo', '$articulo->contenido', '$articulo->imagen', '$articulo->fecha', '$articulo->modelo', '$articulo->destacado')";

            $this->conexion->query($textoSQL);
        }

        public function update($articulo){
            $textoSQL  = "UPDATE articulos SET titulo='" . $articulo->getTitulo() . "', ";
            $textoSQL .= " contenido='" . $articulo->getContenido() . "', ";
            $textoSQL .= " imagen='" . $articulo->getImagen() . "', ";
            $textoSQL .= " fecha='" . $articulo->getFecha() . "', ";
            $textoSQL .= " modelo='" . $articulo->getModelo() . "', ";
            $textoSQL .= " destacado='" . $articulo->getDestacado() . "' ";
            $textoSQL .= "WHERE id=" . $articulo->getId();

            $this->conexion->query($textoSQL);
        }

    }