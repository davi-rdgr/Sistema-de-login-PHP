<?php

if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['usuario'])) {
    die('Você não está logado!. <a href="login.php">Clique aqui para logar</a>');
}

if (isset($_POST['email'])) {
    include("conexao.php");
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO senhas (email, senha) VALUES ('$email', '$senha')");
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Php</title>
</head>

<body>
    <h1>Cadastro</h1>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email"> <br> <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id=""> <br> <br>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php">Ir para login</a>
    <a href="logout.php">Logout</a>
</body>

</html>