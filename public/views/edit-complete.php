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

    <section class="home-section">
        <?php

        // INFORMAÇÕES DA ESPÉCIE 
        $id = mysqli_real_escape_string($conexao, $_POST['id']);
        $especie = mysqli_real_escape_string($conexao, $_POST['especie']);
        $ref_animal = mysqli_real_escape_string($conexao, $_POST['ref_animal']);
        $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
        $reproducao = mysqli_real_escape_string($conexao, $_POST['reproducao']);
        $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);

        // VACINAS
        $vacina1 = mysqli_real_escape_string($conexao, $_POST['vacina1']);
        $date_vacina1 = mysqli_real_escape_string($conexao, $_POST['date_vacina1']);
        $year_table = substr($date_vacina1, 0, -6); // Função para pegar apenas o ano da primeira vacina e assim inserir na tabela do ano cadastrado.

        $vacina2 = mysqli_real_escape_string($conexao, $_POST['vacina2']);
        $date_vacina2 = mysqli_real_escape_string($conexao, $_POST['date_vacina2']);
        $year_table2 = substr($date_vacina2, 0, -6);

        $vacina3 = mysqli_real_escape_string($conexao, $_POST['vacina3']);
        $date_vacina3 = mysqli_real_escape_string($conexao, $_POST['date_vacina3']);
        $year_table3 = substr($date_vacina3, 0, -6);

        $vacina4 = mysqli_real_escape_string($conexao, $_POST['vacina4']);
        $date_vacina4 = mysqli_real_escape_string($conexao, $_POST['date_vacina4']);
        $year_table4 = substr($date_vacina4, 0, -6);

        $vacina5 = mysqli_real_escape_string($conexao, $_POST['vacina5']);
        $date_vacina5 = mysqli_real_escape_string($conexao, $_POST['date_vacina5']);
        $year_table5 = substr($date_vacina5, 0, -6);

        $vacina6 = mysqli_real_escape_string($conexao, $_POST['vacina6']);
        $date_vacina6 = mysqli_real_escape_string($conexao, $_POST['date_vacina6']);
        $year_table6 = substr($date_vacina6, 0, -6);

        $vacina7 = mysqli_real_escape_string($conexao, $_POST['vacina7']);
        $date_vacina7 = mysqli_real_escape_string($conexao, $_POST['date_vacina7']);
        $year_table7 = substr($date_vacina7, 0, -6);

        $vacina8 = mysqli_real_escape_string($conexao, $_POST['vacina8']);
        $date_vacina8 = mysqli_real_escape_string($conexao, $_POST['date_vacina8']);
        $year_table8 = substr($date_vacina8, 0, -6);

        // CONVERTENDO DATAS PARA O MODO BR (dd/mm/yyyy)

        $date_vacina1_convert = date('d/m/Y', strtotime($date_vacina1));
        $date_vacina2_convert = date('d/m/Y', strtotime($date_vacina2));
        $date_vacina3_convert = date('d/m/Y', strtotime($date_vacina3));
        $date_vacina4_convert = date('d/m/Y', strtotime($date_vacina4));
        $date_vacina5_convert = date('d/m/Y', strtotime($date_vacina5));
        $date_vacina6_convert = date('d/m/Y', strtotime($date_vacina6));
        $date_vacina7_convert = date('d/m/Y', strtotime($date_vacina7));
        $date_vacina8_convert = date('d/m/Y', strtotime($date_vacina8));

        //VERIFICAÇÃO SE O ANO ESTÁ ENTRE OS FORNECIDOS PELO SISTEMA! ->
        if (empty($year_table)) {
            header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
            $_SESSION['blank-spaces'] = true;
            exit();
        } else {
            if ($year_table == '2022' || $year_table == '2023' || $year_table == '2024' || $year_table == '2025' || $year_table == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if (empty($year_table2)) {
        } else {
            if ($year_table2 == '2022' || $year_table2 == '2023' || $year_table2 == '2024' || $year_table2 == '2025' || $year_table2 == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if (empty($year_table3)) {
        } else {
            if ($year_table3 == '2022' || $year_table3 == '2023' || $year_table3 == '2024' || $year_table3 == '2025' || $year_table3 == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if (empty($year_table4)) {
        } else {
            if ($year_table4 == '2022' || $year_table4 == '2023' || $year_table4 == '2024' || $year_table4 == '2025' || $year_table4 == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if (empty($year_table5)) {
        } else {
            if ($year_table5 == '2022' || $year_table5 == '2023' || $year_table5 == '2024' || $year_table5 == '2025' || $year_table5 == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if (empty($year_table6)) {
        } else {
            if ($year_table6 == '2022' || $year_table6 == '2023' || $year_table6 == '2024' || $year_table6 == '2025' || $year_table6 == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if (empty($year_table7)) {
        } else {
            if ($year_table7 == '2022' || $year_table7 == '2023' || $year_table7 == '2024' || $year_table7 == '2025' || $year_table7 == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        if (empty($year_table8)) {
        } else {
            if ($year_table8 == '2022' || $year_table8 == '2023' || $year_table8 == '2024' || $year_table8 == '2025' || $year_table8 == '2026') {
            } else {
                header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
                $_SESSION['year-invalid'] = true;
                exit();
            }
        }

        // <- FIM DA VERIFICAÇÃO

        $editsql = "UPDATE animais
        SET 
        especie = '$especie',
        ref_animal = '$ref_animal',
        sexo = '$sexo',
        vacina = '$vacina1',
        data_vacina = '$date_vacina1',
        vacina2 = '$vacina2',
        data_vacina2 = '$date_vacina2',
        vacina3 = '$vacina3',
        data_vacina3 = '$date_vacina3',
        vacina4 = '$vacina4',
        data_vacina4 = '$date_vacina4',
        vacina5 = '$vacina5',
        data_vacina5 = '$date_vacina5',
        vacina6 = '$vacina6',
        data_vacina6 = '$date_vacina6',
        vacina7 = '$vacina7',
        data_vacina7 = '$date_vacina7',
        vacina8 = '$vacina8',
        data_vacina8 = '$date_vacina8',
        reproducao = '$reproducao',
        observacao = '$observacao'
        WHERE
        id = '$id'
        ";

        if (mysqli_query($conexao, $editsql) or die(mysqli_error($conexao))) {
        ?>
            <div class="text"> Edição Concluída! <i class="fa-solid fa-circle-check" style="color: #24c423;"></i> </div>
            <div class="succesfully-edited">
                <p class="text-check">Espécie: <?php if ($especie == NULL) {
                                echo "<span style='color: #d53535'>Sem dados.</span>";
                            } else {
                                echo $especie . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                            } ?>
                </p>

                <p class="text-check">Ref. Animal: <?php if ($ref_animal == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $ref_animal . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?>
                </p>

                <p class="text-check">Sexo: <?php if ($sexo == NULL) {
                                echo "<span style='color: #d53535'>Sem dados.</span>";
                            } else {
                                echo $sexo . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                            } ?>
                </p>

                <p class="text-check">Reprodução: <?php if ($reproducao == NULL) {
                                echo "<span style='color: #d53535'>Sem dados.</span>";
                            } else {
                                echo $reproducao . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                            } ?>
                </p>

                <p class="text-check">1ª Vacina: <?php if ($vacina1 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina1 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 1ª vacina: <?php if ($date_vacina1 == "0000-00-00" || $date_vacina1 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina1_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <p class="text-check">2ª Vacina: <?php if ($vacina2 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina2 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 2ª vacina: <?php if ($date_vacina2 == "0000-00-00" || $date_vacina2 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina2_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <p class="text-check">3ª Vacina: <?php if ($vacina3 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina3 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 3ª vacina: <?php if ($date_vacina3 == "0000-00-00" || $date_vacina3 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina3_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <p class="text-check">4ª Vacina: <?php if ($vacina4 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina4 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 4ª vacina: <?php if ($date_vacina4 == "0000-00-00" || $date_vacina4 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina4_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <p class="text-check">5ª Vacina: <?php if ($vacina5 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina5 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 5ª vacina: <?php if ($date_vacina5 == "0000-00-00" || $date_vacina5 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina5_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <p class="text-check">6ª Vacina: <?php if ($vacina6 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina6 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 6ª vacina: <?php if ($date_vacina6 == "0000-00-00" || $date_vacina6 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina6_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <p class="text-check">7ª Vacina: <?php if ($vacina7 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina7 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 7ª vacina: <?php if ($date_vacina7 == "0000-00-00" || $date_vacina7 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina7_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <p class="text-check">8ª Vacina: <?php if ($vacina8 == NULL) {
                                    echo "<span style='color: #d53535'>Sem dados.</span>";
                                } else {
                                    echo $vacina8 . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                } ?></p>

                <p class="text-check">Data 8ª vacina: <?php if ($date_vacina8 == "0000-00-00" || $date_vacina8 == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $date_vacina8_convert . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    }
                                    ?></p>

                <p class="text-check">Observações: <?php if ($observacao == NULL) {
                                        echo "<span style='color: #d53535'>Sem dados.</span>";
                                    } else {
                                        echo $observacao  . ' <i class="fa-solid fa-check" style="background-color:#24c423; padding: 5px; border-radius: 10px; font-size: 11pt;"></i>';
                                    } ?></p>

                <button type="button" onclick="window.location.href='editar.php'" id="btn-back2">Voltar</button>
            </div>

        <?php
        } else {
        ?>
            <div class="text"> Edição não concluída, tente novamente! <i class="fa-solid fa-circle-xmark" style="color: #c51515;"></i></div>
            <button type="button" onclick="window.location.href='editar.php'" id="btn-back2">Voltar</button>
        <?php
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