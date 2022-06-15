<?php
session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Cadastros | Bovinos e caprinos </title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <!-- <img src="../img/logo.png" class="logo"> -->
    <h2 class="title-nav"> <a href="index.php" class="text-decoration"> Teste Agro </a> </h2>
    <ul class="ul-links">
        <li class="item-link"> Bem Vindo(a) <?=$usuario?> </li>
        <li class="item-link"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" id="icon-user"></i></a> </li>
    </ul>
</nav>
    
</body>
</html>