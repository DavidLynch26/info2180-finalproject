<h1>Users</h1>
<button id = "newUserButton" type = "button">&#43; Add User</button>
<table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
      </tr>
<?php
  include 'setConnection.php';
    
  $stmt= $conn->query("SELECT * FROM users");
  $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
 
?>
  <?php foreach($results as $row): ?>
      <tr>
        <td></td>
        <?php $name = $row["title"] . ". ".$row["firstname"] ." ". $row["lastname"]?>
        <td> <?= $name; ?></td>
        <td> <?= $row["email"]; ?></td>
        <td> <?= $row["role"]; ?></td>
        <td> <?= $row["created_at"]; ?></td>
      </tr>
  <?php endforeach ?>
</table>