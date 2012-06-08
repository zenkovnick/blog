<?php use_helper('Text'); ?>
<div class="post">
    <div class='postThumb'>
        <a href="<?php echo url_for('@posts_show_full?id='.$posts->getId().'&title_slug='.$posts->getTitleSlug()) ?>">
            <?php echo image_tag($posts->getThumb(), array('width' => 150)) ?>
        </a>
    </div>
    <div class="postContent">
        <div class='postTitle'><h1><?php echo link_to($posts->getTitle(), '@posts_show_full?id='.$posts->getId().'&title_slug='.$posts->getTitleSlug()) ?></h1></div>
        <div class='postDate'>
            <div class="iconDate"></div>
            <div class="textDate">
                <?php echo $posts->getCreatedAt() ?>
            </div>
            <div class='clear'></div>
        </div>
        <div class='postShortText'>
            <?php echo simple_format_text($posts->getShortText()) ?>
            <div class='readmore'>
                <?php echo link_to("Читать далее...", '@posts_show_full?id='.$posts->getId().'&title_slug='.$posts->getTitleSlug())?>
            </div>
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
        <div class="devide"></div>
    </div>
</div>

