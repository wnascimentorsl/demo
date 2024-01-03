<?php

// Connect to the database, and execute a query
class Database {
    public $connection;
    public function __construct()
    {
        $dsn = "pgsql:host=localhost;port=5432;user='postgres';password='postgres';dbname=demo";

        $this->connection = new PDO($dsn); //data
    }
    public function query($query)
    {
      $statement = $this->connection->prepare($query);
      $statement -> execute();

    return $statement;
    }
}