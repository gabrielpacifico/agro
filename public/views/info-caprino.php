<?php
include_once('../include/connect.php');

$id = $_GET['id'];
$ano = $_GET['ano'];

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações caprino</title>
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
        <ul class="ul-links">
            <li class="link-item"> <a href="bovinos.php" class="link"> Bovinos </a></li>
            <li class="link-item"> <a href="caprinos.php" class="link"> Caprinos </a></li>
        </ul>
    </nav>

    <?php

    $sql = "SELECT * FROM `$ano` WHERE id = $id";
    $res = mysqli_query($conexao, $sql);

    while ($array = mysqli_fetch_assoc($res)) {
        $id = $array['id'];
        $especie = $array['especie'];
        $ref_animal = $array['ref_animal'];
        $vacina = $array['vacina'];
        $data_vacina = $array['data_vacina'];
        $data_vacina_convert = date('d/m/Y', strtotime($data_vacina));
        $reproducao = $array['reproducao'];
        $observacao = $array['observacao'];
    

    ?>

    <div class="caprinos">
        <h1 class="title-cap"> Informações do(a) caprino <strong><?= $ref_animal ?></strong></h1>
    </div>
    <h2 class="subtitle-cap">Ano de <?= $ano ?></h2>

    <a href="caprinos.php" class="btn-voltar"><i class="fa-solid fa-arrow-left"></i></a>

    <section class="quadro">
        <div class="info">
            <span class="itens-info">Espécie: <?= $especie ?> </span>
            <span class="itens-info">Ref animal: <?= $ref_animal ?> </span>
            <span class="itens-info">Vacina: <?= $vacina ?> </span>
            <span class="itens-info">Data da vacina: <?= $data_vacina_convert ?> </span>
            <span class="itens-info">Reprodução: 
                <?php if($reproducao == NULL){
                echo "Não reproduziu";
                }else{
                    echo $reproducao;
                } 
                ?> </span>
            <span class="itens-info">Observações sobre o animal: 
                <?php if($observacao == NULL){
                echo "<strong> Nenhuma observação sobre o animal</strong>.";
                }else{
                    echo $observacao;
                } 
            ?> </span>
        </div>
    </section>


<?php } ?>
</body>

</html>