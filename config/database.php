<?php
class Database{
    public $hostname = 'localhost';
    public $database = 'tienda-online';
/*     public $username = 'admin';
    public $password = 'admin'; */
    public $charset = 'utf8';

    function conectar() {  
        try{
            $conexion = 'mysql:host=' . $this->hostname . '; dbname=' . $this->database . '; charset=' . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($conexion, 'root', '', $options);
            return $pdo;
        } catch(PDOException $e){
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }
}
?>