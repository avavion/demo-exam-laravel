<header class="header">

    <div class="container">
        <nav class="navigation">
            <div class="logo">
                <a href="{{ route('page.articles') }}">
                    Logo
                </a>
            </div>

            <ul class="menu">
                @auth
                <li class="menu__item">
                    <a href="{{ route('page.articles') }}" class="menu__link">
                        Статьи
                    </a>
                </li>
                <li class="menu__item">
                    <a href="{{ route('auth.logout') }}" class="menu__link">
                        Выход
                    </a>
                </li>
                @endauth
                @guest
                <li class="menu__item">
                    <a href="{{ route('page.signin') }}" class="menu__link">
                        Авторизация
                    </a>
                </li>
                @endguest
            </ul>
        </nav>
    </div>

</header>