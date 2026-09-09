<?php
include 'db.php';

$stmt = $pdo->query(
    "SELECT id, name, created_at 
     FROM guestbook 
     ORDER BY id DESC"
);

$names = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Names</title>
</head>
<body>
    <h1>All Saved Names</h1>

    <?php foreach ($names as $row): ?>
        <p>
            <?= htmlspecialchars($row['name']) ?>
            - <?= htmlspecialchars($row['created_at']) ?>
        </p>
    <?php endforeach; ?>

    <br>
    <a href="index.php">Back</a>
</body>
</html>