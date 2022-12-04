<?php
    if(isset($_POST['type'])){
        $type = $_POST['type'];
        $searchVal = $_GET['type'];
        $country = filter_var($searchVal, FILTER_SANITIZE_STRING);
        $queryString = "SELECT * FROM contacts role LIKE '%$type%'";

        include "setConnection.php";

        $grab = $conn->query($queryString);
        $dash = $grab->fetchAll(PDO::FETCH_ASSOC);

    }
?>

<div class="tab">
    <h3>&#xF3CA; Filter By</h3>
    <button class="tablinks" onclick="openContacts(event, 'dashboard.php','POST','All Contacts')">All Contacts</button>
    <button class="tablinks" onclick="openContacts(event, 'dashboard.php','POST','Sales Lead')">Sales Lead</button>
    <button class="tablinks" onclick="openContacts(event, 'dashboard.php','POST','Support')">Support</button>
    <button class="tablinks" onclick="openContacts(event, 'dashboard.php','POST','Assigned to me')">Assigned to me</button>
</div>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Type</th>
    </tr>
    <?php foreach ($dash as $row)?>
    <tr>
        <?php $name = $row['title'].$row['firstname'].$row['lastname']?>
        
        <td><?= $name;?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['company']; ?></td>
        <td><?= $row['type']; ?><a href= ''>View</a></td>
    </tr>
</table>

<table>

</table>
