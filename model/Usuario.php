<?php
class Usuario {
    private $table = 'usuarios';
    private $connection;

    public function __construct()
    {
        $this->getConnection();
    }

    public function getConnection()
    {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    public function getUsuarioByNombre($usuario) {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registerUsuario($usuario, $password) {
        $sql = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }
}