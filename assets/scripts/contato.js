window.onload = function(){
    retriveData('');
    document.getElementById('cidade').addEventListener('keyup', function(){
        popularCidade(this.value);
    })

    document.getElementById('contato').addEventListener('keyup', function(){
        popularContato(this.value);
    })

    document.getElementById('hobbie').addEventListener('keyup', function(){
        popularHobbie(this.value);
    })

    document.getElementById('pesquisa').addEventListener('keyup', function(){
        retriveData(this.value);
    })

    $(document).on('click', '[id^="hbbie"]', function(event){
        event.preventDefault();
        $("#oculto").css("display", "block");
    })
}

function popularCidade (vals){
    let ajax = new XMLHttpRequest;
    ajax.onload = function (){
        let cidades = JSON.parse(this.responseText);
        console.log(cidades);
        var opt = "";
        cidades.forEach(cidade => {
            opt += "<option value='"+cidade.id+"'>"+cidade.uf+" - "+cidade.nome+"</option>";
            document.getElementById('cidades').innerHTML = opt;
        });
    }
    ajax.open('GET', "../cidade/listaCidades.php?cidade="+vals+"");
    ajax.send();
}

function popularContato (vals){
    let ajax = new XMLHttpRequest;
    ajax.onload = function (){
        let contatos = JSON.parse(this.responseText);
        console.log(cidades);
        var opt = "";
        contatos.forEach(contato => {
            opt += "<option value='"+contato.id+"'>"+contato.nome+ ' '+contato.sobrenome+"</option>";
            document.getElementById('contatos').innerHTML = opt;
        });
    }
    ajax.open('GET', "../contato/listaContato.php?contato="+vals+"");
    ajax.send();
}

function popularHobbie (vals){
    let ajax = new XMLHttpRequest;
    ajax.onload = function (){
        let contatos = JSON.parse(this.responseText);
        var opt = "";
        console.log(contatos);
        contatos.forEach(contato => {
            opt += "<option value='"+contato.id+"'>"+contato.nome+"</option>";
            document.getElementById('hobbies').innerHTML = opt;
        });
    }
    ajax.open('GET', "../esporte/lista.php?esporte="+vals+"");
    ajax.send();
}


function retriveData (psq){
    let ajax = new XMLHttpRequest;
    ajax.onload = function(){
        let result = "<th>Nome</th> <th>Sobrenome</th>";
        result += "<th>E-mail</th> <th>Data nsc.</th> <th>Telefone</th>";
        result += "<th>Cidade</th> <th>Observação</th> <th>Hobbie</th> <th>Data e hora</th> <th>Ação</th>";
        let data = JSON.parse(ajax.responseText);
        console.log(data);
        data.forEach(d => {
            let time = new Date(d.tempo); 
            result += "<tr><td>"+d.contato+"</td> <td>"+d.sobrenome+"</td>";
            result += "<td>"+d.email+"</td> <td>"+d.nascimento+"</td> <td>"+d.telefone+"</td>";
            result += "<td>"+d.cidade+"</td> <td>"+d.observacao+"</td> <td>"+d.esporte+"</td> <td>"+time.toLocaleString()+"</td>";
            result += "<td><a href='acao.php?acao=apagar&code="+d.id+"'>Excluir</a>||<a class='edit' href='?action=editar&code="+d.id+"'>Editar</a></td></tr>"
            document.getElementById("query").innerHTML = result;
            // $(".edit").on('click', function(ev){
            //     ev.preventDefault();
            //     $("#oculto").css('display', 'block');
                
            // })
        })
    }
    ajax.open('GET', "../contato_hobbie/lista.php?pesquisa="+psq+"");
    ajax.send();
}
