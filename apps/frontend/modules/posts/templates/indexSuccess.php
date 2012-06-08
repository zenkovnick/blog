<?php slot('title', "Список постов") ?>
<div class="title"><h2>Все записи</h2></div>
<?php foreach ($pager->getResults() as $posts): ?>
    <?php include_partial('posts/index', array('posts' => $posts)) ?>
<?php endforeach; ?>
<?php include_partial('posts/paginate', array('postss' => $pager->getResults(), 'pager' => $pager)) ?>

