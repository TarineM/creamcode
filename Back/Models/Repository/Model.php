<?php

namespace Models\Repository;
use PDO;

abstract class Model
{
    /**
     * @var PDO
     */
    protected $pdo;
    /**
     * @var string
     */
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    /**
     * Find one data/row on a table by id
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {    
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $item = $query->fetch();

        return $item;
    }

    /**
     * Find all data/rows on a table
     * @return mixed
     */
    public function findAll()
    {
        $resultats = $this->pdo->query("SELECT * FROM {$this->table}");

        $items = $resultats->fetchAll();

        return $items;
    }

    /**
     * Delete one data/row on a table by an id
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function removeNullFromData(array $data): ?array
    {
        $cleanData = array_filter($data);
        if (true === empty($cleanData)) {
            return null;
        }

        $newData['columns'] = implode(", ", array_keys($cleanData));
        $newData['fields'] = "'" . implode("', '", $cleanData) . "'";

        return $newData;
    }

    public function insertInDatabase(array $data): void
    {
        $paramData = $this->removeNullFromData($data);

        if (null !== $paramData) {
            $sql = "INSERT INTO {$this->table} (". $paramData['columns'] . ") VALUES (" . $paramData['fields'] . ")";

            $query = $this->pdo->prepare($sql);

            $query->execute();
        }
    }
}