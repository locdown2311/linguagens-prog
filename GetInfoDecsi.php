<?php

require_once 'IGetInfo.php';

class GetInfoDecsi implements IGetInfo
{
    private $url_decsi = "https://decsi.ufop.br/docentes";
    private $content;

    public function __construct()
    {
        $this->content = file_get_contents($this->url_decsi);
    }

    function getNome()
    {
        $pattern = '/color:#800000;">(.*?)<\/span>/';

        preg_match_all($pattern, $this->content, $matches);

        $nomesProfessores = $matches[1];

        return $nomesProfessores;
    }


    function getEmail()
    {
        $pattern = '/mailto:([^"]+)/';

        preg_match_all($pattern, $this->content, $matches);

        $email = $matches[1];
        return $email;
    }

    function getRamal()
    {
        throw new Exception("Not implemented yet");
    }

    function getSala()
    {
        throw new Exception("Not implemented yet");
    }

    function getArea()
    {
        $regex = '/<span[^>]*><strong>Linha de pesquisa:(.*?)<\/span>/';

        preg_match_all($regex, $this->content, $matches);

        $linhasDePesquisa = $matches[1];

        return $linhasDePesquisa;
    }
}
