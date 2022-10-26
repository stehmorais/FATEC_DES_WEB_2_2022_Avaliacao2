<?php

session_start();

// se minha sessão for destruida ou não efetuar o login, volto para pagina index.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$arquivo = "arquivo.txt";


if(!file_exists($arquivo)){
    $arquivoAberto = fopen($arquivo, "w");
} else {
    $arquivoAberto = fopen($arquivo, "a");
}

fwrite($arquivoAberto, "Nome: $nome | Email: $email | Senha: $senha\n");

fflush($arquivoAberto);

fclose($arquivoAberto);

$arquivoAberto = fopen($arquivo, "r");
while (!feof($arquivoAberto)) { 
        $line = fgets($arquivoAberto);
        echo $line ."<br>"; 
    }
fclose($arquivoAberto); 

?>