<?php
class Area{
    private $table = 'areas';
    private $connection;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $dbObj = new Db();
        $this->connection = $dbObj->conection;
    }

    public function getAreaById($id){
        $sql = "SELECT * FROM ".$this -> table. " WHERE id = ?";
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> execute([$id]);
        return $stmt -> fetch();
    }

    public function getAreas() {
        $sql = "SELECT * FROM ".$this -> table;
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll();
    }
}
?>