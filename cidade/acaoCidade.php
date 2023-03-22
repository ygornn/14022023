<?php
require_once("../conf/config.inc.php");
//var_dump(MYSQL_DSN);
$conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);

function formToArray(){
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $uf = isset($_POST['uf']) ? $_POST['uf'] : '';
    $code = isset($_POST['code']) ? $_POST['code'] : 0;

    $array = [
        'nome' => $nome,
        'uf' => $uf,
        'code' => $code
    ];

    return $array;
};

if(!$conexao){
    echo "Erro ao conectar";
    die();
}else{
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $action = isset($_GET['acao']) ? $_GET['acao'] : '';break;
        case 'POST': $action = isset($_POST['acao']) ? $_POST['acao'] : '';break;
    }

    $data = formToArray();
    $code = $data['code'];
    
   switch ($action) {
    case 'apagar': exc(); break;
    case 'salvar':{
        if($code == 0){
            create();
        }else{
            update();
        }
        break;
    }
   }
}

function create(){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $consulta = 'INSERT INTO cidade (nome, uf) VALUES (:nome,:uf);';
    $query = $conexao->prepare($consulta);
    $dados = formToArray();
    $query->bindValue(':nome', $dados['nome']);
    $query->bindValue(':uf', $dados['uf']);
    
    
    if($query->execute())
    header('location:cidade.php');
    else{
        echo "ERROR";
    }
}

function exc(){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $consulta = 'DELETE FROM cidade WHERE id= :code';
    $query = $conexao->prepare($consulta);
    $dados = formToArray();
    $query->bindValue(':code', $dados['code']);

    if($query->execute())
        header('location:cidade.php');
       //var_dump($dados);
    else{
        echo "ERROR";
    }
}

function update(){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $consulta = "UPDATE cidade SET nome= :nome, uf= :uf
    WHERE id = :code;";
    $query = $conexao->prepare($consulta);
    $dados = formToArray();
    $query->bindValue(':nome', $dados['nome']);
    $query->bindValue(':uf', $dados['uf']);
    $query->bindValue(':code', $dados['code']);

    if($query->execute())
    header('location:cidade.php');
    else{
        echo "ERROR";
    }
}

function findById($cd){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $query = $conexao->query("SELECT * FROM cidade WHERE id= $cd;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}