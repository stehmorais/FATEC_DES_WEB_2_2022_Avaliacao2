<?php

session_start();

// se minha sessão for destruida ou não efetuar o login, volto para pagina index.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Nevagação</title>
    <style>
        h1{
            color: white;
        }
        .container{
            text-align: center;
        }
        .container a{
            text-decoration: none;
            color: purple;
        }

        .container .logout{
            color: red;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["nome"]); ?><b> Bem vinda </h1>

        <a href="cadastro.php">Cadastrar novo Usuario</a><br><br>

        <a class="logout" href="logout.php">Sair da conta</a>
        
    </div>
</body>

</html>