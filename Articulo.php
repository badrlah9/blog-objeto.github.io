<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    class Articulo{
        public $id;
        public $titulo;
        public $contenido;
        public $imagen;
        public $fecha;
        public $id_tema;
        public $modelo;
        public $destacado;

        public function __construct(){
            $this->fecha = date('Y-m-d');
        }

        public function setPropiedades($tit, $cont, $img){
            $this->titulo=$tit;
            $this->contenido = $cont;
            $this->imagen = $img;   
        }

        public function mostrar(){
            $texto = "<h1>$this->titulo</h1>";
            $texto .= "<h6>$this->fecha</h6>";
            $texto .= "<img src='$this->imagen'>";
            $texto .= "<p>$this->contenido</p>";
            $texto .= "<h6>$this->id_tema</h6>";
            //anadir los dos nuevos methodos
            $texto .= "<h6>$this->modelo</h6>";
            $texto .= "<h6>$this->destacado</h6>";
            return $texto;
        }

        public function mostrarCard(){
            
            $card = "<div class='card' style='width: 18rem;'>";
            $card .= "<img src='$this->imagen' class='card-img-top' alt='Miniatura de la imagen'>";
            $card .= "<div class='card-body'>";
            $card .= "<h5 class='card-title'>$this->titulo</h5>";
            $card .= "<p class='card-text'>" . substr($this->contenido, 0, 100) . "...</p>"; // Mostrar solo los primeros 100 caracteres del contenido
            $card .= "<a href='#' class='btn btn-primary'>Leer más</a>";
            $card .= "</div>";
            $card .= "</div>";
        return $card;          
         
        }

        public function mostrarMini(){
            return $this->titulo;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id){
            $this->id=$id;
        }

        public function setFecha($fecha){
            $this->fecha=$fecha;            
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setTitulo($titulo){
            $this->titulo=$titulo;
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function setContenido($contenido){
            $this->contenido=$contenido;
        }

        public function getContenido(){
            return $this->contenido;
        }

        public function setImagen($Imagen){
            $this->imagen=$Imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }
        public function setModelo($modelo){
            $this->modelo=$modelo;
        }
        public function getModelo(){
            return $this->modelo;
        }
        public function setDestacado($destacado){
            $this->destacado=$destacado;
        }
        public function getDestacado(){
            return $this->destacado;
        }
    }