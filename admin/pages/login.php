
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" style="margin-top: 35%;">
                <div class="panel-body">

                    <img src="img/HighBurgerlogo.jpg" alt="High Burger Logo" width="360" class="img-responsive"  style="margin-bottom: 5%;">
                    <hr>
                    <form role="form" action="?logar=ok" method="post">
                        <fieldset>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                                <input type="text" class="form-control " name="usuario" id="usuario" autocomplete="on" placeholder="E-mail" autofocus="">
                            </div>

                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                                <input type="password" class="form-control " name="senha" id="senha" autocomplete="off" placeholder="Senha">
                            </div>

                            <div class="input-group form-group">
                                <span><input name="save" value="1" id="save" type="checkbox"> <label for="save">Lembrar-me</label></span>
                            </div>

                            <button class="btn btn-success col-lg-offset-1 col-lg-5" type="submit">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Entrar
                            </button>
                            <button class="btn btn-danger col-lg-offset-1 col-lg-4" type="reset">
                                <i class="fa fa-undo" aria-hidden="true"></i> Limpar
                            </button>

                        </fieldset>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>