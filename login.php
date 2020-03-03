<?php require_once 'pages/header.php'; ?>

    <div class="container mt-5">
        <h1>Login</h1>
        <small class="form-text text-muted"><strong>Todos os campos com (<span style="color: red">*</span>) são de preenchimento obrigatório</strong></small>
<?php 
    require_once 'classes/Usuarios.php';
    $usuario = new Usuarios();

    if (isset($_POST['logar'])) :
        if (!empty($_POST['email']) && !empty($_POST['senha'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            
            if ($usuario->logar($email, $senha)) {
                header('Location: index.php');
            } else {
                ?>
                <div class="alert alert-danger mt-5" role="alert">
                    <strong>Os dados informados não conferem!</strong>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning mt-5" role="alert">
                <strong>Informe todos os campos obrigatórios!</strong>
            </div>
            <?php
        }
    endif;

?>
        <form method="POST" class="mt-5">
            <div class="form-group">
                <label for="email">E-mail<span style="color: red"><strong>*</strong></span></label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha<span style="color: red"><strong>*</strong></span></label>
                <input type="password" name="senha" class="form-control" id="senha">
            </div>
            <button type="submit" class="btn btn-primary" name="logar">Fazer Login</button>
        </form>
    </div>

<?php require_once 'pages/footer.php'; ?>
