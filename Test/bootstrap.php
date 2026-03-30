<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

$db = new Database();
$db->connect();