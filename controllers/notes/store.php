<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve('Database::class');

$errors = [];

if (! Validator::string($_POST['body'], 1, 350)) {
    $errors['body'] = 'A body of no more than 350 characters is required';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(id, body, user_id) VALUES (:id, :body, :user_id)', [
    'id' => 1,
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: /notes');
die();
