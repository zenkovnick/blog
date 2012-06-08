<?php

/**
 * Photos filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePhotosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'      => new sfWidgetFormFilterInput(),
      'picpath'    => new sfWidgetFormFilterInput(),
      'gallery_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'is_default' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'      => new sfValidatorPass(array('required' => false)),
      'picpath'    => new sfValidatorPass(array('required' => false)),
      'gallery_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gallery'), 'column' => 'id')),
      'is_default' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photos';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'title'      => 'Text',
      'picpath'    => 'Text',
      'gallery_id' => 'ForeignKey',
      'is_default' => 'Boolean',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'slug'       => 'Text',
    );
  }
}
