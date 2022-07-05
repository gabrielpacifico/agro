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
    <title>Cadastro de Caprinos</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
    <link rel="stylesheet" href="../css/cadastros.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap-iso.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
                <a href="painel-cadastros.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Painel de Cadastros</span>
                </a>
                <span class="tooltip">Painel de Cadastros</span>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-plus" id="icon-rotate"></i>
                    <span class="links_name">Caprinos</span>
                </a>
                <span class="tooltip">Caprinos</span>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-plus" id="icon-rotate"></i>
                    <span class="links_name">Bovinos</span>
                </a>
                <span class="tooltip">Bovinos</span>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-plus" id="icon-rotate"></i>
                    <span class="links_name">Ovinos</span>
                </a>
                <span class="tooltip">Ovinos</span>
            </li>

            <li>
                <a href="#">
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
        <div class="text">Cadastro | <strong> Caprinos </strong> </div>

        <div class="form-area bootstrap-iso">
            <form action="#" method="POST">

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#primeira-vacina">
                                Primeira Vacina
                            </button>
                        </h2>
                        <div id="primeira-vacina" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina1" placeholder="Nome da vacina11111111" id="input" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina1" id="input" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#segunda-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Segunda Vacina
                            </button>
                        </h2>
                        <div id="segunda-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina2" placeholder="Nome da vacina2222222" id="input">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina2" id="input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#terceira-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Terceira Vacina
                            </button>
                        </h2>
                        <div id="terceira-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                        <span class="input-group-text">Vacina</span>
                        <input type="text" class="form-control" name="vacina3" placeholder="Nome da vacina333333333333" id="input">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Data aplicação</span>
                        <input type="date" class="form-control" name="date_vacina3" id="input">
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function hiddenVac2() {
            const hidden = document.getElementById("hidden-vac2");
            if (hidden.style.display === "block") {
                hidden.style.display = "none";
            } else {
                hidden.style.display = "block";
            }
        }

        function hiddenVac3() {
            const hidden = document.getElementById("hidden-vac3");
            if (hidden.style.display === "block") {
                hidden.style.display = "none";
            } else {
                hidden.style.display = "block";
            }
        }

        function hiddenVac4() {
            const hidden = document.getElementById("hidden-vac4");
            if (hidden.style.display === "block") {
                hidden.style.display = "none";
            } else {
                hidden.style.display = "block";
            }
        }

        function hiddenVac5() {
            const hidden = document.getElementById("hidden-vac5");
            if (hidden.style.display === "block") {
                hidden.style.display = "none";
            } else {
                hidden.style.display = "block";
            }
        }

        function hiddenVac6() {
            const hidden = document.getElementById("hidden-vac6");
            if (hidden.style.display === "block") {
                hidden.style.display = "none";
            } else {
                hidden.style.display = "block";
            }
        }

        function hiddenVac7() {
            const hidden = document.getElementById("hidden-vac7");
            if (hidden.style.display === "block") {
                hidden.style.display = "none";
            } else {
                hidden.style.display = "block";
            }
        }

        function hiddenVac8() {
            const hidden = document.getElementById("hidden-vac8");
            if (hidden.style.display === "block") {
                hidden.style.display = "none";
            } else {
                hidden.style.display = "block";
            }
        }

        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", () => {
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