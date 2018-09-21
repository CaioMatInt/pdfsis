<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/dashboard/img/user-icon.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navegação</li>
            <li class="treeview">
            <li><a href="{{ route('admin.home') }}">  <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
                <li class="treeview">
            <li><a href="{{ route('clients.index') }}">  <i class="fa fa-user"></i>
                    <span>Clientes</span>
                </a>
            </li>
                <li class="treeview">
            <li><a href="{{ route('contracts.index') }}">  <i class="fa fa-file-o"></i>
                    <span>Propostas Comerciais</span>
                </a>
            </li>
            @can('delete', App\Models\User::class)
            <li class="treeview">
            <li><a href="{{ route('user.listAll') }}">  <i class="fa fa-users"></i>
                    <span>Usuários do sistema</span>
                </a>
            </li>
            @endcan

        </ul>
    </section>
</aside>
