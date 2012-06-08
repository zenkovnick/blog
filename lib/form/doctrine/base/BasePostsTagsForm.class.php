<?php

/**
 * PostsTags form base class.
 *
 * @method PostsTags getObject() Returns the current form's model object
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostsTagsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'posts_id' => new sfWidgetFormInputHidden(),
      'tags_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'posts_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('posts_id')), 'empty_value' => $this->getObject()->get('posts_id'), 'required' => false)),
      'tags_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tags_id')), 'empty_value' => $this->getObject()->get('tags_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('posts_tags[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostsTags';
  }

}
