<?php

 class Professor {

     protected $nome;
     protected $email;
     protected $area;

    //ramal (decsi não tem), sala(não tem decsi) e area

    public function __construct($nome, $email, $area) {
        $this->nome = $nome;
        $this->email = $email;
        $this->area = $area;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getArea() {
        return $this->area;
    }

}
