<?php
$database_config = parse_ini_file("config.ini");

try{
  $conn = new PDO(
  "mysql:host=". $database_config['host'].
  ";dbname=" . $database_config['database'],
  $database_config['username'],
  $database_config['password']
);
  //set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($database_config['debug']){
    echo "Connected succesfully";
  }
}
catch ( PDOException $e ) {
  if ( $database_config['debug'] ) {
    echo "Connection failed: " . $e->getMessage();
  }
}
