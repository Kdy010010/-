<?php
$host = 'localhost';
$db   = 'my_database';
$user = 'username';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$sql = "SELECT * FROM files";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch())
{
    echo "<h2>".$row['filename']."</h2>";
    echo "<img src='data:image/jpeg;base64," . base64_encode( $row['data'] ) . "' />";
}
?>
