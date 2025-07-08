<?php
    require 'connect.php';

    // Initialize Variables
    $id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
   
    
    // If page contains an id
    if($id){
        $sql = "SELECT * FROM Articles WHERE article_id=$id";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $blog = $stmt->fetch();
        var_dump($blog);
    }
    
    $title = "";
    $article = "";
    $today = date("m.d.y");
    
    // Validate data
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST["title"];
        $article = $_POST["article"];
        $user_id = 1;

        if($id){
            try {
                $sql = "UPDATE Articles SET title = :title, content = :article, article_date = :today WHERE article_id = :article_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':title' => $title,
                    ':article' => $article,
                    ':today' => $today,
                    ':article_id' => $id
                ]);
                header("location: blog-dashboard.php");
                exit();
            }catch (PDOException $e){
                die("Error updating Article " . $e->getMessage());
            }
        }
        else {
            if(!empty($title) && !empty($article)){
                $sql = "INSERT INTO Articles(title, content, article_date, user_id) VALUES(?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$title, $article, $today,$user_id]);
                header("location: blog-dashboard.php");
                exit();
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
    <div id="dashboard-container">
    <form action="create-post.php<?php echo $id ? '?id=' . $id : ''; ?>" method="post">

            <label for="title">Title</label><br>
            <input type="text" name="title" id="title"><br>
            <label for="article">Article</label><br>
            <textarea name="article" id="" cols="80" rows="20"></textarea><br>
            <input type="submit" value="submit" id="submit">
        </form>
    </div>
    
</body>
</html>