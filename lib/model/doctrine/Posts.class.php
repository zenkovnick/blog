<?php

/**
 * Posts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    blog
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Posts extends BasePosts
{
    public function __toString()
    {
        return sprintf('%s', $this->getTitle());
    }

    public function getTitleSlug(){
        return slugifyClass::Slugify($this->getTitle());
    }

    public function getTagsAsStr(){
        $tags = $this->getTags();
        $tagsArray = Array();
        foreach($tags as $tag)
            $tagsArray[] = $tag->getTagName();
        return implode(', ', $tagsArray);
    }
}