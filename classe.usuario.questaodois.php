<?php

class Usuario {

	public $nome;
	public $telefone;

	function __construct ($nome, $telefone) {

	$this->nome = $nome;
	$this->telefone = $telefone;

	}

	public function getNome () {

    return $this->nome;

	}

	public function setNome ($nome) {

	$this->nome = $nome;

	}

	public function getTelefone () {

	return $this->telefone;

	}

    public function setTelefone ($telefone) {

    $this->telefone = $telefone;

    }
}

?>