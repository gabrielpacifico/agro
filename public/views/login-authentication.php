<?php 
session_start();

if(empty($_POST['user']) || empty($_POST['pass'])){
    header('Location: login.php');
    exit();
}

include_once('../include/connect.php');

$user = mysqli_real_escape_string($conexao, $_POST['user']);
$pass = mysqli_real_escape_string($conexao, $_POST['pass']);

$hash_pass = md5($_POST['pass']);

    $query = "SELECT * FROM users WHERE user = '$user' AND pass = '$hash_pass' AND stats = 'Ativo'";
    $res = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

    $row = mysqli_num_rows($res);

    if($row == 1){
        $_SESSION['usuario'] = $user;
        echo "<script> window.location.href='painel-cadastros.php'</script>";
        exit();
    }else{
        $_SESSION['sem_autenticacao'] = true;
        echo "<script> window.location.href='login.php'</script>";
        exit();
    }

?>
