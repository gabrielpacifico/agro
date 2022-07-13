<?php
session_start();
include_once('../include/connect.php');

$usuario = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel de Cadastros | Bovinos, caprinos e ovinos </title>
  <link rel="icon" type="image/x-icon" href="../img/favicon.png">
  <link rel="stylesheet" href="../css/painel.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="../css/caprinos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../bootstrap/bootstrap-iso.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <div class="sidebar">
    <div class="logo-details">
      <div class="logo_name">Teste Agro</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="index.php">
          <i class="fa-solid fa-house"></i>
          <span class="links_name">Página Inicial</span>
        </a>
        <span class="tooltip">Página Inicial</span>
      </li>

      <li>
        <a href="painel-cadastros.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Painel de Cadastros</span>
        </a>
        <span class="tooltip">Painel de Cadastros</span>
      </li>

      <li>
        <a href="cadastro-caprinos.php">
          <i class="fa-solid fa-plus" id="icon-rotate"></i>
          <span class="links_name">Caprinos</span>
        </a>
        <span class="tooltip">Caprinos</span>
      </li>

      <li>
        <a href="cadastro-bovinos.php">
          <i class="fa-solid fa-plus" id="icon-rotate"></i>
          <span class="links_name">Bovinos</span>
        </a>
        <span class="tooltip">Bovinos</span>
      </li>

      <li>
        <a href="cadastro-ovinos.php">
          <i class="fa-solid fa-plus" id="icon-rotate"></i>
          <span class="links_name">Ovinos</span>
        </a>
        <span class="tooltip">Ovinos</span>
      </li>

      <li>
        <a href="editar.php">
          <i class='bx bx-edit'></i>
          <span class="links_name">Editar</span>
        </a>
        <span class="tooltip">Editar</span>
      </li>

      <li>
      <li class="profile">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->
          <div class="name_job">
            <div class="name"><?= $usuario ?></div>
            <div class="job">Administrador</div>
          </div>
          <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
        </div>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">Painel de Cadastros | Caprinos, Bovinos e Ovinos.</div>

    <div class="tables-cadastro">
      <a href="cadastro-caprinos.php">
        <div class="quadro-cadastro">
          <h1 class="title-quadro">Cadastrar Caprinos</h1>
          <p class="subtitle-quadro">Cadastre seu rebanho de bodes e cabras</p>
        </div>
      </a>

      <a href="cadastro-bovinos.php">
        <div class="quadro-cadastro2">
          <h1 class="title-quadro">Cadastrar Bovinos</h1>
          <p class="subtitle-quadro">Cadastre sua criação de vacas e bois</p>
        </div>
      </a>

      <a href="cadastro-ovinos.php">
        <div class="quadro-cadastro3">
          <h1 class="title-quadro">Cadastrar Ovinos</h1>
          <p class="subtitle-quadro">Cadastre seu rebanho de ovelhas e carneiros</p>
        </div>
      </a>

    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      menuBtnChange();
    });

    searchBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      menuBtnChange();
    });


    function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }
  </script>

</body>

</html>