<?php

class Usuarios {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;

    public function getId(){
        return $this->id;
    }
    public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
    }
    
	public function setSenha($senha){
		$this->senha = password_hash($senha, PASSWORD_DEFAULT);
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
    }
    
    public function cadastrar($nome, $email, $senha, $telefone = null){
        global $pdo;
        $senha = $this->setSenha($senha);

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $this->getSenha());
            $sql->bindValue(':telefone', $telefone);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    public function logar($email, $senha){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() == 1) {
            $dados = $sql->fetch();
            if (password_verify($senha, $dados['senha'])) {
                $_SESSION['idUsuario'] = $dados['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deslogar(){
        unset($_SESSION['idUsuario']);
        session_destroy();
        return true;
    }
}