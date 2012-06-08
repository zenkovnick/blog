<?php

/**
 * profile actions.
 *
 * @package    blog
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

      if($this->getUser()->isAuthenticated())
          $this->userProfile = sfGuardUserProfileTable::getInstance()->getProfile();
      else
          $this->forward('sfGuardAuth', 'signin');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new sfGuardUserProfileForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new sfGuardUserProfileForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sf_guard_user_profile = Doctrine_Core::getTable('sfGuardUserProfile')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user_profile does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserProfileForm($sf_guard_user_profile);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sf_guard_user_profile = Doctrine_Core::getTable('sfGuardUserProfile')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user_profile does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserProfileForm($sf_guard_user_profile);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sf_guard_user_profile = Doctrine_Core::getTable('sfGuardUserProfile')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user_profile does not exist (%s).', $request->getParameter('id')));
    $sf_guard_user_profile->delete();

    $this->redirect('profile/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sf_guard_user_profile = $form->save();

      $this->redirect('profile/edit?id='.$sf_guard_user_profile->getId());
    }
  }
}
