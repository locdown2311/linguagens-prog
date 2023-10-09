<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Tarefa 2 - Igor e Luísa</title>

</head>

<body>
    <?php

    require_once 'GetInfoDeenp.php';
    require_once 'GetInfoDecsi.php';

    $dados_DP = new GetInfoDeenp();
    $nomesDP = $dados_DP->getNome();
    $emailsDP = $dados_DP->getEmail();
    $salasDP = $dados_DP->getSala();
    $ramalDP = $dados_DP->getRamal();
    $areaDP = $dados_DP->getArea();

    $dados_DCSI = new GetInfoDecsi();
    $nomesDCSI = $dados_DCSI->getNome();
    $emailsDCSI = $dados_DCSI->getEmail();
    $areaDCSI = $dados_DCSI->getArea();



    ?>
    <details>
        <summary>Professores DEENP</summary>
    <?php 
    for ($i = 0; $i < count($nomesDP); $i++) {
        echo "<p>Nome: " . $nomesDP[$i] . "</p>";
        echo "<p>Email: " . $emailsDP[$i] . "</p>";
        echo "<p>Sala: " . $salasDP[$i] . "</p>";
        echo "<p>Ramal: " . $ramalDP[$i] . "</p>";
        echo "<p>Area: " . $areaDP[$i] . "</p>";
        echo "<br>";
    }
    ?>
    </details>
    
    <details>
        <summary>Professores DECSI</summary>
    <?php

    //Loop que imprima nomes, email, sala e areas
    for ($i = 0; $i < count($nomesDCSI); $i++) {
        echo "<p>Nome: " . $nomesDCSI[$i] . "</p>";
        echo "<p>Email: " . $emailsDCSI[$i] . "</p>";
        echo "<p>Area: " . $areaDCSI[$i] . "</p>";
        echo "<br>";
    }

    ?>
    </details>
</body>

</html>