<ul class="nav justify-content-center">
    @foreach($categories as $category)
        <li class="my-3 mx-4 text-center">
            <a class="text-decoration-none text-danger" href="{{ route("news.category.selectedCategory", $category['slug'])
            }}">
                <h2>{{ $category['name'] }}</h2>
            </a>
        </li>
    @endforeach
</ul>
