<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-lg">
        <ul class="navbar-nav d-flex flex-column">
            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("news.category.selectedCategory", $category->slug) }}">
                        <h4 class="{{ request()->route()->parameter('slug')==$category->slug ? 'text-primary fs-2 border border-primary border-2 rounded-2 p-3' : '' }}">
                            {{ mb_strtoupper($category->title, 'UTF-8') }}
                        </h4>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
