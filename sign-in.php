<?php
    require "connect.php";

    $sql = "";
    $err = "";
    $statement = "";
    $member = "";
    
    // Check for server
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = test_input($_GET["username"]);
        $password = test_input($_GET["password"]);

        if(empty($name) || empty($password)) {
            $err = "Please fill out the form";
        }
        else {
            $err = "Success";
            
            $sql = "SELECT * FROM Users WHERE username = ? AND password = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$name, $password]);
            $member = $statement->fetch();
            if(!$member){
                echo "Not member";
            }
            else{
                echo "Success";
                header("Location: blog-dashboard.php");
                exit;
            }
            //echo $statement;
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
            <label for="username">Username</label>
            <input type="text" name="username" id=""><br>
            <label for="password">Password</label>
            <input type="password" name="password" id=""><br>
            <input type="submit" id="submit" value="Login"><br>
            <span><?= $err ?></span>
        </form>
    </div>
   <p>Hi <?= $member["username"] ?></p>
</body>
</html>