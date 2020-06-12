<?php
session_start();
include_once ("conexao.php");

$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "email: $email <br>";

$result_clientes = "INSERT INTO clientes (nome, email, created) VALUES ('$nome', '$email', NOW())";
$resultado_clientes = mysqli_query($conn, $result_clientes);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Cadastrado realizado</p>";
    header("Location: blank.html");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Cadastrado não efetuado</p>";
    header("Location: blank.html");
}