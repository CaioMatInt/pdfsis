<header class="main-header">
    <a href="{{ route('admin.home') }}" class="logo">
        <span class="logo-mini"><b>E</b>A</span>
        <img src="{{url('images/every1.png')}}">
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/dashboard/img/user-icon.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('assets/dashboard/img/user-icon.png') }}" class="img-circle" alt="User Image">
                            <p>
                                {{ auth()->user()->name }}
                                <small>Cadastrado em {{ auth()->user()->created_at->format('d/m/Y') }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('user.index') }}" class="btn btn-default btn-flat">Minha conta</a>
                            </div>
                            <div class="pull-right">
                                <button href="{{ route('logout') }}" class="btn btn-danger btn-flat" id="btn-logout">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                                </button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
