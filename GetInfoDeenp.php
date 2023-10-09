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
    //

    function getColuna($indice) {
        libxml_use_internal_errors(true); // Ativa o uso de erros internos do libxml
    
        $dom = new DOMDocument();
        $dom->loadHTML($this->content);
    
        $linhas = array();
    
        $tables = $dom->getElementsByTagName('table'); // Seleciona todas as tags <table> presentes no documento HTML
        foreach ($tables as $table) {
            $rows = $table->getElementsByTagName('tr'); // Seleciona todas as tags <tr> (linhas) dentro da tabela atual
            foreach ($rows as $row) {
                $cells = $row->getElementsByTagName('td'); // Seleciona todas as tags <td> (células) dentro da linha atual
                if ($cells->length > $indice) { // Verifica se há células suficientes na linha para o índice da coluna desejada
                    $colunaValue = trim($cells[$indice]->nodeValue); // Extrai o valor da célula correspondente ao índice da coluna desejada e remove quaisquer espaços em branco no início ou no final do valor
                    $linhas[] = $colunaValue; // Adiciona o valor da coluna ao array $linhas
                }
            }
        }
    
        libxml_clear_errors(); // Limpa os erros do libxml para evitar que eles afetem outras partes do código
        libxml_use_internal_errors(false); // Desativa o uso de erros internos do libxml
    
        return $linhas; // Retorna o array contendo os valores da coluna
    }

}
?>