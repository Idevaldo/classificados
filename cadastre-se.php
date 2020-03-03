<?php require_once 'pages/header.php'; ?>

    <div class="container mt-5">
        <h1>Cadastre-se</h1>
        <small class="form-text text-muted"><strong>Todos os campos com (<span style="color: red">*</span>) são de preenchimento obrigatório</strong></small>
<?php 
    require_once 'classes/Usuarios.php';
    $usuario = new Usuarios();

    if (isset($_POST['cadastrar'])) :
        if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            
            if ($usuario->cadastrar($nome, $email, $senha, $telefone)) {
                ?>
                <div class="alert alert-success mt-5" role="alert">
                    <strong>Cadastro realizado com sucesso! - <a href="login.php" class="alert-link">Faça login agora!</a></strong>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning mt-5" role="alert">
                    <strong>Este usuário já foi cadastrado em nosso sistema! - <a href="login.php" class="alert-link">Faça login agora!</a></strong>
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
                <label for="nome">Nome<span style="color: red"><strong>*</strong></span></label>
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail<span style="color: red"><strong>*</strong></span></label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha<span style="color: red"><strong>*</strong></span></label>
                <input type="password" name="senha" class="form-control" id="senha">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" class="form-control" id="telefone">
            </div>
            <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
        </form>
    </div>

<?php require_once 'pages/footer.php'; ?>
