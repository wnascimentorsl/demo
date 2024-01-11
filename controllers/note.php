<?php 


$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';

$id = $_GET['id'];

$notes = $db->query('select * from note where user_id = 1')->fetchAll();

require "views/notes.view.php";
