<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;


$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

$fornm = new LoginForm();

if ($form->validate($email, $password)) {
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    }
}

$form->error('email', 'No matching account or password found for that email address.');

Session::flash('errors', $$form->errors());


return redirect('/login');
