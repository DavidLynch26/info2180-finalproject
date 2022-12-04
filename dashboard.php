<?php
include "setConnection.php";

    $queryString = "SELECT * FROM contacts";

$grab = $conn->query($queryString);
$dash = $grab->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Type</th>
    </tr>
    <?php foreach ($dash as $row)?>
    <tr>
        <?php $name = $row['title'].['firstname'].['lastname']?>
        
        <td><?= $name;?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['company']; ?></td>
        <td><?= $row['type']; ?><a href= ''>View</a></td>
    </tr>
</table>
