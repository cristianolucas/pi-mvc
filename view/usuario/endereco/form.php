<form>
    CEP: <input type="number" name="cep" onblur="attEndereco(this.value)">
    <div id="div_endereco">
        Estado: <select name="estado" disabled onchange="attCidade(this.value)">
            <option>Informe seu CEP</option>
        </select><br>
        Cidade: <select name="cidade" disabled>
            <option>Informe seu CEP</option>
        </select><br>
        Bairro: <input type="text" disabled value="Informe seu cep"><br>
        Número: <input type="number" name="numero" disabled>
    </div>
    <input type="submit">
</form>