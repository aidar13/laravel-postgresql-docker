<aside class="sidebar">
    <div class="sidebar__top hidden-sm hidden-xs">
        <a href="/" title="Главная" class="logo"><img src="/admin/img/logo.svg" alt=""></a>
    </div>
    <div class="menu-wrapper">
        <ul class="menu">
            <li class="dropdown">
                <a href="javascript:;" title="Роли"><i class="icon-users"></i>Продукты</a>
                <ul>
                    <li><a class="nav-link" href="{{ route('products.index') }}">Список прожуктов</a></li>
                    <li><a href="{{ route('products.create') }}" title="Добавить" class="add">+Добавить</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
