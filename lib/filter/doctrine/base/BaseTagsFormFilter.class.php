<?php

/**
 * Tags filter form base class.
 *
 * @package    blog
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTagsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'posts_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Posts')),
    ));

    $this->setValidators(array(
      'tag_name'   => new sfValidatorPass(array('required' => false)),
      'posts_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Posts', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tags_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPostsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('PostsTags.posts_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Tags';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'tag_name'   => 'Text',
      'posts_list' => 'ManyKey',
    );
  }
}
