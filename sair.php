<?php
require_once 'pages/header.php';
require_once 'classes/Usuarios.php';
$usuario = new Usuarios();
$usuario->deslogar();
header('Location: index.php');
require_once 'pages/footer.php';
