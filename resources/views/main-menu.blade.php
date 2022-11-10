<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-lg">
        <div class="logo"></div>
        <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="my-3 mx-4">
                    <a class="text-decoration-none" href="{{ route('home') }}">Страница приветствия</a>
                </li>
                <li class="my-3 mx-4">
                    <a class="text-decoration-none" href="{{ route('news.index') }}">Список новостей</a>
                </li>
                <li class="my-3 mx-4">
                    <a class="text-decoration-none" href="{{ route('news.category.index') }}">Категории новостей</a>
                </li>
                <li class="my-3 mx-4">
                    <a class="text-decoration-none" href="{{ route('about') }}">Информация о проекте</a>
                </li>
                <li class="my-3 mx-4">
                    <a class="text-decoration-none" href="{{ route('admin.index') }}">Консоль администратора</a>
                </li>
                <li class="my-3 mx-4">
                    <a class="text-decoration-none" href="{{ route('vue') }}">Vue</a>
                </li>
                <li class="my-3 mx-4">
                    <a class="text-decoration-none" href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

