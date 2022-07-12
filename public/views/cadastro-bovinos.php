
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
    <title>Cadastro de Bovinos</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/cadastros.css">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap-iso.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body id="cadastro">

    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name"><a href="index.php" style="color: #fff"> Teste Agro </a></div>
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
        <div class="text">Cadastro | <strong> Bovinos </strong> </div>

        <?php
        if (isset($_SESSION['blank-spaces'])) {
        ?>

            <span class="alert">Campos requiridos vazios, tente novamente!</span>

        <?php
        }
        unset($_SESSION['blank-spaces'])
        ?>

        <?php
        if (isset($_SESSION['year-invalid'])) {
        ?>

            <span class="alert">Ano preenchido <strong> inválido </strong>, os anos aceitos são: 2022, 2023, 2024, 2025 e 2026!</span>

        <?php
        }
        unset($_SESSION['year-invalid'])
        ?>

        <div class="form-area bootstrap-iso">
            <form action="insert-bovinos.php" method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text">Espécie</span>
                    <input type="text" class="form-control" name="especie" value="Bovinos" id="input" readonly required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Ref. Animal</span>
                    <input type="text" class="form-control" name="ref_animal" placeholder="Referência do animal" id="input" autocomplete="off" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Sexo</span>
                    <select name="sexo" class="form-select" autocomplete="off" id="input" autocomplete="off" required>
                        <option value="" selected>Sexo</option>
                        <option value="Macho">Macho</option>
                        <option value="Femea">Fêmea</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Reprodução</span>
                    <input type="number" class="form-control" name="reproducao" placeholder="Quant. filhotes(apenas números)" id="input" autocomplete="off">
                </div>

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#primeira-vacina">
                                1ª Vacina
                            </button>
                        </h2>
                        <div id="primeira-vacina" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina1" placeholder="Nome da 1ª vacina" id="input" autocomplete="off" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina1" id="input" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#segunda-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                2ª Vacina
                            </button>
                        </h2>
                        <div id="segunda-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina2" placeholder="Nome da 2ª vacina" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina2" id="input" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#terceira-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                3ª Vacina
                            </button>
                        </h2>
                        <div id="terceira-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina3" placeholder="Nome da 3ª vacina" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina3" id="input" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#quarta-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                4ª Vacina
                            </button>
                        </h2>
                        <div id="quarta-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina4" placeholder="Nome da 4ª vacina" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina4" id="input" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#quinta-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                5ª Vacina
                            </button>
                        </h2>
                        <div id="quinta-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina5" placeholder="Nome da 5ª vacina" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina5" id="input" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sexta-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                6ª Vacina
                            </button>
                        </h2>
                        <div id="sexta-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina6" placeholder="Nome da 6ª vacina" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina6" id="input" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#setima-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                7ª Vacina
                            </button>
                        </h2>
                        <div id="setima-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina7" placeholder="Nome da 7ª vacina" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina7" id="input" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" id="accordion-oitavo">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#oitava-vacina" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                8ª Vacina
                            </button>
                        </h2>
                        <div id="oitava-vacina" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Vacina</span>
                                    <input type="text" class="form-control" name="vacina8" placeholder="Nome da 8ª vacina" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina8" id="input" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Observações" name="observacao"></textarea>
                        <label for="floatingTextarea">Observações</label>
                    </div>

                </div>

                <div class="btns-cadastro">
                    <button type="button" onclick="window.location.href='painel-cadastros.php'" id="btn-back">Voltar</button>
                    <button type="submit" id="btn-send"> Cadastrar </button>
                </div>
            </form>
        </div>

    </section>

    <footer class="footer">
        <p class="text-footer">Todos os direitos reservados à Prática Informática | Desenvolvido por: &nbsp;<a href="https://github.com/gabrielpacifico" class="link-copy" target="_blank"> @Gabriel Pacífico </a></p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
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