<?php use_helper('Text'); ?>
<div class="post">
    <div class='postThumb'>
        <?php echo image_tag($posts->getThumb(), array('width' => 150)) ?>
    </div>
    <div class="postContent">
        <div class='postTitle'><h1><?php echo $posts->getTitle() ?></h1></div>
        <div class='postDate'>
            <div class="iconDate"></div>
            <div class="textDate">
                <?php echo $posts->getCreatedAt() ?>
            </div>
            <div class='clear'></div>
        </div>
        <div class='postFullText'>
            <?php echo $posts->getFullText() ?>
        </div>
        <div class='postTagList'>
            <div class="iconTag"></div>
            <div class="textTag">
                <?php $tags = $posts->getTags(); ?>
                <?php foreach($tags as $tag): ?>
                <?php echo link_to($tag->getTagName(), '@posts_show_tag?id='.$tag->getId().'&tag_slug='.$tag->getTagSlug()) ?>
                <?php endforeach; ?>
            </div>
            <div class='clear'></div>
        </div>

        <div class='clear'></div>
    </div>
    <div class='comments'>
        <div class="title"><h2>Комментарии</h2></div>
        <div class='clear'></div>
        <td>
            <?php foreach($comments as $comment): ?>
            <div style="float:left">
                <b><?php echo $comment->getSfGuardUser()->getUsername()." написал(-а):&nbsp;&nbsp;"; ?></b>
            </div>
            <div style="float:left">
                <?php echo $comment->getComment(); ?>
            </div>
            <?php if($sf_user->hasCredential('admin')): ?>
                <div style="float:left">
                    <a href="<?php echo url_for('@posts_delete_comment?id='.$comment->getId()) ?>">
                        <img src="/images/delete.png" alt="Удалить комментарий" title="Удалить комментарий" />
                    </a>
                </div>
                <?php endif; ?>
            <div class="clear"></div>
            <?php endforeach; ?>
        </td>
        <?php
        if($sf_user->isAuthenticated())
            include_partial('form', array('form' => $commentForm));
        else
            echo "Для того, чтобы оставлять комментарии - Вы должны войти в свою учетную запись. ".link_to('Войти', 'sf_guard_signin');
        ?>

    </div>

</div>

