<?php

namespace entities;

class Produto
{
    public $id;
    private $nome;
    private $cor;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setNome($value)
    {
        $this->nome = $value;
    }

    public function setCor($value)
    {
        $this->cor = $value;
    }
}
