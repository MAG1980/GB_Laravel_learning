<?php include_once "header.php"?>
<?php include_once "menu-categories.php"?>

<h2>Категория новостей: <?= $selectedCategoryName ?></h2>

<?php foreach ($news as $item): ?>
    <a href="<?=route('news.one', $item['id']) ?>"><?= $item['title'] ?></a><br>
<?php endforeach; ?>
