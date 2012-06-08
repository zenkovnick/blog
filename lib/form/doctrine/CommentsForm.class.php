<?php

/**
 * Comments form.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentsForm extends BaseCommentsForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['post_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['comment'] = new sfWidgetFormTextareaTinyMCE(array(
          'width'  => 550,
          'height' => 350
      ),array(
          'class' => 'tinyMCE'
      ));
      $this->getWidgetSchema()->getFormFormatter()->setRowFormat('<div >%field%%help%%error%%hidden_fields%</div>');
  }
}
