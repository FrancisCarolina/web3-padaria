<?php
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $cliente = new Cliente($conexao);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $cliente->readById($id);
        $clienteData = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        die("Cliente não encontrado.");
    }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h3>Editar Cliente</h3>
    <form method="POST" action="editaCliente.php">
        <input type="hidden" name="id" value="<?php echo $clienteData['id']; ?>">
        <p>Nome: <input type="text" name="nome" value="<?php echo $clienteData['nome']; ?>" required></p>
        <p>Telefone: <input type="text" name="telefone" value="<?php echo $clienteData['telefone']; ?>" required></p>
        <p>Email: <input type="text" name="email" value="<?php echo $clienteData['email']; ?>" required></p>
        <p>Cpf: <input type="text" name="cpf" value="<?php echo $clienteData['cpf']; ?>" required></p>
        <p><button type="submit">Atualizar</button></p>
    </form>
</body>
</html>
