<?php
require("../conf/config.inc.php");

try {
    $connection = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $name = isset($_GET['pesquisa']) ? $_GET['pesquisa'] :'';
    $select = $connection->query("SELECT contato_hobbie.id as id, idContato, idEsporte, contato.nome as contato, sobrenome, email, nascimento,
    telefone, cidade.nome as cidade, observacao, esporte.nome as esporte, tempo FROM contato_hobbie JOIN contato ON idContato = contato.id 
    JOIN cidade ON cidade.id = contato.cidade JOIN esporte ON idEsporte = esporte.id WHERE contato.nome LIKE '%$name%' OR contato.sobrenome LIKE '%$name%';");
    $data = $select->fetchAll();
    echo json_encode($data);
    
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    die();
}