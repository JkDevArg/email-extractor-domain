<?php
class DB{
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $nombreDB = "empresas";
    private $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->nombreDB);
        if($this->conexion->connect_errno){
            echo "Fallo al conectar a MySQL: ".$this->conexion->connect_error;
        }
    }
    public function consulta($query){
        $resultado = $this->conexion->query($query);
        if($this->conexion->errno){
            echo "Fallo al ejecutar la consulta: ".$this->conexion->error;
        }
        return $resultado;
    }
    //funcion para insertar datos en la base de datos
    public function insertar($query){
        $resultado = $this->conexion->query($query);
        if($this->conexion->errno){
            echo "Fallo al ejecutar la consulta: ".$this->conexion->error;
        }
        return $resultado;
    }
    public function __destruct(){
        $this->conexion->close();
    }
}
?>