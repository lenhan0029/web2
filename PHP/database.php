<?php
$server = 'localhost';
$username_db = 'root';
$password_db = '';
// $database = 'doan';
$database = 'final_doan_version';
$conn = new mysqli($server, $username_db, $password_db, $database);
$conn->set_charset('UTF8');
