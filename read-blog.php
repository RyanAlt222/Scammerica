<?php 
    require "connect.php";
    $id = filter_input(INPUT_GET,"id", FILTER_VALIDATE_INT);
    $blog = "";
  
    if($id){
        $sql = "SELECT title, content FROM Articles WHERE article_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute(["id" => $id]);
        $blog = $stmt->fetch();
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Post</title>
    <link rel="stylesheet" href="includes/css_files/header.css">
</head>
<body>
    <?php require 'includes/html_files/header.html' ?>
    <article>
        <h1><?= $blog->title ?></h1>
        <h1><?= $blog->content ?></h1>
    </article>
</body>
</html>