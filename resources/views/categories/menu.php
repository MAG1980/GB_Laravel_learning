<h1>Категории новостей</h1>
<?php foreach($categories as $category): ?>
<a href="<?= route("category",$category['id']) ?>"><?= $category['name'] ?></a>
<?php endforeach; ?>
