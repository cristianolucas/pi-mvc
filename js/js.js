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