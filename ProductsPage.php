<?php include "../inc/dbinfo.inc"; ?>
<html>
<head>
    <title>Produtos</title>
</head>
<body>
<h1>Lista de Produtos</h1>

<?php
// Conectar ao banco de dados
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if (!$connection) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Adicionar novo produto
if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['quantity'])) {
    $name = htmlentities($_POST['name']);
    $description = htmlentities($_POST['description']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    $query = "INSERT INTO PRODUCTS (name, description, price, quantity) VALUES ('$name', '$description', $price, $quantity);";
    if (!mysqli_query($connection, $query)) {
        echo "<p>Erro ao adicionar produto: " . mysqli_error($connection) . "</p>";
    } else {
        echo "<p>Produto adicionado com sucesso!</p>";
    }
}
?>

<!-- Formulário para adicionar produto -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Nome:</label>
    <input type="text" name="name" required><br>
    <label>Descrição:</label>
    <textarea name="description"></textarea><br>
    <label>Preço:</label>
    <input type="number" step="0.01" name="price" required><br>
    <label>Quantidade:</label>
    <input type="number" name="quantity" required><br>
    <input type="submit" value="Adicionar Produto">
</form>

<h2>Lista de Produtos</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </tr>
    <?php
    // Listar produtos
    $result = mysqli_query($connection, "SELECT * FROM PRODUCTS");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['description']}</td>";
        echo "<td>{$row['price']}</td>";
        echo "<td>{$row['quantity']}</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
