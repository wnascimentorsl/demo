<?php

require "functions.php";

$dsn = "pgsql:host=localhost;port=5432;user='postgres';password='postgres';dbname=demo";

$pdo = new PDO($dsn); //data

$statement = $pdo->prepare("select * from posts");
$statement -> execute();

$posts = $statement->fetchAll();

dd($posts);