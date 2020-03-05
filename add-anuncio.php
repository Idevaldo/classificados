<?php 
require_once 'pages/header.php'; 

if (empty($_SESSION['idUsuario'])) {
    header('Location: index.php');
    exit;
} else {
?>


<?php
}
require_once 'pages/footer.php'; ?>
