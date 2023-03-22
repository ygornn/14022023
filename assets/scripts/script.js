window.onload = function () {
    let nome = document.getElementById('nome');
    nome.addEventListener('change', () =>{
        if(nome.value.length < 3){
            document.getElementById('erronome').className = 'erroativo';
        }else{
            document.getElementById('erronome').className = 'erro';
            atualizaEmailViaAjax(nome.value);
        }
    });
    let email = document.getElementById('email');
    email.addEventListener('change', () =>{
        if(email.value.match(/\w@\w*\.\w/) == null){
            document.getElementById('erroemail').className = 'erroativo';
        }else{
            document.getElementById('erroemail').className = 'erro';
        }
    });
    let salario = document.getElementById('salario');
    salario.addEventListener('change', () =>{
        if(salario.value < 1200){
            document.getElementById('errosal').className = 'erroativo';
        }else{
            document.getElementById('errosal').className = 'erro';
        }
    });
}

function atualizaEmailViaAjax(nm){
    let ajax = new XMLHttpRequest;
    ajax.onload = (function(){
        let pessoa = JSON.parse(ajax.responseText);
        pessoa.forEach(val => {
            if(nm == val.nome){
                document.getElementById('email').value = val.email;
                document.getElementById('salario').value = val.proposta;
                document.getElementById('obs').value = val.observacao;
            }
        });
    });
    ajax.open('GET', 'contatos.json');
    ajax.send();
}

$(document).ready(function(){
    $('aqui').on('click', function(){
        $('modal').show('slow');
    })
})

