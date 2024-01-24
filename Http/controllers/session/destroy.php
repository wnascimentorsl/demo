<?php

use Core\Session;

Session::logout();

header('location: /');
exit();
