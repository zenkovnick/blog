<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();

      $this->validatorSchema['email'] = new sfValidatorAnd(array(
          $this->validatorSchema['email'],
          new sfValidatorEmail(),
      ));
  }
}
