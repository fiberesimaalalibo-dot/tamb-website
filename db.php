<?php

$databaseUrl = getenv('DATABASE_URL');

if (!$databaseUrl) {
    die("DATABASE_URL environment variable is not set.");
}

$dbparams = parse_url($databaseUrl);

$host = $dbparams['host'];
$port = $dbparams['port'] ?? 5432;
$user = $dbparams['user'];
$pass = $dbparams['pass'];
$dbname = ltrim($dbparams['path'], '/');

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}