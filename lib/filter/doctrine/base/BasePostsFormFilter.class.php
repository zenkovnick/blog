<?php

/**
 * Posts filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePostsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categories'), 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'short_text'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'full_text'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'thumb'       => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
      'tags_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tags')),
    ));

    $this->setValidators(array(
      'category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categories'), 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'short_text'  => new sfValidatorPass(array('required' => false)),
      'full_text'   => new sfValidatorPass(array('required' => false)),
      'thumb'       => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'        => new sfValidatorPass(array('required' => false)),
      'tags_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tags', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('posts_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addTagsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.PostsTags PostsTags')
      ->andWhereIn('PostsTags.tags_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Posts';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'category_id' => 'ForeignKey',
      'title'       => 'Text',
      'short_text'  => 'Text',
      'full_text'   => 'Text',
      'thumb'       => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'slug'        => 'Text',
      'tags_list'   => 'ManyKey',
    );
  }
}
