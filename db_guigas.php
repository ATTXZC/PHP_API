<?php
$servername = "localhost";
$username = "root";
$password = "nova_senha";
$dbname = "forms";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

echo "Conectado ao banco de dados $dbname\n";

?>
