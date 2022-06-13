<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <!-- <img src="../img/logo.png" class="logo"> -->
    <h2 class="title-nav"> <a href="index.php" class="text-decoration"> Teste Agro </a> </h2>
    <ul class="ul-links">
        <li class="link-item"> <a href="bovinos.php" class="link"> Bovinos </a></li>
        <li class="link-item"> <a href="caprinos.php" class="link"> Caprinos </a></li>
    </ul>
</nav>

<header class="header">
    <div class="content">
        <h1 class="title">
            <span class="link-maior">Teste <span class="link-modified"> agro </span></span>
            <span class="link-menor">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi et quo necessitatibus. </span>
            <a href="login.php" type="buttom" class="btn-transparent"> Acessar </a>
        </h1>
    </div>
</header>

<div class="tables">
    <div class="grid">
        <img src="../img/ovelhas.jpg" class="img-cards">
        <h2 class="cards"> Acesse as informações do rebanho de caprinos </h2>
        <p class="description"> Veja a tabela com todos os cadastros relacionados a <strong> caprinos</strong>.</p>
        <a href="caprinos.php" class="btn-black"> Acessar </a>
    </div>

    <div class="grid">
        <img src="../img/vacas.png" class="img-cards">
        <h2 class="cards"> Acesse as informações do rebanho de bovinos </h2>
        <p class="description"> Veja a tabela com todos os cadastros relacionados a <strong> bovinos</strong>.</p>
        <a href="bovinos.php" class="btn-black"> Acessar </a>
    </div>
</div>

<footer class="footer">
    <p class="text-footer">Todos os direitos reservados à Prática Informática | Desenvolvido por: &nbsp;<a href="https://github.com/gabrielpacifico" class="link-copy" target="_blank"> @Gabriel Pacífico </a></p>
</footer>
    
</body>
</html>