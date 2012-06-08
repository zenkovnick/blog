<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
    <a href="<?php echo url_for('posts', $postss) ?>page=1">
        <img src="/images/first.jpg" alt="Первая страница" title="Первая страница" />
    </a>

    <a href="<?php echo url_for('posts', $postss) ?>page=<?php echo $pager->getPreviousPage() ?>">
        <img src="/images/prev.jpg" alt="Предыдущая страница" title="Предыдущая страница" />
    </a>
    <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
        <?php else: ?>
        <a href="<?php echo url_for('posts', $postss) ?>page=<?php echo $page ?>"><?php echo $page ?></a>
        <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('posts', $postss) ?>page=<?php echo $pager->getNextPage() ?>">
        <img src="/images/next.jpg" alt="Следующая страница" title="Следующая страница" />
    </a>

    <a href="<?php echo url_for('posts', $postss) ?>page=<?php echo $pager->getLastPage() ?>">
        <img src="/images/last.jpg" alt="Последняя страница" title="Последняя страница" />
    </a>
</div>

<div class="pagination_desc">
    <strong><?php echo count($pager) ?></strong> записей всего

    <?php if ($pager->haveToPaginate()): ?>
    - страница <strong><?php echo $pager->getPage() ?> из <?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>
<?php endif; ?>