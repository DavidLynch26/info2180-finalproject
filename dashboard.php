<?php
    if(isset($_POST['type'])):
        include "setConnection.php";
        include "sideBar.php";

        if(!empty($_POST['choice'])){
            $choice = 1;
        }else{
            $choice = filter_input(INPUT_POST, 'choice', FILTER_SANITIZE_STRING);
        }

        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
        if($choice == 2){
            $queryString = "SELECT * FROM contacts WHERE type LIKE '%$type%'";
        }else if($choice == 1){
            $queryString = "SELECT * FROM contacts";
        }else if($choice == 3){
            $id = $_SERVER['id'];
            $queryString = "SELECT * FROM contacts WHERE assigned_to = '$id'";
        }

        $grab = $conn->query($queryString);
        $dash = $grab->fetchAll(PDO::FETCH_ASSOC);
?>
<section id = "loader">
    <h1 id = "dashboard">Dashboard</h1>
    <button id = "newContactButton" type = "button">New Contact</button>

    <div class="tab">
        <h3><img src="filterIcon.png" alt="Black Filter Icon"> Filter By</h3>
        <button class="tablinks">All Contacts</button>
        <button class="tablinks">Sales Lead</button>
        <button class="tablinks">Support</button>
        <button class="tablinks">Assigned to me</button>
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
</section>
    <?php endif ?>