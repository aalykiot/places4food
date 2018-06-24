<?php

  require("./config/db.php");

  define("PG_CONNECTION_STRING", "pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;user=$DB_USER;password=$DB_PASSWORD");

  class PGConnection {

    private $conn;

    public function __construct() {

      try{

        $this->conn = new PDO(constant("PG_CONNECTION_STRING"));

      } catch(PDOException $e) {
        die($e->getMessage());
      }

    }

    public function query($sql) {

      try {

        $stmt = $this->conn->query($sql);

        $result = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $result[] = $row;
        }

        return $result;

      } catch(PDOException $e) {
        die($e->getMessage());
      }

    }

    public function close() {

      $this->conn = null;

    }

  }


?>
