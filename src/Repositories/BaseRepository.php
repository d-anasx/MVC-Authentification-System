<?php
namespace App\Repositories;
use App\Config\Connection;

class BaseRepository {
    protected $conn;
    protected $table;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function find($property, $value) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE " . $property . " = :" . $property);
        $stmt->execute([':' . $property => $value]);
        return $stmt->fetch();
    }

    public function findAll() {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($data)
    // $data = ['name' => 'anas', 'email' => 'anas@anas.com'...]
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $stmt = $this->conn->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        $stmt->execute($data);

        return $this->conn->lastInsertId();

    }


    public function update($id, $data)
    {
        
        $fields = array_map(
            fn($col) => "$col = ?",
            array_keys($data)
        );

        $sql = "UPDATE {$this->table}
                SET " . implode(', ', $fields) . "
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $params = array_values($data);
        $params[] = $id;

        return $stmt->execute($params);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }


}

