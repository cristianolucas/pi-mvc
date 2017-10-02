<form action="?classe=EnderecoController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
    CEP: <input type="number" name="cep" onblur="attEndereco(this.value)" value="88708450">
    <div id="div_endereco">
        Estado: <select name="estado" disabled onchange="attCidade(this.value)">
            <option>Informe seu CEP</option>
        </select><br>
        Cidade: <select name="cidade" disabled>
            <option>Informe seu CEP</option>
        </select><br>
        Bairro: <input type="text"  name="bairro" disabled value="Informe seu cep"><br>
        Logradouro: <input type="text"  name="logradouro" disabled value="Informe seu logradouro"><br>
        Número: <input type="number" name="numero" disabled><br>
        Complemento: <input type="text" name="complemento" disabled><br>
    </div>
    <input type="submit" value="<?= $rotuloBotao ?>">
</form>