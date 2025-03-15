<?php

include "DbConfig.php";

class Crud
{
  private $conn;

  public function __construct()
  {
    $this->conn = getdbconnection();
  }

  public function create($data_array, $table)
  {
    $columns = implode(',', array_keys($data_array));
    $place_holders = ':' . implode(',:', array_keys($data_array));
    $sql = "INSERT INTO $table ($columns) VALUES ($place_holders)";
    $stmt = $this->conn->prepare($sql);

    $stmt->execute($data_array);

    return $this->conn->lastInsertId();
  }

  public function read($query)
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public function update($query)
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
  }

  public function delete($query)
  {
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
  }
}