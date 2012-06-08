<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="alternate" type="application/atom+xml" title="Последние записи"
          href="<?php echo url_for('posts', array('sf_format' => 'atom'), true) ?>" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <title><?php include_slot('title', 'Блог на Symfony'); ?></title>
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" media="all" href="css/ie7.css" />
    <![endif]-->
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css" />
    <![endif]-->
</head>
<body>
<div class="container_12">
    <div class="grid_4 logo">
        <h1><?php echo link_to("Блог о космосе", "@homepage") ?></h1>
    </div><!-- end .grid_4-->
    <div class="grid_8 header">
        <div id='menu'>
            <?php include_partial('posts/menu',
            array('categories' =>  CategoriesTable::getInstance()->findAll())) ?>
        </div>
    </div><!-- end .grid_8-->
    <div class="clear"></div>

    <div class="clear"></div>
    <div class="grid_4"> <!-- lefs side -->
        <div id='tagCloudTitle' class='title'><h2>Облако тегов</h2></div>
        <div id='tagCloudTags'>
            <?php include_partial('posts/tagCloud', array('tags' => TagsTable::getInstance()->findAll())) ?>
        </div>
    </div><!-- end .grid_4-->
    <div class="grid_8">
        <?php echo $sf_content ?>
    </div> <!-- end .grid_8-->
    <div class="clear"></div>
    <div class="footer clearfix">
        <p class="copyright">Made by &copy;Зенков Н.А. </p>
    </div><!-- end .footer-->
</div><!-- end .container_12 -->
</body>
</html>