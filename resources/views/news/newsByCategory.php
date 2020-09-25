<?php
include resource_path() . "/views/widgets/menu.php";
?>

<h2>Новости в рубрике: <?= $rubric ?> </h2>

<?php foreach ($news as $item): ?>

    <h3><a href="<?=route('news.newsOne', $item['id']) ?>"><?= $item['title'] ?></a></h3>

<?php  endforeach; ?>


