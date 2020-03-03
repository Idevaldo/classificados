<?php require_once 'config.php'; ?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Estilos particulares -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Classificados</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Classificados</a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

            <form class="form-inline my-2 my-lg-0 ">
                <?php if (!empty($_SESSION['idUsuario'])) : ?>
                <a href="meus-anuncios.php" class="btn btn-primary mr-1">Meus anúncios</a>
                <a href="sair.php" class="btn btn-primary ml-1">Sair</a>
                <?php else : ?>
                <a href="cadastre-se.php" class="btn btn-primary mr-1">Cadastre-se</a>
                <a href="login.php" class="btn btn-primary ml-1">Login</a>
                <?php endif ?>
            </form>
        </div>
    </nav>

