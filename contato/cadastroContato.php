<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Contato</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../assets/scripts/contato.js"></script>
    <?php require_once('acao.php');
        $code = isset($_GET['code']) ? $_GET['code'] : 0;
        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $data = findById($code);
    ?>
</head>
<body>
    <nav class="menu">
        <ul>
            <li id="item"><a href="../index.html">Página inicial</a></li>
            <li><a href="cadastroContato.php">Contatos</a></li>
            <li><a href="../cidade/cidade.php">Cidade</a></li>
            <li><a href="../esporte/cadastro.php">Hobbies</a></li>
            <li>Sobre</li>
        </ul>
    </nav>
    <div class="row">
        <h2>Cadastro de Amigos</h2>
        <div class="col-12">
            <form action="acao.php" method="post">
                <div class="row">
                    <div class="col-2">
                        <label for="nome">Nome do Contato</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="nome" id="nome">
                    </div>
                    <div class="col-2">
                        <label for="sobrenome">Sobrenome</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="sobrenome" id="sobrenome">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="col-4">
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="col-2">
                        <label for="nasc">Data de Nascimento</label>
                    </div>
                    <div class="col-4">
                        <input type="date" name="nasc" id="nasc">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="col-4">
                        <input type="tel" name="telefone" id="telefone">
                    </div>
                    <div class="col-2">
                        <label for="cidade">Cidade</label>
                    </div>
                    <div class="col-4">
                        <input list="cidades" type="text" name="cidade" id="cidade">
                        <datalist id="cidades">
                        </datalist>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="obs">Observação</label>
                    </div>
                    <div class="col-4">
                        <textarea name="obs" id="obs" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-2">
                        <label for="vivo">Vivo</label>
                    </div>
                    <div class="col-4">
                        <input type="checkbox" name="vivo" id="vivo" checked>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="acao" id="acao" value="salvar">Enviar</button>
                        <button type="submit" name="acao" id="hbbie" value="hbbie">Cadastrar hobbie</button>
                    </div>
                </div>
            </form>
            <div class="oculto" id="oculto" <?php if($action == 'editar') echo "style='display:block'"; ?>>
                <form action="../contato_hobbie/acao.php" method="post">
                    <input type="hidden" name="code" id="code" value="<?php if($action == 'editar') echo $code; else{ echo 0;} ?>">
                    <div class="row">
                        <div class="col-2">
                            <label for="contato">Contato:</label>
                        </div>
                        <div class="col-4">
                            <input list="contatos" type="text" name="contato" id="contato" value="<?php  if($action != 'editar') echo ''; else{echo $data['idContato'];} ?>">
                            <datalist id="contatos"></datalist>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="hobbie">Hobbie:</label>
                        </div>
                        <div class="col-4">
                            <input list="hobbies" type="text" name="hobbie" id="hobbie" value="<?php if($action == 'editar') echo $data['idEsporte']; else{echo '';} ?>">
                            <datalist id="hobbies"></datalist>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="tempo">Data e hora:</label>
                        </div>
                        <div class="col-4">
                            <input type="datetime-local" name="tempo" id="tempo" value="<?php if($action == 'editar') echo $data['tempo']; else{echo '';}?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="acao" id="acao" value="salvar">Finalizar</button>
                        </div>
                    </div>
                </form>
            </div>
                <div class="row" style="padding-top:2em;">
                    <div class="col-9">
                        <label for="pesquisa">Pesquisar:</label>
                        <input type="search" name="pesquisa" id="pesquisa">
                        <input type="submit" value="OK">
                </div>
                </div>
                <div class="row">
                    <table border="1px" id="query">
                    <tr>
                        
                    </tr>
                    </table>
                </div>
    </div>
</body>
</html>