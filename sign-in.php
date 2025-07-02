<?php
    require "config.php";
    $err = "";
    // Check for server
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = test_input($_GET["username"]);
        $password = test_input($_GET["password"]);

        if(empty($name) || empty($password)) {
            $err = "Please fill out the form";
        }
        else {
            $err = "";
        }


    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sign-in.css">
</head>
<body>
    <div id="sign-in-container">
        
        <form action="sign-in.php" method="get">
            <h1>Sign In</h1>
            <label for="Username">Username</label>
            <input type="text" name="username" id=""><br>
            <label for="Username">Password</label>
            <input type="password" name="password" id=""><br>
            <input type="submit" id="submit" value="Login"><br>
            <span><?= $err ?></span>
        </form>
    </div>
   
</body>
</html>