<?php

require_once 'db.php';

$username = 'admin';
$password = 'AdminAla123!';

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin_users (username, password_hash)
        VALUES (:username, :password_hash)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':username' => $username,
    ':password_hash' => $password_hash
]);

echo "Admin account created successfully.";