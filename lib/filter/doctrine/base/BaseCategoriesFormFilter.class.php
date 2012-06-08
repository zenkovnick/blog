<?php

/**
 * Categories filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoriesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'category_name' => new sfValidatorPass(array('required' => false)),
      'slug'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categories_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categories';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'category_name' => 'Text',
      'slug'          => 'Text',
    );
  }
}
