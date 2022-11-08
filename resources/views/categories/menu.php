<h1>Категории новостей</h1>
dd($categories);
<ul class="main-menu">
<?php foreach($categories as $category): ?>
<!--    --><?php //dd($categories); ?>
    <?php dump($category); ?>
    <li class="main-menu__li">
        <a class="main-menu__link" href="<?= route("news.selectedByCategoryId", $category['slug']) ?>"><?= $category['name'] ?></a>
    </li>
<?php endforeach; ?>
</ul>
