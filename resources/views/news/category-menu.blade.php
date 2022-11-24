<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-lg">
        <ul class="navbar-nav me-auto">
            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("news.category.selectedCategory", $category->slug) }}">
                        <h2>{{ $category->title }}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
