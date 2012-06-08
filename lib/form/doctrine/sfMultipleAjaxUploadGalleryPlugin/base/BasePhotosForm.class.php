<?php

/**
 * Photos form base class.
 *
 * @method Photos getObject() Returns the current form's model object
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePhotosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormInputText(),
      'picpath'    => new sfWidgetFormInputText(),
      'gallery_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'is_default' => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'picpath'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gallery_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'required' => false)),
      'is_default' => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Photos', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('photos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photos';
  }

}
