<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="gentelella-master/images/favicon.ico" type="image/ico" />

    <title>TAIS 1</title>

    <section>
        @yield('estilos')
    </section>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ URL::to('/welcome') }}" class="site_title"><i class="fa fa-paw"></i> <span>TAIS I</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="/imagenes/usuario.png" alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>{{$_SESSION['usuario_name']}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
                    @php
                        if (!isset($_SESSION['ruc'])) {
                            $_SESSION['ruc'] = 'ninguno';
                        }
                        //$_SESSION['ruc'] = "ninguno";
                    @endphp
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Gestionar Usuarios <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('usuario.create') }}">Registrar usuario</a></li>
                                        <li><a href="{{ route('usuario.index') }}">Listar usuarios</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Gestionar Empresas <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('empresa.create') }}">Registrar empresa</a></li>
                                        <li><a href="{{ route('empresa.index') }}">Listar empresas</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Registrar informacion <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('proceso.show', $_SESSION['ruc']) }}">Procesos</a></li>
                                        <li><a
                                                href="{{ route('subproceso.index', $_SESSION['ruc']) }}">Subprocesos</a>
                                        </li>
                                        <li><a href="{{ route('indicador.index', $_SESSION['ruc']) }}">Indicadores</a>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('indicador.matriz', $_SESSION['ruc']) }}">Matriz de
                                                Indicadores</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Salir" href="{{ route('usuario.login') }}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="/imagenes/usuario.png" alt="">{{$_SESSION['usuario_name']}}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('usuario.login') }}"><i class="fa fa-sign-out pull-right"></i>
                                        Salir</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <section>
                    @yield('contenido')
                </section>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <section>
        @yield('scripts')
    </section>
</body>

</html>
