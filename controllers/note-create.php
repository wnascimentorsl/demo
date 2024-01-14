<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

    if (strlen($_POST['body']) === 0){
        $errors['body'] = 'A body is required';
    }

    if (strlen($_POST['body']) > 300){
        $errors['body'] = 'The body must contain less than 300 characters';
    }

    if (empty($errors)){
        $db->query('INSERT INTO notes(id, body, user_id) VALUES (:id, :body, :user_id)', [
            'id' => 5,
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require 'views/note-create.view.php';
