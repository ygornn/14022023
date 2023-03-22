<?php
require_once("../conf/config.inc.php");
//var_dump(MYSQL_DSN);

$conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
if(!$conexao){
    echo "Erro ao conectar";
    die();
}else{
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $action = isset($_GET['acao']) ? $_GET['acao'] : '';break;
        case 'POST': $action = isset($_POST['acao']) ? $_POST['acao'] : '';break;
    }

    switch($action){
        case 'salvar': create(); break;
        //case 'editar': 
        case 'apagar': exc(); break;
    }

}

function formToArray(){
    $code = isset($_GET['code']) ? $_GET['code'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $data = isset($_POST['nasc']) ? $_POST['nasc'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $observacao = isset($_POST['obs']) ? $_POST['obs'] : '';
    $vivo = isset($_POST['vivo']) ? $_POST['vivo'] : '';

    $array = [
        'nome' => $nome,
        'sobrenome' => $sobrenome,  
        'email' => $email,
        'data' => $data,
        'telefone' => $telefone,
        'cidade' => $cidade,
        'observacao' => $observacao,
        'vivo' => $vivo,
        'code' => $code
    ];

    return $array;
};

function create(){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $consulta = 'INSERT INTO contato (nome, sobrenome, email, nascimento, telefone, 
    cidade, observacao, vivo) VALUES (:nome,:sobrenome,:email,:nascimento,:telefone,:cidade,
    :observacao,:vivo);';
    $query = $conexao->prepare($consulta);
    $dados = formToArray();
    $query->bindValue(':nome', $dados['nome']);
    $query->bindValue(':sobrenome', $dados['sobrenome']);
    $query->bindValue(':email', $dados['email']);
    $query->bindValue(':nascimento', $dados['data']);
    $query->bindValue(':telefone', $dados['telefone']);
    $query->bindValue(':cidade', $dados['cidade']);
    $query->bindValue(':observacao', $dados['observacao']);
    $query->bindValue(':vivo', $dados['vivo']);

    if($query->execute())
        header('location:cadastroContato.php');
    else{
        echo "ERROR";
    }
}

function exc(){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $consulta = 'DELETE FROM contato_hobbie WHERE id= :code';
    $query = $conexao->prepare($consulta);
    $dados = formToArray();
    $query->bindValue(':code', $dados['code']);

    if($query->execute())
       header('location:cadastroContato.php');
       //var_dump($dados);
    else{
        echo "ERROR";
    }
}

function findById($cd){
    $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    $query = $conexao->query("SELECT * FROM contato_hobbie WHERE id= $cd;");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}