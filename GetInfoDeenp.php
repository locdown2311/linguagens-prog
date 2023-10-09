<?php

require_once 'IGetInfo.php';

class GetInfoDeenp implements IGetInfo {

    private $url_deenp = "https://deenp.ufop.br/corpo-docente";
    private $content;

    public function __construct() {
        $this->content = file_get_contents($this->url_deenp);
    }

    function getNome() {
        $nomes = $this->getColuna(0);
        return $nomes;
    }

    function getSala() {
        $salas = $this->getColuna(5);
        return $salas;
    }
    public function getRamal() {
        $ramal = $this->getColuna(4);
        return $ramal;
    }
    public function getArea() {
        $areas = $this->getColuna(3);
        return $areas;
    }

    public function getEmail() {
        $emails = $this->getColuna(6);
        return $emails;
    }

    function getColuna($indice) {
        libxml_use_internal_errors(true); // Ativa o uso de erros internos do libxml
    
        $dom = new DOMDocument();
        $dom->loadHTML($this->content);
    
        $linhas = array();
    
        $tables = $dom->getElementsByTagName('table');
        foreach ($tables as $table) {
            $rows = $table->getElementsByTagName('tr');
            foreach ($rows as $row) {
                $cells = $row->getElementsByTagName('td');
                if ($cells->length > $indice) {
                    $colunaValue = trim($cells[$indice]->nodeValue);
                    $linhas[] = $colunaValue;
                }
            }
            
        }
    
        libxml_clear_errors(); // Limpa os erros do libxml
        libxml_use_internal_errors(false); // Desativa o uso de erros internos do libxml
    
        return $linhas;
    }

}
?>