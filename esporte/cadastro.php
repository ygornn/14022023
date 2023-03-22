<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Hobbie</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../assets/scripts/esporte.js"></script>
    <?php require_once('acao.php');
        $code = isset($_GET['code']) ? $_GET['code'] : 0;
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $data = findById($code);
    ?>
</head>
<body>
    <nav class="menu">
        <ul>
            <li id="item"><a href="../index.html">Página inicial</a></li>
            <li><a href="../contato/cadastroContato.php">Contatos</a></li>
            <li><a href="../cidade/cidade.php">Cidade</a></li>
            <li><a href="cadastro.php">Hobbies</a></li>
            <li>Sobre</li>
        </ul>
    </nav>
    <div class="row">
        <h2>Cadastro de Hobbies</h2>
        <div class="col-12">
            <form action="acao.php" method="post">
                <input type="hidden" name="code" id="code" value="<?php if($code != 0) echo $code; else{echo 0;} ?>">
                <div class="row">
                    <div class="col-2">
                        <label for="nome">Nome da atividade</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="nome" id="nome" value="<?php if($code != 0) echo $data['nome']; else{echo '';} ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="modalidade">Descrição</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="modalidade" id="modalidade" value="<?php if($code != 0) echo $data['modalidade']; else{echo '';} ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="acao" id="acao" value="salvar">Enviar</button>
                    </div>
                </div>
            </form>
            <div class="row" style="padding-top:2em;">
                <div class="col-9">
                    <label for="pesquisa">Pesquisar:</label>
                    <input type="search" name="pesquisa" id="pesquisa">
                    <input type="submit" value="OK">
            </div>
            <div class="row">
                <table border="1px" id="query">

                </table>
            </div>
        </div>
    </div>
</body>
</html>