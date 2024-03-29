<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer            getId()          Returns the current record's "id" value
 * @method integer            getUserId()      Returns the current record's "user_id" value
 * @method string             getFirstname()   Returns the current record's "firstname" value
 * @method string             getLastname()    Returns the current record's "lastname" value
 * @method string             getEmail()       Returns the current record's "email" value
 * @method sfGuardUser        getSfGuardUser() Returns the current record's "sfGuardUser" value
 * @method sfGuardUserProfile setId()          Sets the current record's "id" value
 * @method sfGuardUserProfile setUserId()      Sets the current record's "user_id" value
 * @method sfGuardUserProfile setFirstname()   Sets the current record's "firstname" value
 * @method sfGuardUserProfile setLastname()    Sets the current record's "lastname" value
 * @method sfGuardUserProfile setEmail()       Sets the current record's "email" value
 * @method sfGuardUserProfile setSfGuardUser() Sets the current record's "sfGuardUser" value
 * 
 * @package    blog
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('firstname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('lastname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));

        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_general_ci');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}