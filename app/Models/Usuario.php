<?php
class Usuario {
  public $cpf;
  public $nome;
  public $data_nascimento;

  public function __construct($cpf, $nome, $data_nascimento) {
    $this->cpf = $cpf;
    $this->nome = $nome;
    $this->data_nascimento = $data_nascimento;
  }
}
?>