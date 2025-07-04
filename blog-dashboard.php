<?php
    require "connect.php";
    $sql = "SELECT * FROM articles";
    $stmt = $pdo->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    $results = $stmt->fetchAll();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/css_files/header.css">
    <link rel="stylesheet" href="blog-dashboard.css">
</head>
<body>
    <?php include "includes/html_files/header.html"; ?>
    <h1>Dashboard</h1>
    <div id="container">
        <a href="create-post.php">Create a new post</a>
        <div id="directions">
            <button><i class="fa-solid fa-arrow-left"></i></button>
            <button><i class="fa-solid fa-arrow-right"></i></button>
        </div>
        <?php foreach ($results as $keys ){?>
            <div id="card">
                <div id="card-left">
                    <p><?= htmlspecialchars($keys->title) ?></p>
                    <p><?= htmlspecialchars($keys->article_date) ?></p>
                </div>
                <div id="card-right">
                    <button id="edit">Edit</button>
                    <button id="delete">Delete</button>
                </div>
            </div>
            <?php } ?>
    </div>

    <script src="https://kit.fontawesome.com/9cefd17742.js" crossorigin="anonymous"></script>
</body>
</html>