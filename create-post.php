<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/css_files/header.css">
</head>
<body>
    <?php include "includes/html_files/header.html" ?>
    <a href="blog-dashboard.php">Dashboard</a>
    <form action="create-post.php" method="post">
        <label for="title">Title</label><br>
        <input type="text" name="title" id="title"><br>
        <label for="article">Article</label><br>
        <textarea name="article" id="" cols="80" rows="40"></textarea><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>