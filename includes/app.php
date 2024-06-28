<?php

use Dotenv\Dotenv;

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Conectarnos a la base de datos
$db = conectarDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);