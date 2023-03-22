<?php 
    require_once("../conf/config.inc.php");
    //var_dump(MYSQL_DSN);
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    
    
    if(!$conexao){
        echo "Erro ao conectar";
        die();
    }else{
    $esporte = isset($_GET['hobbie']) ? $_GET['hobbie']  : '';
    $consulta = "SELECT * FROM esporte WHERE nome LIKE '%$esporte%';";
    $query = $conexao->query($consulta);
    $esportes = $query->fetchAll();
    echo json_encode($esportes);
    }