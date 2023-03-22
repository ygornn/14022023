window.onload = function(){
    retriveData("");
    document.getElementById('pesquisa').addEventListener('keyup', function(){
        retriveData(this.value);
    })
}

function retriveData (psq){
    let ajax = new XMLHttpRequest;
    ajax.onload = function(){
        let result = "<th>Nome</th> <th>Descrição</th> <th>Ações</th>";
        let data = JSON.parse(ajax.responseText);
        console.log(data);
        data.forEach(d => {
            result += "<tr><td>"+d.nome+"</td> <td>"+d.uf+"</td>";
            result += "<td><a href='acaoCidade.php?acao=apagar&code="+d.id+"'>Excluir</a> || <a href='?acao=editar&code="+d.id+"'>Editar</a></td></tr>";
            document.getElementById("query").innerHTML = result;
        })
    }
    ajax.open('GET', "../cidade/listaCidades.php?cidade="+psq+"");
    ajax.send();
}
