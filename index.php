<?php
include 'db.php';

// Auto-create table for testing convenience
$pdo->exec("CREATE TABLE IF NOT EXISTS guestbook (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
    $stmt = $pdo->prepare("INSERT INTO guestbook (name) VALUES (:name)");
    $stmt->execute(['name' => $_POST['name']]);
    $message = "Name saved successfully!";
}
?>
<!DOCTYPE html>
<html>
<head><title>PHP Form</title></head>
<body>
    <h1>Submit a Name</h1>
    <?php if ($message) echo "<p style='color:green;'>$message</p>"; ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Enter your name" required>
        <button type="submit">Save</button>
    </form>
    <br>
    <a href="view.php">View All Names</a>
</body>
</html>
