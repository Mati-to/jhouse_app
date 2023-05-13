<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$db = connectionDB();

use App\Property;

Property::setDB($db);

