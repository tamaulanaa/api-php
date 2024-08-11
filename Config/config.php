<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'data');

$database = mysqli_connect(HOST, USER, PASSWORD, DB) or die('Unable Connect');
