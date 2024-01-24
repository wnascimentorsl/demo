<?php

use Core\Authenticator;
use Core\Session;

Session::logout();

header('location: /');
exit();