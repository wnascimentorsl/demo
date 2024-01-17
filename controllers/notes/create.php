<?php

require 'Validator.php';

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){



    if (! Validator::string($_POST['body'], 1, 350)){
        $errors['body'] = 'A body of no more than 350 characters is required';
    }

    if (empty($errors)){
        $db->query('INSERT INTO notes(id, body, user_id) VALUES (:id, :body, :user_id)', [
            'id' => 5,
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);