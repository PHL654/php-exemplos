<!-- Passar id via URL -->
<!-- http://localhost/php-basico-out-2024/12_atualizar.php?id=1-->


<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inicializa a variável $cliente como null
$cliente = null;

// Verifica se um ID foi passado via URL para edição
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id='$id'";
    $result = $conn->query($sql);

    // Verifica se encontrou um registro no banco de dados
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado.";
        exit();
    }
}


// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// verifica a conexao
if ($conn->connect_error) {
    die("falha na conexao" . $conn->connect_error);
}

// inicializa a variavel $cliente como null
$cliente = null;

// verifica se um ID foi passado via URL para ediçao
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id= ' $id'";
    $result = $conn->query($sql);

    // verifica se encontrou um registro no banco de dados
    if ($result->num_rown > 0) {
        $cliente - $result->fetch_assoc();
    } else {
        echo "cliente nao encontrado";
        exit();
    }
}

// verifica se o formulario foi eviado para atuaçizar o cliente
if ($_SERVER[   'REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE clientes SET nome= '$nome', email = '$email' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>cliente atualizado com sucesso</p>";
    } else {
        "echo <p>erro ao atualizar cliente: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $cliente['id'] ?? ''; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo isset($cliente['nome']) ? $cliente['nome'] : ''; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($cliente['email']) ? $cliente['email'] : ''; ?>" required><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>