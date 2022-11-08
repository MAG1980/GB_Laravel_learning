<?php include_once "header.php"?>
<?php if($news):?>
<h1><?= $news['title'] ?></h1>
<h2> Новость № <?= $news['id'] ?></h2>
<div><?= $news['text'] ?></div>
<?php else:?>
<p>Нет такой новости!</p>
<?php endif;?>

