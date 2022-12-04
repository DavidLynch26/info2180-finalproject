<?php
    if(isset($_POST['type'])){
        include "setConnection.php";

        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
        $queryString = "SELECT * FROM contacts WHERE type LIKE '%$type%'";

        $grab = $conn->query($queryString);
        $dash = $grab->fetchAll(PDO::FETCH_ASSOC);

    }?>
<h1 id = "dashboard">Dashboard</h1>
<button id = "newContactButton" type = "button">New Contact</button>

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

    <?php foreach ($dash as $row):?>
    <tr>
        <?php $name = $row['title'].$row['firstname'].$row['lastname']?>
        
        <td><?= $name;?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['company']; ?></td>
        <td><?= $row['type']; ?><a href= ''>View</a></td>
    </tr>
    <?php endforeach ?>
</table>