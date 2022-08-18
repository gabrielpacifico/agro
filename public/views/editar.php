<?php
session_start();
include_once('../include/connect.php');

$usuario = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edição | Caprinos, Bovinos e Caprinos</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/edit.css">
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

<body>

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
        <div class="text">Edição | <strong> Caprinos, Bovinos e Ovinos </div>

        <?php
        if (isset($_SESSION['blank-spaces'])) {
        ?>

            <span class="alert-edit">Campos requiridos vazios, tente novamente!</span>

        <?php
        }
        unset($_SESSION['blank-spaces'])
        ?>

        <!-- FILTROS DE ANO E ESPÉCIE -->
        <form action="buscar-ref.php" method="GET">
            <div class="filters-edit">
                <span class="filter-span">Pesquisar por: </span>
                <input type="text" placeholder="Ref. Animal" name="ref_animal" class="options2" autocomplete="off">
                <button type="submit" class="btn-green">Pesquisar</button>
        </form>

        <form action="edit-filter.php" method="GET">
            <div class="filter">
                <span class="filter-span">Filtrar por: </span>

                <select name="ano" class="options">
                    <option value="" selected>Ano</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>

                <select name="especie" class="options">
                    <option value="" selected>Espécie</option>
                    <option value="Caprinos">Caprinos</option>
                    <option value="Bovinos">Bovinos</option>
                    <option value="Ovinos">Ovinos</option>
                </select>

                <button type="submit" class="btn-green">Filtrar</button>
            </div>
        </form>

        </div>




        <!-- FIM FILTROS -->

        <section class="table bootstrap-iso" id="table" style="font-weight: 400;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Espécie</th>
                        <th scope="col">Ref animal</th>
                        <th scope="col">Vacina</th>
                        <th scope="col">Data da 1ª Vacina</th>
                        <th scope="col">Reprodução</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

                    $sql = "SELECT * FROM animais ORDER BY especie, data_vacina ASC";
                    $buscar = mysqli_query($conexao, $sql);

                    /** Variável que vai definir quantos registros por página = 20 */
                    $reg_por_pag = "30";

                    $total_registros = mysqli_num_rows($buscar);
                    $total_paginas = ceil($total_registros / $reg_por_pag);

                    /** Define a página que sempre vai começar sendo exibida, no caso sempre a primeira */
                    $inicio = ($reg_por_pag * $pag) - $reg_por_pag;

                    /** Vai definir o limite de registros que irão ser exibidos */
                    $limite = mysqli_query($conexao, "$sql LIMIT $inicio, $reg_por_pag");

                    $links_laterais = 5;

                    // variáveis para o loop
                    $inicio2 = $pag - $links_laterais;
                    $limite2 = $pag + $links_laterais;

                    /** Variáveis para os botões de próximo e anterior */
                    $anterior = $pag - 1;
                    $proximo = $pag + 1;

                    while ($loop = mysqli_fetch_assoc($limite)) {
                        $id = $loop['id'];
                        $especie = $loop['especie'];
                        $ref_animal = $loop['ref_animal'];
                        $vacina = $loop['vacina'];
                        $data_vacina = $loop['data_vacina'];
                        $data_vacina_convert = date('d/m/Y', strtotime($data_vacina));
                        $reproducao = $loop['reproducao'];

                    ?>
                        <tr onclick="location.href='editar-especie.php?id=<?= $id ?>&ref_animal=<?= $ref_animal ?>'" class="link-table">
                            <th> <?= $especie ?> </th>
                            <td> <?= $ref_animal ?> </td>
                            <td> <?= $vacina ?> </td>
                            <td> <?= $data_vacina_convert ?> </td>
                            <td> <?php if ($reproducao == NULL) {
                                        echo "Não reproduziu";
                                    } else {
                                        echo $reproducao . " filhotes";
                                    } ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="pagination">
                <ul class="pagination">
                    <?php
                    if ($pag > 1) {

                    ?>
                        <li>
                            <a href="?pagina=<?php echo $anterior; ?>"><i class="fa-solid fa-angles-left"></i></a>
                        </li>
                    <?php } ?>


                    <?php
                    for ($i = $inicio2; $i <= $limite2; $i++) {
                        if ($i == $pag) {
                            echo "<li><a class='active' href='?pagina=$i'>$i</a></li>";
                        } else {
                            if ($i >= 1 && $i <= $total_paginas) {
                                echo "<li><a href='?pagina=$i'>$i</a></li>";
                            }
                        }
                    }
                    ?>


                    <?php
                    if ($pag < $total_paginas) {

                    ?>
                        <li>
                            <a href="?pagina=<?php echo $proximo; ?>"><i class="fa-solid fa-angles-right"></i></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="total_registros">Registros encontrados: <?= $total_registros ?></div>
            
        </section>
    </section>

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