<?php
    require_once 'conexion.php';
    class Dominios extends DB{
        public function __construct(){
            parent::__construct();
        }
        public function correos(){
            $query = "SELECT Correo, CorreoRepresentante FROM data";
            $resultado = $this->consulta($query);
            $fila = mysqli_fetch_assoc($resultado);
            $datos = array();
            while($fila = mysqli_fetch_assoc($resultado)){
                $datos[] = $fila;
            }
            return $datos;
            mysqli_close($this->conexion);
        }
        public function dominios(){
            $datos = $this->correos();
            $correos = array();
            foreach($datos as $dato){
                $correos[] = $dato['Correo'];
            }
            $correos = array_unique($correos);
            $correosRepresentantes = array();
            foreach($datos as $dato){
                $correosRepresentantes[] = $dato['CorreoRepresentante'];
            }
            $correosRepresentantes = array_unique($correosRepresentantes);
            $dominios = array();
            foreach($correosRepresentantes as $correo){
                if(!empty($correo)){
                    $dominios[] = explode("@", $correo)[1];
                }
            }
            $dominios = array_unique($dominios);
            $dominios = array_diff($dominios, array("gmail.com", "hotmail.com", "yahoo.com", "msn.com", "outlook.com", "live.com"));
            foreach($dominios as $dominio){
                echo "El Dominio es: ". $dominio . "<br>";
            }
        }

    }
