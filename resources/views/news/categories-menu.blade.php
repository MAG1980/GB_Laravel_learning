<h1>Категории новостей</h1>
<ul class="main-menu">
    @foreach($categories as $category)
        <li class="main-menu__li">
            <a class="main-menu__link" href="{{ route("news.category.selectedCategory", $category['slug']) }}">
                {{ $category['name'] }}
            </a>
        </li>
    @endforeach
</ul>
