<?php

/**
 * posts actions.
 *
 * @package    blog
 * @subpackage posts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postsActions extends sfActions
{

  public function executeDeleteComment(sfWebRequest $request){
   // if($this->getUser()->hasCredential('admin')){
        $this->forward404Unless($comment = CommentsTable::getInstance()->find($request->getParameter("id")));
        $comment->delete();
        $this->redirect('posts/showFull?id='.$comment->getPostId());
        $this->comment = $this->getRoute()->getObject();
   /* } else {
        $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
        $this->getContext()->getResponse()->setStatusCode(403);
    }*/

  }
  public function executeShowTag(sfWebRequest $request){
      $tag_id = $request->getParameter('id');
      $this->forward404Unless($this->tag = TagsTable::getInstance()->find(array($tag_id))->getTagName());
      //$this->postss = PostsTable::getInstance()->getPostsByTag($tag_id);
      $this->pager = new sfDoctrinePager('Posts', sfConfig::get('app_posts_on_homepage'));
      $this->pager->setQuery(PostsTable::getInstance()->getPostsByTagQuery($tag_id));
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();
  }
    public function executeShowFull(sfWebRequest $request)
    {
        $post_id = $request->getParameter('id');
        $this->forward404Unless($this->posts = PostsTable::getInstance()->find(array($post_id)));
        $this->forward404Unless($this->comments = PostsTable::getInstance()->getComments($post_id));
        if($this->getUser()->getGuardUser()!=null){
            $comments = new Comments();
            $comments->setPostId($this->posts->getId());
            $comments->setUserId($this->getUser()->getGuardUser()->getId());
            $this->form1 = new CommentsForm($comments);
        }

    }


  public function executeIndex(sfWebRequest $request)
  {

    $this->postss = PostsTable::getInstance()->findAll();
    $this->pager = new sfDoctrinePager('Posts', sfConfig::get('app_posts_on_homepage'));
    $this->pager->setQuery(PostsTable::getInstance()->getAllPostsQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

  }

  public function executeShowCategory(sfWebRequest $request)
    {

        $category_id = $request->getParameter('id');
        /*$this->forward404Unless($this->postss = PostsTable::getInstance()
            ->find(array($category_id)));*/
        $this->forward404Unless($this->category = CategoriesTable::getInstance()
            ->find(array($category_id))->getCategoryName());
        $this->pager = new sfDoctrinePager('Posts', sfConfig::get('app_posts_on_category'));
        $this->pager->setQuery(PostsTable::getInstance()->getPostsInCategoryQuery($category_id));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

  }

  public function executeCreateComment(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new CommentsForm();
    $this->processFormComments($request, $this->form);
    $this->setTemplate('new');
  }

  protected function processFormComments(sfWebRequest $request, sfForm $form)
  {
     $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
     if ($form->isValid())
     {
        $comments = $form->save();
        $this->redirect('@posts_show_full?id='.$comments->getPostId().
            "&title_slug=".$comments->getPosts()->getSlug());
     }
  }
}
