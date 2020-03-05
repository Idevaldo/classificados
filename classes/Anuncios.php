<?php

class Anuncios {
    private $id;
    private $idUsuario;
    private $idCategoria;
    private $titulo;
    private $descricao;
    private $valor;
    private $estado;

    public function getMeusAnuncios($idUsuario){
        global $pdo;
        $array = array();

        $sql = $pdo->prepare("SELECT *, (select imagens_anuncios.url from imagens_anuncios WHERE imagens_anuncios.id_anuncios = anuncios.id limimt 1) as url FROM anuncios WHERE idUsuario = :idUsuario");
        $sql->bindValue(':idUsuario', $idUsuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getIdCategoria(){
		return $this->idCategoria;
	}

	public function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}
}
