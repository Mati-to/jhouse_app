<?php
session_start(); 

$_SESSION = [];

header('Location: /nihonstay_app/views/index.php');