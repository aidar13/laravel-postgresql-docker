<header class="header">
    <div class="container container-fluid">
        <a href="javascript:;" title="Свернуть/развернуть навигацию" class="menu-btn icon-menu"></a>
        <a href="/" title="Главная" class="logo hidden-md hidden-lg"><img src="/admin/img/logo-blue.svg" alt=""></a>
        <div class="language hidden-sm hidden-xs">
        </div>
        <div class="header-dropdown account-nav">
            <div class="header-dropdown__title">
                @auth()
                    <span> Добро пожаловать, {{ auth()->user()->name }}</span> <img src="/admin/img/user.svg" alt=""> <i
                        class="icon-chevron-down"></i>

                    {{ config('products.role') }}
                @endauth
            </div>
            <div class="header-dropdown__desc">
                <ul>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
</header>
