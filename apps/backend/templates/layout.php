<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <?php if($sf_user->isAuthenticated() && $sf_user->hasCredential('admin')): ?>
              <div id="menu">
                  <ul>
                      <li>
                          <?php echo link_to('Посты', 'posts') ?>
                      </li>
                      <li>
                          <?php echo link_to('Галерея', 'gallery') ?>
                      </li>
                      <li>
                          <?php echo link_to('Категории', 'categories') ?>
                      </li>
                      <li>
                          <?php echo link_to('Комментарии', 'comments') ?>
                      </li>
                      <li>
                          <?php echo link_to('Пользователи', 'sf_guard_user') ?>
                      </li>
                      <li>
                          <?php echo link_to('Выход', 'sf_guard_signout') ?>
                      </li>
                  </ul>
              </div>
             <?php echo $sf_content ?>
      <?php endif ?>
      <?php if($sf_user->isAuthenticated() && !$sf_user->hasCredential('admin')): ?>
            <?php echo "У Вас недостаточно полномочий. ".link_to('Вернуться на форму аутентификации', 'sf_guard_signout'); ?>
      <?php endif ?>
      <?php if(!$sf_user->isAuthenticated()): ?>
            <?php echo $sf_content ?>
      <?php endif ?>
  </body>
</html>
