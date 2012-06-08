<h2 class="title">Список категории "<?php echo $category ?>"</h2>
<?php foreach ($pager->getResults() as $posts): ?>
<?php include_partial('posts/index', array('posts' => $posts)) ?>
<?php endforeach; ?>
<?php include_partial('posts/paginate', array('postss' => $pager->getResults(), 'pager' => $pager)) ?>
