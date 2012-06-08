<?php

/**
 * Posts form.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostsForm extends BasePostsForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);

      $this->widgetSchema['category_id'] = new sfWidgetFormChoice(array(
          'choices'  => CategoriesTable::getInstance()->getCategoriesKeys(),
          'expanded' => true,
      ));
      $this->widgetSchema['short_text'] = new sfWidgetFormTextareaTinyMCE(array(
          'width'  => 550,
          'height' => 350
      ),array(
          'class' => 'tinyMCE'
      ));
      $this->widgetSchema['full_text'] = new sfWidgetFormTextareaTinyMCE(array(
          'width'  => 550,
          'height' => 350
      ),array(
          'class' => 'tinyMCE'
      ));

      $this->widgetSchema['tags_list'] = new sfWidgetFormSelectCheckbox(array(
          'choices'  => TagsTable::getInstance()->getTagsKeys(),
      ));
  }
}
