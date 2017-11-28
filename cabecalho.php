<nav class="navbar navbar-expand-sm navbar-dark fixed-top" id="nav_header">
    <div class="container-fluid">
        <?php
        if (UsuarioController::logado()) { ?>
            <ul class="nav navbar-nav">
                <li><a class="nav-link bg-primary" id="nav_link" href="index.php">Inicio</a></li>
                <li><a class="nav-link bg-primary" id="nav_link" href="#">Produtos</a></li>
            </ul>
        <form class="form-inline ml-auto ">
    <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar">
    <button class="btn btn-success bg-primary" type="submit">Buscar</button>
  </form>

            <ul class="navbar-nav ml-auto">
                <li><a class="nav-link bg-primary" id="nav_link" href="?classe=<?= (($_SESSION['tipo'] == 1) ? ("Usuario") : ("Mercado")) ?>Controller&acao=perfil">Perfil</a></li>
                <li><a class="nav-link bg-primary" id="nav_link" href="?classe=UsuarioController&acao=deslogar">Sair</a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="nav-link bg-dark" id="nav_link" href="?classe=UsuarioController&acao=form">
                        <img style="width: 20px;" id="nav_link" src="images/add_user.png"> Cadastrar
                    </a>
                </li>
                <li>
                    <a class="nav-link bg-dark" id="nav_link" href="?classe=UsuarioController&acao=form_login">
                        <img style="width: 20px;" id="nav_link" src="images/add_user.png"> Logar
                    </a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>