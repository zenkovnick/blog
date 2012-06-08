<?php

/**
 * Comment filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'post_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'add_empty' => true)),
      'comment_text' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'post_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Post'), 'column' => 'id')),
      'comment_text' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'user_id'      => 'ForeignKey',
      'post_id'      => 'ForeignKey',
      'comment_text' => 'Text',
    );
  }
}
