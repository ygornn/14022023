<?php 
    require_once("../conf/config.inc.php");
    //var_dump(MYSQL_DSN);
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    
    
    if(!$conexao){
        echo "Erro ao conectar";
        die();
    }else{
        $cidade = isset($_GET['cidade']) ? $_GET['cidade']  : '';
        $consulta = "SELECT * FROM cidade WHERE nome LIKE '%$cidade%';";
        $query = $conexao->query($consulta);
        $cidades = $query->fetchAll();
        echo json_encode($cidades);
    }