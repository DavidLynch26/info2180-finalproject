<?php
    include "setConnection.php";

    $queryString = "SELECT * FROM contacts";
    $grab = $conn->query($queryString);
    $dash = $grab->fetchAll(PDO::FETCH_ASSOC);

?>

<h2><?php $name = $dash['title'].$dash['firstname'].$dash['lastname']?></h2>
<table>
    <tr>
        <th>Email</th>
        <th>Telephone</th>
        <th>Company</th>
        <th>Type</th>
    </tr>
    <tr>
        <td><?= $dash['email']; ?></td>
        <td><?= $dash['telephone']; ?></td>
        <td><?= $dash['company']; ?></td>
        <td><?= $dash['type']; ?><a href= ''>View</a></td>
    </tr>
</table>

<?php
    include "AddNote.php"
?>