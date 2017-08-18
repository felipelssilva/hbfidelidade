                    <!-- Navigation -->
                    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                       <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                             <span class="sr-only">Toggle navigation</span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                         </button>
                         <a class="navbar-brand" href="?">High Burger - Fidelidade</a>
                     </div>
                     <!-- /.navbar-header -->

                     <ul class="nav navbar-top-links navbar-right">
                      <li class="dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="?go=pages/usuario/perfil"><i class="fa fa-user fa-fw"></i> Meu Perfil</a>
                            </li>
                            <li><a href="?go=pages/usuario/configuracoes"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="?deslogar=ok"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                  <div class="sidebar-nav navbar-collapse">
                     <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                           <div class="input-group custom-search-form">
                              <input type="text" class="form-control" placeholder="Pesquisar...">
                              <span class="input-group-btn">
                                 <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                       <a href="?"><i class="fa fa-dashboard fa-fw"></i> Início</a>
                   </li>
                   <?php
                   if($contas->MostraDados('level') == '0')
                   {
                    ?>
                    <li>
                       <a href="#"><i class="fa fa fa-lock fa-fw"></i> Administrativo<span class="fa arrow"></span></a>
                       <ul class="nav nav-second-level">
                          <li>
                             <a href="?go=pages/administrativo/clientes">Clientes</a>
                         </li>
                         <li>
                             <a href="?go=pages/administrativo/pedidos">Pedidos</a>
                         </li>
                         <li>
                            <a href="?go=pages/administrativo/produtos">Produtos</a>
                        </li>
                    </ul>
                </li>
                <?php
            }
            ?>
            <li>
                <a href="?go=pages/usuario/perfil"><i class="fa fa-user fa-fw"></i> Meu Perfil</a>
            </li>
            <li>
               <a href="?go=pages/usuario/meuspedidos"><i class="fa fa-shopping-cart fa-fw"></i> Meus Pedidos</a>
           </li>
           <li>
            <a href="?go=pages/produtos"><i class="fa fa-shopping-bag fa-fw"></i> Produtos</a>
        </li>
        <li>
            <a href="?go=pages/promocoes"><i class="fa fa-heart-o fa-fw"></i> Promoções</a>
        </li>
    </ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
