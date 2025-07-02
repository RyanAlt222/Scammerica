<?php 
    $servername = "localhost";
    $databasename = "myDB";
    $username = "ryan";
    $password = "abc123";

    try {
    $pdo = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    if($pdo){
        echo "Connected successfully";
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    
    
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>