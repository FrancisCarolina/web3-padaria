<?php
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $cliente = new Cliente($conexao);

    //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];

        $cliente->setId($id);
        $cliente->setNome($nome);
        $cliente->setTelefone($telefone);
        $cliente->setEmail($email);
        $cliente->setCPF($cpf);

        if ($cliente->update()) {
            echo "Cliente editado com sucesso!";
            header("Refresh:1;url=listarCliente.php");
        }else {
            echo "Erro ao editado o cliente!";
        }

    //}
?>
