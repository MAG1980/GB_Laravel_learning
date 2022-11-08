<?php include_once "header.php"?>

<h2>Новости</h2>

<?php foreach ($news as $item): ?>
    <a href="<?=route('news.one', $item['id']) ?>"><?= $item['title'] ?></a><br>
<?php endforeach; ?>
