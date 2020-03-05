<?php 
require_once 'pages/header.php'; 

if (empty($_SESSION['idUsuario'])) {
    header('Location: index.php');
    exit;
} else {
?>
<div class="container mt-5">
    
    <h1>Meus Anúncios</h1>

    <a href="add-anuncio.php" class="btn btn-secondary mt-5">Adicionar Anúncio</a>

    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Título</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <?php 
        require_once 'classes/Anuncios.php';
        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios($_SESSION['idUsuario']);

        foreach($anuncios as $anuncio){
        ?>
        <tbody>
            <tr>
                <td><img src="assets/images/<?php echo $anuncio['url']; ?>"></td>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td><?php echo number_format($anuncio['valor'], 2, ',', '.'); ?></td>
                <td></td>
            </tr>
        </tbody>
        <?php 
        } 
        ?>
    </table>
</div>

<?php
}
require_once 'pages/footer.php'; ?>
