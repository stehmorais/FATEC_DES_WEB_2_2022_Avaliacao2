<?php 

  include('config.php');
  Mysql::conectar();

 
  // verificação de login p/ mudar de página
    // verificando qual solicitação foi usada para acessar a página
    if (isset($_POST['acao'])){
      $erros = array();

      if($_SERVER["REQUEST_METHOD"] == "POST"){
          session_start();
          if($_POST['nome'] == "Ester" and $_POST['senha'] == '86973'){
              $_SESSION['loggedin'] = TRUE;
              $_SESSION["nome"] = 'Ester';
              header("location: navegacao.php");
          }else{
               $_SESSION['loggedin'] = FALSE;
               $erros[] = "<li> Seu login falhou </li>";
          } 
      }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
   
      <?php

        if(isset($_POST['acao']) && $_POST['form'] == 'f_form'){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha']; 

            if($nome == ''){
              Form::alert('erro','o campo nome ficou vazio');
            }else if($email == ''){
              Form::alert('erro','o campo email ficou vazio');
            }else if($senha == ''){
              Form::alert('erro','o campo senha ficou vazio');
            }else{
              Form::cadastrar($nome,$email,$senha);
              Form::alert('sucesso','Usuario '.$nome.' cadastrado com sucesso');
            }   
        }

      ?>



    <div class="container">
      <br>
      <h1>Verificando Acesso</h1>
      <h3>Insira as informações necessarias para poder acessar o adastro de novos usuarios</h3>
      <br>
      <p>Use um email para sabermos quem é você, assim poderemos ter um controle de quem esta tentando entrar em nosso sistema.</p>
      <br>
        <form method="POST">
            <div class="mb-3">
              <label for="exampleInputText" class="form-label">Nome:</label>
              <input type="text"  name="nome" placeholder="Ester" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email:</label>
                <input type="email" name="email" placeholder="E-mail" class="form-control">
                <p style="color:gray">Obs: Suas informações estão seguras em nosso banco de dados</p>
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha:</label>
              <input type="password" name="senha" placeholder="86973" class="form-control">
            </div>
            <input type="submit" name="acao" value="Cadastrar" class="btn btn-primary">
            <div class="mb-3">
                <input type="hidden" name="form" value="f_form">
              </div>
          </form>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>