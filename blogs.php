<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "connect.php";
$sql = "SELECT * FROM Articles";
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
    <link rel="stylesheet" href="blogs.css">
</head>
<body>
    <?php include 'includes/html_files/header.html'; ?>
    <h1>Blog Site</h1>
    
    <div id="blog-container">
        <?php if (empty($results)): ?>
            <div class="no-articles">
                <p>No articles found. Check back later!</p>
            </div>
        <?php else: ?>
            <?php foreach ($results as $keys): ?>
                <div id="card">
                    <p><?= htmlspecialchars($keys->title) ?></p>
                    <p><?= htmlspecialchars($keys->article_date) ?></p>
                    <a href="">Read More</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>