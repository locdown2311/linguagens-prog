<?php
require './Professor.php';

class ProfDeenp extends Professor{
    private $sala, $ramal;
    public function __construct($nome,$email,$sala,$area, $ramal) {
        parent::__construct($nome, $email, $area);
        $this->sala = $sala;
        $this->ramal = $ramal;
    }
    public function getSala() {
        return $this->sala;
    }

    public function getRamal() {
        return $this->ramal;
    }

}
