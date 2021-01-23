<nav class="mt-2">
    <ul class="nav nav-pills
        nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false"
    >
        <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link{{ request()->is('admin') ? ' active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    {{ __('Home') }}
                </p>
            </a>
        </li>

        <li class="nav-item menu-open">
            <a href="/"
                class="nav-link{{ request()->is('admin/posts*') ? ' active' : '' }}"
            >
                <i class="nav-icon fas fa-th"></i>
                <p>
                    {{ config('app.name') }}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}"
                    class="nav-link{{ request()->is('admin/posts') ? ' active' : '' }}"
                >
                    <i class="far fa-eye nav-icon"></i>
                    <p>{{ __('All posts') }}</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="#"
                    class="nav-link"
                    data-toggle="modal"
                    data-target="#modal-create"
                >
                    <i class="far fa-edit nav-icon"></i>
                    <p>{{ __('Create post') }}</p>
                </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
