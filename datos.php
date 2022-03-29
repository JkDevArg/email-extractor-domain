<?php
    include 'conexion.php';
    class insertarDatos extends DB{
        public function __construct(){
            parent::__construct();
        }
        public function generarCorreo(){
            $correo = "";
            $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $longitud = strlen($caracteres);
            for($i = 0; $i < 10; $i++){
                $correo .= $caracteres[rand(0, $longitud - 1)];
            }
            $correo .= "@demo.com";
            return $correo;
        }
        public function generarDatos(){
            //insertamos el correo generado en la base de datos
            $query = "INSERT INTO data (Correo, CorreoRepresentante) VALUES ('".$this->generarCorreo()."', '".$this->generarCorreo()."')";
            $resultado = $this->insertar($query);
            //imprimimos el correo generado
            echo "Correo generado: " .$this->generarCorreo() . "<br>";
        }
    }

?>
