<?php
$servername = "tutorial-db-instance.chuqysi8aqxp.sa-east-1.rds.amazonaws.com";
$username = "tutorial_user";
$password = "luccabancodedados";
$database = "sample";

// Criando a conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificando a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
echo "Conexão bem-sucedida ao banco de dados!";
?>

