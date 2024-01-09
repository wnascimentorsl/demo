<?php 


$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Notes';

$notes = [];

require "views/notes.view.php";
