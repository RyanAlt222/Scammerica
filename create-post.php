<?php
    require 'connect.php';
    $title = "";
    $article = "";
    $today = date("m.d.y");
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST["title"];
        $article = $_POST["article"];
        $user_id = 1;

        if(!empty($title) && !empty($article)){
            $sql = "INSERT INTO articles(title, content, article_date, user_id) VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$title, $article, $today,1]);
            header("location: blog-dashboard.php");
        }

    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/css_files/header.css">
    <link rel="stylesheet" href="create-post.css">
</head>
<body>
    <?php include "includes/html_files/header.html" ?>
    
    <a href="blog-dashboard.php">Dashboard</a>
    <div id="dashboard-container">
        <form action="create-post.php" method="post">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title"><br>
            <label for="article">Article</label><br>
            <textarea name="article" id="" cols="80" rows="20"></textarea><br>
            <input type="submit" value="submit" id="submit">
        </form>
    </div>
    
</body>
</html>