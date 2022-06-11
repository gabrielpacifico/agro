<?php
include_once('../include/connect.php');
    
$ano_atual = date('Y');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebanho de caprinos</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="../bootstrap/bootstrap-iso.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
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

    <div class="caprinos">
        <h1 class="title-cap"> Informações de todos os <strong>caprinos</strong></h1>
    </div>
    <h2 class="subtitle-cap">Ano de <?= $ano_atual ?></h2>

    <a href="index.php" class="btn-voltar"><i class="fa-solid fa-arrow-left"></i></a>

    <!-- FILTROS DE ANO E ESPÉCIE -->
    <form action="caprinos-filter.php" method="GET">
        <div class="filters">
            <span class="filter-span">Filtrar por: </span>
            <div class="year">
                <select name="ano" class="options" required>
                    <option value="" selected>Ano</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>

            <!-- <div class="especie">
                <select class="options">
                    <option value="" selected>Espécie</option>
                    <option value="Caprinos">Caprinos</option>
                    <option value="Bovinos">Bovinos</option>
                </select>
            </div> -->
            <button type="submit" class="btn-green">Filtrar</button>
    </form>
    </div>
    <!-- FIM FILTROS -->

    <section class="table bootstrap-iso" id="table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Espécie</th>
                    <th scope="col">Ref animal</th>
                    <th scope="col">Vacina</th>
                    <th scope="col">Data da Vacina</th>
                    <th scope="col">Reprodução</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

                $sql = "SELECT * FROM `$ano_atual` WHERE especie = 'Caprinos'";
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
                    <tr onclick="location.href='info-caprino.php?id=<?= $id ?>&ano=<?= $ano_atual ?>'" class="link-table">
                        <th scope="row"> <?= $especie ?> </th>
                        <td> <?= $ref_animal ?> </td>
                        <td> <?= $vacina ?> </td>
                        <td> <?= $data_vacina_convert ?> </td>
                        <td> <?php if($reproducao == NULL){
                            echo "Não reproduziu";
                        }else{
                            echo $reproducao;
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
        <div class="total_registros">Caprinos cadastrados: <?=$total_registros?></div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>