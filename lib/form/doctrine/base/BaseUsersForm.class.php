<?php

/**
 * Users form base class.
 *
 * @method Users getObject() Returns the current form's model object
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'role_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Roles'), 'add_empty' => false)),
      'login'      => new sfWidgetFormInputText(),
      'pass'       => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'role_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Roles'))),
      'login'      => new sfValidatorString(array('max_length' => 255)),
      'pass'       => new sfValidatorString(array('max_length' => 255)),
      'email'      => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

}
