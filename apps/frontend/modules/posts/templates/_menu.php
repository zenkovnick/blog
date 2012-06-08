<ul>
    <li><a href="<?php echo url_for('@homepage') ?>">Главная</a></li>
    <li><a href="<?php echo url_for('posts', array('sf_format' => 'atom')) ?>">RSS</a></li>
    <?php foreach($categories as $category): ?>
    <li><?php echo link_to($category->getCategoryName(), "@category_show?id=".$category->getId()."&category_slug=".$category->getCategoryNameSlug()) ?></li>
    <?php endforeach; ?>
    <?php if($sf_user->isAuthenticated()): ?>
        <li><?php echo link_to('Профиль', '@profile'); ?></li>
        <li><?php echo link_to('Выход', 'sf_guard_signout'); ?></li>
    <?php else: ?>
        <li><?php echo link_to('Вход', 'sf_guard_signin'); ?></li>
    <?php endif; ?>
</ul>
