<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <title>Beemarket Administrador | @yield('title')</title>
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=9">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory-->
  {{ HTML::style('styles/vendor.css') }}
  {{ HTML::style('styles/main.css') }}
  {{ HTML::style('packages/fancybox/jquery.fancybox.css') }}
  {{ HTML::script('scripts/vendor/modernizr.js') }}
</head>

<body class="admin">
    <!--if lt IE 10
    p.browsehappy
       You are using an strong outdated browser. Please
        a(href='http://browsehappy.com/') upgrade your browser
      to improve your experience.
    -->
    <div class="modal-holder"></div>
    <header class="site-head">
      <div class="site-head__nav"><a href="/" class="site-head__logo">Beemarket</a><span class="nav-trigger fa fa-bars"></span></div>
      <div class="site-head__wrap">
        <nav class="list-unstyled head-nav">
          <li class="head-nav__item head-nav__item--notification">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="head-nav__option head-nav__option--notification">
              <i class="fa fa-bell-o option__icon"></i>
              <span class="badge badge-danger badge-xs">3</span>
            </a>
            <div class="panel panel-default dropdown-menu">
              <div class="panel-heading">
                <p class="panel-title">You have : <strong>3</strong> new notifications</p>
              </div>
              <ul class="list-unstyled noti-menu">
                <li class="noti-menu__item">
                  <a href="#" class="noti-menu__message clearfix">
                    <i class="fa fa-bolt noti-menu__message__type left"></i>
                    <div class="noti-menu__message__body left">
                      <strong class="noti-menu__message__title">New app updated</strong>
                      <span class="small">few secs ago</span>
                    </div>
                  </a>
                </li>
                <li class="noti-menu__item">
                  <a href="#" class="noti-menu__message clearfix">
                    <i class="fa fa-info noti-menu__message__type left"></i>
                    <div class="noti-menu__message__body left">
                      <strong class="noti-menu__message__title">Jhon left message</strong>
                      <span class="small">3 min ago</span>
                    </div>
                  </a>
                </li>
                <li class="noti-menu__item">
                  <a href="#" class="noti-menu__message clearfix">
                    <i class="fa fa-bolt noti-menu__message__type left"></i>
                    <div class="noti-menu__message__body left">
                      <strong class="noti-menu__message__title">New app updated</strong>
                      <span class="small">2 hours ago</span>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="panel-footer">
                <p class="small zero">
                  <a href="#">View all notifications</a>
                  <i class="fa fa-circle-o-notch right"></i>
                </p>
              </div>
            </div>
          </li>
          <li class="head-nav__item head-nav__item--profile dropdown">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="head-nav__option head-nav__option--profile">
              {{ HTML::image('images/logo.png', '', array('class' => 'img-circle option__profile')) }}
            </a>
            <div class="panel panel-default dropdown-menu">
              <div class="panel-body">
                <figure class="profile__photo left">
                  {{ HTML::image('images/logo.png', '', array('class' => 'img-responsive')) }}<a href="#">Foto</a> 
                </figure>
                <div class="profile__info right">
                  @if(Auth::check())
                  <p><strong>{{ Auth::user()->name; }} {{ Auth::user()->lastname; }}</strong></p>
                  <p>{{ Auth::user()->email; }}</p>
                  <a href="#" class="btn btn-primary btn-xs">Ver Perfil</a>
                  @endif
                </div>
              </div>
              <div class="panel-footer clearfix">
                <a href="#" class="btn btn-default btn-sm left">Cuenta</a>
                <a href="#" class="btn btn-default btn-sm btn-primary right">Cerrar Sesión</a>
              </div>
            </div>
          </li>
        </nav>
      </div>
    </header>
    <div class="main-container clearfix">
      <aside class="nav-wrap">
        <nav class="site-nav clearfix">
          <ul class="list-unstyled nav-list">
            <li class="nav-list__item @yield('active-dashboard')">
              <a href="javascript:;" class="nav-list__link">
                <i class="fa fa-desktop nav-list__link__icon"></i>
                <span class="nav-list__link__label">Dashboard</span>
              </a>
            </li>
            <li class="nav-list__item @yield('active-user')">
              <a href="javascript:;" class="nav-list__link">
                <i class="fa fa-user nav-list__link__icon"></i>
                <span class="nav-list__link__label">Usuarios</span>
                <i class="fa fa-angle-right right nav-list__link__icon--arrow"></i>
              </a>
              <ul class="list-unstyled sub-nav-list">
                <li class="sub-nav-list__item">
                  {{ HTML::linkAction('UserController@index', 'Todos los Usuarios') }}
                </li>
                <li class="sub-nav-list__item">
                  {{ HTML::linkAction('UserController@create', 'Nuevo Usuario') }}
                </li>
              </ul>
            </li>
            <li class="nav-list__item @yield('active-customer')">
              <a href="{{ action('CustomerController@index') }}" class="nav-list__link">
                <i class="fa fa-users nav-list__link__icon"></i>
                <span class="nav-list__link__label">Clientes</span>
              </a>
            </li>
            <li class="nav-list__item @yield('active-configuration')">
              <a href="javascript:;" class="nav-list__link">
                <i class="fa fa-gears nav-list__link__icon"></i>
                <span class="nav-list__link__label">Configuración</span>
                <i class="fa fa-angle-right right nav-list__link__icon--arrow"></i>
              </a>
              <ul class="list-unstyled sub-nav-list">
                <li class="sub-nav-list__item">
                  {{ HTML::linkAction('ShippingMethodController@index', 'Métodos de Envío') }}
                </li>
                <li class="sub-nav-list__item">
                  {{ HTML::linkAction('PaymentMethodController@index', 'Métodos de Pago') }}
                </li>
                <li class="sub-nav-list__item">
                  {{ HTML::linkAction('EventController@index', 'Eventos') }}
                </li>
              </ul>
            </li>
            <li class="nav-list__item @yield('active-product')">
              <a href="javascript:;" class="nav-list__link">
                <i class="fa fa-barcode nav-list__link__icon"></i>
                <span class="nav-list__link__label">Productos</span>
                <i class="fa fa-angle-right right nav-list__link__icon--arrow"></i>
              </a>
              <ul class="list-unstyled sub-nav-list">
                <li class="sub-nav-list__item">
                {{ HTML::linkAction('ProductController@index', 'Todos los Productos') }}
                </li>
                <li class="sub-nav-list__item">
                  {{ HTML::linkAction('ProductController@create', 'Nuevo Producto') }}
                </li>
              </ul>
            </li>
            <li class="nav-list__item @yield('active-shopping')">
              <a href="javascript:;" class="nav-list__link">
                <i class="fa fa-cubes nav-list__link__icon"></i>
                <span class="nav-list__link__label">Pedidos</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>

      @yield('inner-layout')

    </div>
    {{ HTML::script('scripts/vendor.js') }}
    {{ HTML::script('scripts/plugins.js') }}
    {{ HTML::script('packages/fancybox/jquery.fancybox.js') }}
    {{ HTML::script('scripts/main.js') }}

  </body>
</html>