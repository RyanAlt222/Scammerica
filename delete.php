<?php 
    require "connect.php";

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    echo $id;
    if ($id) {
        $sql = "DELETE FROM Articles WHERE article_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "id" => $id
        ]);
        header("location: blog-dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main id="container">
        <h1>Delete Blog</h1>
        <form action="delete.php?id=<?= $id ?>" method="post">
            <input type="submit" value="Delete" id="delete">
            <a href="dashboard.php">Cancel</a>
        </form>
    </main>
</body>
</html>