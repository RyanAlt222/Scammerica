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
    <link rel="stylesheet" href="blogs.css">
</head>
<body>
    <?php include 'includes/html_files/header.html'; ?>
    <h1>Blog Site</h1>
    
        <div id="blog-container">
        <?php foreach ($results as $keys ){?>
            <div id="card">
               
               <p><?= htmlspecialchars($keys->title) ?></p>
               <p><?= htmlspecialchars($keys->article_date) ?></p>
               <a href="">Read More</a>
         
           
       </div>
       <?php } ?>
        </div>
           
</body>
</html>