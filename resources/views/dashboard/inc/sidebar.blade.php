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
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('clients.index') }}">
                    <i class="fa fa-plus"></i> <span>Cadadsfdsstro de cliente</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-plus"></i> <span>Cadastro de contratos</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
