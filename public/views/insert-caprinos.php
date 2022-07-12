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
    <title> Resultado Cadastro de Caprinos</title>
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
                <a href="cadasto-ovinos.php">
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

        <?php

        // CARACTERÍSTICAS ESPECÍFICAS DA ESPÉCIE ->
        $especie = mysqli_real_escape_string($conexao, $_POST['especie']);
        $ref_animal = mysqli_real_escape_string($conexao, $_POST['ref_animal']);
        $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
        $reproducao = mysqli_real_escape_string($conexao, $_POST['reproducao']);

        // VACINA 1
        $vacina1 = mysqli_real_escape_string($conexao, $_POST['vacina1']);
        $date_vacina1 = mysqli_real_escape_string($conexao, $_POST['date_vacina1']);

        $year_table = substr($date_vacina1, 0, -6); // Função para pegar apenas o ano da primeira vacina e assim inserir na tabela do ano cadastrado.

        // VACINA 2
        $vacina2 = mysqli_real_escape_string($conexao, $_POST['vacina2']);
        $date_vacina2 = mysqli_real_escape_string($conexao, $_POST['date_vacina2']);

        $year_table2 = substr($date_vacina2, 0, -6);

        // VACINA 3
        $vacina3 = mysqli_real_escape_string($conexao, $_POST['vacina3']);
        $date_vacina3 = mysqli_real_escape_string($conexao, $_POST['date_vacina3']);

        $year_table3 = substr($date_vacina3, 0, -6);

        // VACINA 4
        $vacina4 = mysqli_real_escape_string($conexao, $_POST['vacina4']);
        $date_vacina4 = mysqli_real_escape_string($conexao, $_POST['date_vacina4']);

        $year_table4 = substr($date_vacina4, 0, -6);

        // VACINA 5
        $vacina5 = mysqli_real_escape_string($conexao, $_POST['vacina5']);
        $date_vacina5 = mysqli_real_escape_string($conexao, $_POST['date_vacina5']);

        $year_table5 = substr($date_vacina5, 0, -6);

        // VACINA 6
        $vacina6 = mysqli_real_escape_string($conexao, $_POST['vacina6']);
        $date_vacina6 = mysqli_real_escape_string($conexao, $_POST['date_vacina6']);

        $year_table6 = substr($date_vacina6, 0, -6);

        // VACINA 7
        $vacina7 = mysqli_real_escape_string($conexao, $_POST['vacina7']);
        $date_vacina7 = mysqli_real_escape_string($conexao, $_POST['date_vacina7']);

        $year_table7 = substr($date_vacina7, 0, -6);

        // VACINA 8
        $vacina8 = mysqli_real_escape_string($conexao, $_POST['vacina8']);
        $date_vacina8 = mysqli_real_escape_string($conexao, $_POST['date_vacina8']);

        $year_table8 = substr($date_vacina8, 0, -6);

        // OBSERVAÇÃO
        $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);

        //VERIFICAÇÃO SE O ANO ESTÁ ENTRE OS FORNECIDOS PELO SISTEMA! ->
        if(empty($year_table)){
            header('Location: cadastro-caprinos.php');
            $_SESSION['blank-spaces'] = true;
            exit();
        }else{
            if($year_table == '2022' || $year_table == '2023' || $year_table == '2024' || $year_table == '2025' || $year_table == '2026'){
                
            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }
    
        if(empty($year_table2)){
        }else{
            if($year_table2 == '2022' || $year_table2 == '2023' || $year_table2 == '2024' || $year_table2 == '2025' || $year_table2 == '2026'){

            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if(empty($year_table3)){
        }else{
            if($year_table3 == '2022' || $year_table3 == '2023' || $year_table3 == '2024' || $year_table3 == '2025' || $year_table3 == '2026'){

            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if(empty($year_table4)){
        }else{
            if($year_table4 == '2022' || $year_table4 == '2023' || $year_table4 == '2024' || $year_table4 == '2025' || $year_table4 == '2026'){

            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if(empty($year_table5)){
        }else{
            if($year_table5 == '2022' || $year_table5 == '2023' || $year_table5 == '2024' || $year_table5 == '2025' || $year_table5 == '2026'){

            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if(empty($year_table6)){
        }else{
            if($year_table6 == '2022' || $year_table6 == '2023' || $year_table6 == '2024' || $year_table6 == '2025' || $year_table6 == '2026'){

            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if(empty($year_table7)){
        }else{
            if($year_table7 == '2022' || $year_table7 == '2023' || $year_table7 == '2024' || $year_table7 == '2025' || $year_table7 == '2026'){

            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if(empty($year_table8)){
        }else{
            if($year_table8 == '2022' || $year_table8 == '2023' || $year_table8 == '2024' || $year_table8 == '2025' || $year_table8 == '2026'){

            }else{
                header('Location: cadastro-caprinos.php');
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        // <- FIM DA VERIFICAÇÃO

        if (empty($especie) || empty($ref_animal) || empty($sexo)) {
            header('Location: cadastro-caprinos.php');
            $_SESSION['blank-spaces'] = true;
            exit();
        } else {

            $sqlcode = "INSERT INTO `$year_table` 
        (`especie`, `ref_animal`, `sexo`, `vacina`, `data_vacina`, `vacina2`, `data_vacina2`, `vacina3`, `data_vacina3`, `vacina4`, `data_vacina4`,
         `vacina5`, `data_vacina5`, `vacina6`, `data_vacina6`, `vacina7`, `data_vacina7`, `vacina8`, `data_vacina8`, `reproducao`, `observacao`) 
        VALUES ('$especie', '$ref_animal', '$sexo', '$vacina1', '$date_vacina1', '$vacina2', '$date_vacina2', '$vacina3', '$date_vacina3', '$vacina4', '$date_vacina4', 
        '$vacina5', '$date_vacina5', '$vacina6', '$date_vacina6', '$vacina7', '$date_vacina7', '$vacina8', '$date_vacina8', '$reproducao', '$observacao')";

            if (mysqli_query($conexao, $sqlcode) or die(mysqli_error($conexao))) {
                echo "<span class='cadastro-feito'> Cadastro realizado com <strong>sucesso</strong>! <i class='fa-solid fa-check'></i> </span>";
                echo "<a href='cadastro-caprinos.php' id='voltar-cadastro'>Voltar</a>";
            } else {
                echo "<span class='cadastro-erro'> Cadastro <strong>não realizado</strong>, tente novamente! <i class='fa-solid fa-xmark'></i></span>";
                echo "<a href='cadastro-caprinos.php' id='voltar-cadastro'>Voltar</a>";
            }
        }
        ?>

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