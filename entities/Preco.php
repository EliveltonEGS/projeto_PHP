<?php

namespace entities;

class Preco
{
    private $id;
    private $preco;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($value)
    {
        $this->preco = $value;
    }
}
