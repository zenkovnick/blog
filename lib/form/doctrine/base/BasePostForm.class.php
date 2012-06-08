<?php

/**
 * Post form base class.
 *
 * @method Post getObject() Returns the current form's model object
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'title'       => new sfWidgetFormInputText(),
      'short_text'  => new sfWidgetFormTextarea(),
      'full_text'   => new sfWidgetFormTextarea(),
      'thumb'       => new sfWidgetFormInputText(),
      'tags'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'title'       => new sfValidatorString(array('max_length' => 60)),
      'short_text'  => new sfValidatorString(array('max_length' => 500)),
      'full_text'   => new sfValidatorString(array('max_length' => 10000)),
      'thumb'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tags'        => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }

}
