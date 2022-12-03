 <table>
      <tr>
        <th> First Name</th>
        <th> Last Name</th>
        <th> Password</th>
        <th> Email</th>
        <th> Role</th>
        <th> Created At</th>
      </tr>
<?php

  include 'setConnection.php';
    
  $stmt= $conn->query("SELECT * FROM users");
  $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
 
?>
    <?php foreach($results as $row){ ?>
        <tr>
          <td></td>
          <td> <?= $row["title" . ".". " " . "firstname" . " " . "lastname"]; ?></td>
          <td> <?= $row["email"]; ?></td>
          <td> <?= $row["role"]; ?></td>
          <td> <?= $row["created_at"]; ?></td>
          
        </tr>
    <?php } ?>
    </table>