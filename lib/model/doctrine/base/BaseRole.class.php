<?php

/**
 * BaseRole
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $role_name
 * 
 * @method string getRoleName()  Returns the current record's "role_name" value
 * @method Role   setRoleName()  Sets the current record's "role_name" value
 * 
 * @package    blog
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRole extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('role');
        $this->hasColumn('role_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}