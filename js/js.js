function attEndereco(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        document.getElementById("div_endereco").innerHTML = this.responseText;
    };
    xmlhttp.open("GET", "atualizar_endereco.php?cep=" + str, true);
    xmlhttp.send();
}

function attCidade(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        document.getElementById("select_cidade").innerHTML = this.responseText;
    };
    xmlhttp.open("GET", "atualizar_cidade.php?uf=" + str, true);
    xmlhttp.send();
}

function validarSenha() {
    senha1 = document.formUsuario.senha.value;
    senha2 = document.formUsuario.conf_senha.value;
    
    if(senha1 !== senha2) {
        document.getElementById("senha").focus();
        alert("AQUILO");
        return false;
    } else {
        alert("ISSO");
    }
}

function janelaAvaliarMercado(mercado, usuario) {
    var val = prompt("Informe quantos porcento deseja avaliar este mercado!\nDeixe vazio para cancelar!");
    if(val !== null && val !== "") {
        location.href = "?classe=MercadoController&acao=avaliar&mercado="+ mercado +"&usuario="+usuario+"&avaliacao="+val;
    }
}