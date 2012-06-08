<?php
    $tags = $posts->getTags();
    $a = Array();
    foreach($tags as $tag)
        $a[] = $tag->getTagName();
    echo implode(', ', $a);
