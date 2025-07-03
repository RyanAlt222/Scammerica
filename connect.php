<?php 
    require "config.php";
    $dns = "mysql:host=$servername;dbname=$db;charset=UTF8";
   
    
  try {
    $pdo = new PDO($dns, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    } catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>