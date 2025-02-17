<?php
class Mujer
{
    private $table = 'mujeres';
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

    public function getMujeres()
    {
        $sql = "SELECT mujeres.*, areas.nombre as area_nombre 
            FROM mujeres 
            INNER JOIN areas ON mujeres.area = areas.id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMujeresByArea($area)
    {
        $query = "SELECT * FROM mujeres WHERE area = :area";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':area', $area);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function searchMujeres($keyword) {
        $keyword = "%$keyword%";
        $sql = "SELECT mujeres.*, areas.nombre as area_nombre 
                FROM mujeres 
                INNER JOIN areas ON mujeres.area = areas.id
                WHERE mujeres.nombre LIKE :keyword 
                OR mujeres.apellidos LIKE :keyword 
                OR mujeres.descripcion LIKE :keyword
                ORDER BY mujeres.nacimiento DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMujerById($id) {
        $sql = "SELECT * FROM mujeres WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateMujer($params) {
        $sql = "UPDATE mujeres SET nombre = :nombre, apellidos = :apellidos, nacimiento = :nacimiento, defuncion = :defuncion, nacionalidad = :nacionalidad, area = :area, enlace = :enlace, fotografia = :fotografia, descripcion = :descripcion WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':nombre', $params['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $params['apellidos'], PDO::PARAM_STR);
        $stmt->bindParam(':nacimiento', $params['nacimiento'], PDO::PARAM_INT);
        $stmt->bindParam(':defuncion', $params['defuncion'], PDO::PARAM_INT);
        $stmt->bindParam(':nacionalidad', $params['nacionalidad'], PDO::PARAM_STR);
        $stmt->bindParam(':area', $params['area'], PDO::PARAM_STR);
        $stmt->bindParam(':enlace', $params['enlace'], PDO::PARAM_STR);
        $stmt->bindParam(':fotografia', $params['fotografia'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $params['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteMujer($id) {
        $sql = "DELETE FROM mujeres WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function createMujer($params) {
        $sql = "INSERT INTO mujeres (nombre, apellidos, nacimiento, defuncion, nacionalidad, area, enlace, fotografia, descripcion) 
                VALUES (:nombre, :apellidos, :nacimiento, :defuncion, :nacionalidad, :area, :enlace, :fotografia, :descripcion)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':nombre', $params['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $params['apellidos'], PDO::PARAM_STR);
        $stmt->bindParam(':nacimiento', $params['nacimiento'], PDO::PARAM_STR);
        $stmt->bindParam(':defuncion', $params['defuncion'], PDO::PARAM_STR);
        $stmt->bindParam(':nacionalidad', $params['nacionalidad'], PDO::PARAM_STR);
        $stmt->bindParam(':area', $params['area'], PDO::PARAM_INT);
        $stmt->bindParam(':enlace', $params['enlace'], PDO::PARAM_STR);
        $stmt->bindParam(':fotografia', $params['fotografia'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $params['descripcion'], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getRandomMujeres($limit) {
        $sql = "SELECT mujeres.*, areas.nombre as area_nombre 
                FROM mujeres 
                INNER JOIN areas ON mujeres.area = areas.id 
                ORDER BY RAND() 
                LIMIT :limit";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
