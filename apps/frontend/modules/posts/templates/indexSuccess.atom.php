<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>Блог</title>
    <subtitle>Последние записи</subtitle>
    <link href="<?php echo url_for('posts', array('sf_format' => 'atom'), true) ?>" rel="self"/>
    <link href="<?php echo url_for('@homepage', true) ?>"/>
    <updated><?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', PostsTable::getInstance()->getLatestPost()->getDateTimeObject('created_at')->format('U')) ?></updated>
    <author><name>Зенков Н.А.</name></author>
    <id><?php echo sha1(url_for('posts', array('sf_format' => 'atom'), true)) ?></id>
    <?php foreach($postss as $posts): ?>
        <entry>
            <category><?php echo $posts->getCategories()->getCategoryName() ?></category>
            <title><?php echo $posts->getTitle() ?></title>
            <url><?php echo url_for('posts_show_full', array('id' => $posts->getId(), 'title_slug' => $posts->getTitleSlug()), true) ?></url>
            <id><?php echo sha1(url_for('posts', array('id' => $posts->getId()), true)) ?></id>
            <created><?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', $posts->getDateTimeObject('created_at')->format('U')) ?></created>
            <short_text><?php echo $posts->getShortText() ?></short_text>
        </entry>
    <?php endforeach; ?>
</feed>