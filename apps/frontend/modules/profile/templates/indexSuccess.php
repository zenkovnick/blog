<h1>Sf guard user profiles List</h1>
<table>
  <thead>
    <tr>
      <th>Фамилия</th>
      <th>Имя</th>
      <th>E-mail</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $userProfile->getLastname() ?></td>
      <td><?php echo $userProfile->getFirstname() ?></td>
      <td><?php echo $userProfile->getEmail() ?></td>
    </tr>
  </tbody>
</table>

  <a href="<?php echo url_for('profile/edit?id='.$userProfile->getId()) ?>">Редактировать профиль</a>
