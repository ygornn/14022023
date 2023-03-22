<?php
require("../conf/config.inc.php");

try {
    $connection = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $select = $connection->query("SELECT * FROM contato");
    $data = $select->fetchAll();
    echo json_encode($data);

   
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    die();
}