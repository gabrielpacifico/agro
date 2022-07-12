<?php
include_once('../include/connect.php');

$id = mysqli_real_escape_string($conexao, $_GET['id']);
$ano = mysqli_real_escape_string($conexao, $_GET['ano']);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações ovino</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="../bootstrap/bootstrap-iso.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
</head>

<body>

    <nav class="navbar">    
        <!-- <img src="../img/logo.png" class="logo"> -->
        <h2 class="title-nav"> <a href="index.php" class="text-decoration"> Teste Agro </a> </h2>
        <div class="dropdown">
            <button class="dropbtn">Criações
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="bovinos.php" id="item">Bovinos</a>
                <a href="caprinos.php" id="item">Caprinos</a>
                <a href="ovinos.php" id="item">Ovinos</a>
            </div>
        </div>
    </nav>

    <?php

    $sql = "SELECT * FROM `$ano` WHERE id = $id";
    $res = mysqli_query($conexao, $sql);

    while ($array = mysqli_fetch_assoc($res)) {
        $id = $array['id'];
        $especie = $array['especie'];
        $ref_animal = $array['ref_animal'];
        $vacina = $array['vacina'];
        $vacina2 = $array['vacina2'];
        $vacina3 = $array['vacina3'];
        $vacina4 = $array['vacina4'];
        $vacina5 = $array['vacina5'];
        $vacina6 = $array['vacina6'];
        $vacina7 = $array['vacina7'];
        $vacina8 = $array['vacina8'];
        $data_vacina = $array['data_vacina'];
        $data_vacina2 = $array['data_vacina2'];
        $data_vacina3 = $array['data_vacina3'];
        $data_vacina4 = $array['data_vacina4'];
        $data_vacina5 = $array['data_vacina5'];
        $data_vacina6 = $array['data_vacina6'];
        $data_vacina7 = $array['data_vacina7'];
        $data_vacina8 = $array['data_vacina8'];
        $data_vacina_convert = date('d/m/Y', strtotime($data_vacina));
        $data_vacina2_convert = date('d/m/Y', strtotime($data_vacina2));
        $data_vacina3_convert = date('d/m/Y', strtotime($data_vacina3));
        $data_vacina4_convert = date('d/m/Y', strtotime($data_vacina4));
        $data_vacina5_convert = date('d/m/Y', strtotime($data_vacina5));
        $data_vacina6_convert = date('d/m/Y', strtotime($data_vacina6));
        $data_vacina7_convert = date('d/m/Y', strtotime($data_vacina7));
        $data_vacina8_convert = date('d/m/Y', strtotime($data_vacina8));
        $reproducao = $array['reproducao'];
        $observacao = $array['observacao'];


    ?>

        <div class="caprinos">
            <h1 class="title-cap"> Informações do(a) ovino <strong><?= $ref_animal ?></strong></h1>
        </div>
        <h2 class="subtitle-cap">Ano de <?= $ano ?></h2>

        <a href="caprinos.php" class="btn-voltar"><i class="fa-solid fa-arrow-left"></i></a>

<!-- INFORMAÇÕES SOBRE O ANIMAL -->
<header class="main">
        <section class="quadro">
            <span class="itens-info">Espécie: <?= $especie ?> </span>
            <span class="itens-info">Ref animal: <?= $ref_animal ?> </span>
            <span class="itens-info">Reprodução:
                <?php if ($reproducao == NULL) {
                    echo "Não reproduziu";
                } else {
                    echo $reproducao;
                }
                ?> </span>
            <span class="itens-info">Observações sobre o animal:
                <?php if ($observacao == NULL) {
                    echo "<strong> Nenhuma observação sobre o animal</strong>.";
                } else {
                    echo $observacao;
                }
                ?> </span>
        </section>

<!-- INFORMAÇÕES VACINA 1 -->

        <section class="quadro">
            <div class="info">
                <span class="itens-info"><strong>Primeira vacina</strong></span>
                <span class="itens-info">Vacina: <?= $vacina ?> </span>
                <span class="itens-info">Data da vacina: <?= $data_vacina_convert ?> </span>
            </div>
        </section>

<!-- INFORMAÇÕES VACINA 2 -->

        <?php

        if ($vacina2 == NULL && ($data_vacina2 == "0000-00-00" || $data_vacina2 == NULL )) {
            echo "";
        } else {
            echo "  
            <section class='quadro'>
                <div class='info'>
                    <span><strong>Segunda vacina</strong></span>
                    <span class='itens-info'>Vacina: $vacina2 </span>
                    <span class='itens-info'>Data da vacina: $data_vacina2_convert </span>
                </div>
            </section>";
        }
        ?>

<!-- INFORMAÇÕES VACINA 3 -->

        <?php

        if ($vacina3 == NULL && ($data_vacina3 == "0000-00-00" || $data_vacina3 == NULL )) {
            echo "";
        } else {
            echo "  
            <section class='quadro'>
                <div class='info'>
                    <span><strong>Terceira vacina</strong></span>
                    <span class='itens-info'>Vacina: $vacina3 </span>
                    <span class='itens-info'>Data da vacina: $data_vacina3_convert </span>
                </div>
            </section>";
        }
        ?>

<!-- INFORMAÇÕES VACINA 4 -->

        <?php

        if ($vacina4 == NULL && ($data_vacina4 == "0000-00-00" || $data_vacina4 == NULL )) {
            echo "";
        } else {
            echo "  
            <section class='quadro'>
                <div class='info'>
                    <span><strong>Quarta vacina</strong></span>
                    <span class='itens-info'>Vacina: $vacina4  </span>
                    <span class='itens-info'>Data da vacina: $data_vacina4_convert </span>
                </div>
            </section>";
        }
        ?>

<!-- INFORMAÇÕES VACINA 5 -->

        <?php

        if ($vacina5 == NULL && ($data_vacina5 == "0000-00-00" || $data_vacina5 == NULL )) {
            echo "";
        } else {
            echo "  
            <section class='quadro'>
                <div class='info'>
                    <span><strong>Quinta vacina</strong></span>
                    <span class='itens-info'>Vacina: $vacina5 </span>
                    <span class='itens-info'>Data da vacina: $data_vacina5_convert </span>
                </div>
            </section>";
        }
        ?>

<!-- INFORMAÇÕES VACINA 6 -->

        <?php

        if ($vacina6 == NULL && ($data_vacina6 == "0000-00-00" || $data_vacina6 == NULL )) {
            echo "";
        } else {
            echo "  
            <section class='quadro'>
                <div class='info'>
                    <span><strong>Sexta vacina</strong></span>
                    <span class='itens-info'>Vacina: $vacina6 </span>
                    <span class='itens-info'>Data da vacina: $data_vacina6_convert </span>
                </div>
            </section>";
        }
        ?>

<!-- INFORMAÇÕES VACINA 7 -->

        <?php

        if ($vacina7 == NULL && ($data_vacina7 == "0000-00-00" || $data_vacina7 == NULL )) {
            echo "";
        } else {
            echo "  
            <section class='quadro'>
                <div class='info'>
                    <span><strong>Sétima vacina</strong></span>
                    <span class='itens-info'>Vacina: $vacina7 </span>
                    <span class='itens-info'>Data da vacina: $data_vacina7_convert </span>
                </div>
            </section>";
        }
        ?>

<!-- INFORMAÇÕES VACINA 8 -->

        <?php

        if ($vacina8 == NULL && ($data_vacina8 == "0000-00-00" || $data_vacina8 == NULL )) {
            echo "";
        } else {
            echo "  
            <section class='quadro'>
                <div class='info'>
                    <span><strong>Oitava vacina</strong></span>
                    <span class='itens-info'>Vacina: $vacina8 </span>
                    <span class='itens-info'>Data da vacina: $data_vacina8_convert </span>
                </div>
            </section>";
        }
        ?>
        
</header>
    <?php } ?>
</body>

</html>