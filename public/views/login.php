<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Login</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="../bootstrap/bootstrap-iso.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/caprinos.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

        <div class="main-login">
            <div class="left-login">
                <h1>Fazer login</h1>
                <h1>teste agro</h1>
                <img src="../img/planet.svg" class="img-left-login">
            </div>

    <form action="confirm-password.php" method="POST">    
            <div class="right-login">
                <div class="card-login">
                    <h1>Faça Login</h1>
                    <div class="text-field">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário">
                    </div>
                    <div class="text-field">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <div class="text-field">
                        <span>Esqueceu a <a href="forgot-password.php">senha?</a></span>
                    </div>
                    <button type="submit" class="btn-login">Entrar</button>
                    <a href="fazer-cadastro.php" class="btn-cadastro">Cadastre-se</a>
                </div>
            </div>
        </div>
    </form>

</body>
</html>