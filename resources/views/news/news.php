<?php
include resource_path() . "/views/widgets/menu.php";
?>
<h2>Все новости по рубрикам</h2>

<?php foreach ($rubric as $item): ?>

<h3><a href="<?=route('byCategory', $item['rubric']) ?>"><?= $item['text'] ?></a></h3>

<?php  endforeach; ?>


