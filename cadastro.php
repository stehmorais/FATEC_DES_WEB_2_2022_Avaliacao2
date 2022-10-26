<?php


include('config.php');
Mysql::conectar();

session_start();

// só vou conseguir acessar o cadastro, se eu estiver logada
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Cadastro de novo usuario</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <br>
        <?php

        if (isset($_POST['acao']) && $_POST['form'] == 'f_form') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($nome == '') {
                Form::alert('erro', 'o campo nome ficou vazio');
            } else if ($email == '') {
                Form::alert('erro', 'o campo email ficou vazio');
            } else if ($senha == '') {
                Form::alert('erro', 'o campo senha ficou vazio');
            } else {
                Form::cadastrar($nome, $email, $senha);
                Form::alert('sucesso', 'Usuario ' . $nome . ' cadastrado com sucesso');
            }
        }

        ?>

        <h1>Página de cadastro de novo usuário</h1>
        <form action="dados.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Nome:</label>
                <input type="text" name="nome" placeholder="Nome" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email:</label>
                <input type="email" name="email" placeholder="E-mail" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha:</label>
                <input type="password" name="senha" placeholder="Senha" class="form-control">
            </div>
            <input type="submit" name="acao" value="Cadastrar" class="btn btn-primary mb-9">
            <div class="mb-3">
                <input type="hidden" name="form" value="f_form">
            </div>
        </form>

        <a href="navegacao.php">Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>