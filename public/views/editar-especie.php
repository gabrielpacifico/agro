<?php
session_start();
include_once('../include/connect.php');

$usuario = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}

$id = mysqli_real_escape_string($conexao, $_GET['id']);
$ano = mysqli_real_escape_string($conexao, $_GET['ano']);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edição | Caprinos, Bovinos e Caprinos </title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/cadastros.css">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap-iso.css">
    <link rel="stylesheet" href="../css/edit.css">
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

    <?php

    $codesql = "SELECT * FROM `$ano` WHERE id = '$id'";
    $res = mysqli_query($conexao, $codesql) or die(mysqli_error($conexao));

    while ($array = mysqli_fetch_assoc($res)) {
        $id = $array['id'];
        $especie = $array['especie'];
        $ref_animal = $array['ref_animal'];
        $sexo = $array['sexo'];
        $vacina = $array['vacina'];
        $data_vacina = $array['data_vacina'];
        $vacina2 = $array['vacina2'];
        $data_vacina2 = $array['data_vacina2'];
        $vacina3 = $array['vacina3'];
        $data_vacina3 = $array['data_vacina3'];
        $vacina4 = $array['vacina4'];
        $data_vacina4 = $array['data_vacina4'];
        $vacina5 = $array['vacina5'];
        $data_vacina5 = $array['data_vacina5'];
        $vacina6 = $array['vacina6'];
        $data_vacina6 = $array['data_vacina6'];
        $vacina7 = $array['vacina7'];
        $data_vacina7 = $array['data_vacina7'];
        $vacina8 = $array['vacina8'];
        $data_vacina8 = $array['data_vacina8'];
        $reproducao = $array['reproducao'];
        $observacao = $array['observacao'];
        $data_vacina_convert = date('d/m/Y', strtotime($data_vacina));
        $data_vacina2_convert = date('d/m/Y', strtotime($data_vacina2));
        $data_vacina3_convert = date('d/m/Y', strtotime($data_vacina3));
        $data_vacina4_convert = date('d/m/Y', strtotime($data_vacina4));
        $data_vacina5_convert = date('d/m/Y', strtotime($data_vacina5));
        $data_vacina6_convert = date('d/m/Y', strtotime($data_vacina6));
        $data_vacina7_convert = date('d/m/Y', strtotime($data_vacina7));
        $data_vacina8_convert = date('d/m/Y', strtotime($data_vacina8));
    

    ?>

    <section class="home-section">
        <div class="text">Editar | <strong> <?= $ref_animal ?> </strong> </div>

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
            <form action="edit-complete.php" method="POST">

                    <input type="text" class="form-control" name="id" value="<?= $id ?>" id="input" style="display: none;" readonly required>

                <div class="input-group mb-3">
                    <span class="input-group-text">Espécie</span>
                    <input type="text" class="form-control" name="especie" value="<?= $especie ?>" id="input" readonly required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Ref. Animal</span>
                    <input type="text" class="form-control" name="ref_animal" value="<?= $ref_animal ?>" id="input" autocomplete="off" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Sexo</span>
                    <select name="sexo" class="form-select" autocomplete="off" id="input" required>
                        <option <?=($sexo == '')?'selected':''?> > Sexo </option>
                        <option <?=($sexo == 'Macho')?'selected': ''?> > Macho </option>
                        <option <?=($sexo == 'Femea')?'selected': ''?> > Fêmea </option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Reprodução</span>
                    <input type="number" class="form-control" name="reproducao" value="<?= $reproducao ?>" id="input" autocomplete="off">
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
                                    <input type="text" class="form-control" name="vacina1" value="<?= $vacina ?>" id="input" autocomplete="off" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina1" id="input" value="<?= $data_vacina ?>" autocomplete="off" required>
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
                                    <input type="text" class="form-control" name="vacina2" value="<?= $vacina2 ?>"  id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina2" id="input" value="<?= $data_vacina2 ?>" autocomplete="off">
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
                                    <input type="text" class="form-control" name="vacina3" value="<?= $vacina3 ?>" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina3" id="input" value="<?= $data_vacina3 ?>" autocomplete="off">
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
                                    <input type="text" class="form-control" name="vacina4" value="<?= $vacina4 ?>" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina4" id="input" value="<?= $data_vacina4 ?>" autocomplete="off">
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
                                    <input type="text" class="form-control" name="vacina5" value="<?= $vacina5 ?>" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina5" id="input" value="<?= $data_vacina5 ?>" autocomplete="off">
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
                                    <input type="text" class="form-control" name="vacina6" value="<?= $vacina6 ?>" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina6" id="input" value="<?= $data_vacina6 ?>" autocomplete="off">
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
                                    <input type="text" class="form-control" name="vacina7" value="<?= $vacina7 ?>" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina7" id="input" value="<?= $data_vacina7 ?>" autocomplete="off">
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
                                    <input type="text" class="form-control" name="vacina8" value="<?= $vacina8 ?>" id="input" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data aplicação</span>
                                    <input type="date" class="form-control" name="date_vacina8" id="input" value="<?= $data_vacina8 ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="obs" value="<?= $observacao ?>" name="observacao"></input>
                        <label for="floatingTextarea">Observações</label>
                    </div>

                </div>

                <div class="btns-cadastro">
                    <button type="button" onclick="window.location.href='painel-cadastros.php'" id="btn-back">Voltar</button>
                    <button type="submit" id="btn-send-edit" onclick="return confirm('Tem certeza que quer editar <?= $ref_animal ?>?')"> Concluir </button>
                    <button type="button" onclick="window.location.href='remove-especie.php?id=<?= $id ?>&ano=<?= $ano_atual ?>'" id="btn-remove">Excluir</button>
                </div>
            </form>
        </div>
<?php } ?>
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