<?php

/**
 * Comment form base class.
 *
 * @method Comment getObject() Returns the current form's model object
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'post_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'add_empty' => false)),
      'comment_text' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'post_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Post'))),
      'comment_text' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

}
