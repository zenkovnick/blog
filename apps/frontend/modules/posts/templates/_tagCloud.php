<?php
    $counter = 0;
    $tagsCloudArray = Array();
    foreach($tags as $tag){
        $type = $counter % 6;
        switch($type){
            case 0:
                $echoTag = "<b>".$tag->getTagName()."</b>";
                break;
            case 1:
                $echoTag = "<i>".$tag->getTagName()."</i>";
                break;
            case 2:
                $echoTag = "<h3>".$tag->getTagName()."</h3>";
                break;
            case 3:
                $echoTag = "<h4>".$tag->getTagName()."</h4>";
                break;
            case 4:
                $echoTag = "<h5>".$tag->getTagName()."</h5>";
                break;
            case 5:
                $echoTag = $tag->getTagName();
                break;
            default:
                $echoTag = "$tag->getTagName()";
        }
        $counter++;
        $tagsCloudArray[] = link_to($echoTag, '@posts_show_tag?id='.$tag->getId().'&tag_slug='.$tag->getTagSlug());
    }
    echo implode(', ', $tagsCloudArray);
?>
