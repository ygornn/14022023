<?php
require_once("../conf/config.inc.php");
//var_dump(MYSQL_DSN);
$conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);

function formToArray(){
    $contato = isset($_POST['contato']) ? $_POST['contato'] : 0;
    $hobbie = isset($_POST['hobbie']) ? $_POST['hobbie'] : 0;
    $tempo = isset($_POST['tempo']) ? $_POST['tempo'] : 0;
    $code = isset($_POST['code']) ? $_POST['code'] : 0;

    $array = [
        'contato' => $contato,
        'hobbie' => $hobbie,
        'tempo' => $tempo,
        'code' => $code
    ];

    return $array;
};

if(!$conexao){
    echo "Erro ao conectar";
    die();
}else{
    $array = formToArray();
    $code = $array['code'];
    if($code == 0){
        create();
    }else{
        update();
    }
}

function create(){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $consulta = 'INSERT INTO contato_hobbie (idContato, idEsporte, tempo) VALUES 
    (:contato,:hobbie, :tempo);';
    $query = $conexao->prepare($consulta);
    $dados = formToArray();
    $query->bindValue(':contato', $dados['contato']);
    $query->bindValue(':hobbie', $dados['hobbie']);
    $query->bindValue(':tempo', $dados['tempo']);

    if($query->execute())
    header('location:../contato/cadastroContato.php');
    else{
        echo "ERROR";
    }
}

function update(){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $consulta = "UPDATE contato_hobbie SET idContato= :contato, idEsporte= :hobbie, tempo = :tempo
    WHERE id = :code;";
    $query = $conexao->prepare($consulta);
    $dados = formToArray();
    $query->bindValue(':contato', $dados['contato']);
    $query->bindValue(':hobbie', $dados['hobbie']);
    $query->bindValue(':tempo', $dados['tempo']);
    $query->bindValue(':code', $dados['code']);

    if($query->execute())
    header('location:../contato/cadastroContato.php');
    else{
        echo "ERROR";
    }
}