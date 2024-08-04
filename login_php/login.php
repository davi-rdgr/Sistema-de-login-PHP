<?php
if(isset($_POST['email'])) {
    include("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM senhas WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->errno);

    $usuario = $sql_exec->fetch_assoc();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        if(!isset($_SESSION)) {
            session_start();
            $_SESSION['usuario'] = $usuario['id'];
            header("Location: index.php");
        } 
        echo "Usuário logado";
    } else {
        echo "Falha ao logar: senha ou email incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="email">Email: </label> <br>
        <input type="email" name="email" id="">
        <br> <br>
        <label for="senha">Senha: </label> <br>
        <input type="password" name="senha" id="">
        <br> <br>
        <input type="submit" value="Logar">

    </form>
    <a href="login.php">Ir para cadastro</a>
</body>
</html>