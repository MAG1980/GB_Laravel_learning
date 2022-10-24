<h1>Категории новостей</h1>
<ul class="main-menu">
<?php foreach($categories as $category): ?>
    <li class="main-menu__li">
        <a class="main-menu__link" href="<?= route("news.selectedByCategoryId", $category['id']) ?>"><?= $category['name'] ?></a>
    </li>
<?php endforeach; ?>
</ul>
