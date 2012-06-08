<?php 
  if($sf_user->isAuthenticated())
    include_partial('posts/post', array('posts' => $posts, 'comments' => $comments, 'commentForm' => $form1));
  else
    include_partial('posts/post', array('posts' => $posts, 'comments' => $comments));
  
?>


