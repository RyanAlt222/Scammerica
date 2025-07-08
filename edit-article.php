<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require 'connect.php';
    $title = "";
    $article = "";
    $today = date("m.d.y");
    
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    echo $id;
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST["title"];
        $article = $_POST["article"];
        $article_id = $id;

        if(!empty($title) && !empty($article)){
            try {
                $sql = "UPDATE Articles SET title = ?, content = ?, article_date = ? WHERE article_id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$title, $article, $today, $article_id]);
                header("location: blog-dashboard.php");
                exit();
            }catch (PDOException $e){
                die("Error updating Article " . $e->getMessage());
            }
           
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
    <h1>Update Page</h1>
    <div id="dashboard-container">
        <form action="edit-article.php" method="post">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title"><br>
            <label for="article">Article</label><br>
            <textarea name="article" id="" cols="80" rows="20"></textarea><br>
            <input type="submit" value="submit" id="submit">
        </form>
    </div>
    
</body>
</html>