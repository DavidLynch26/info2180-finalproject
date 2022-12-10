<?php
    include "sidebar.php";
    session_start();

    if (isset($_POST['id'])):
        include "setConnection.php";
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $queryString = "SELECT * FROM contacts WHERE id = '$id'";
        $grab = $conn->query($queryString);
        $dash = $grab->fetch(PDO::FETCH_ASSOC);

        $createdById = $dash['created_by'];
        $queryString = "SELECT firstname, lastname FROM users WHERE id = '$createdById'";
        $createdById = $conn->query($queryString);
        $creator = $createdById->fetch(PDO::FETCH_ASSOC);
?>
<section id = "loader">
    <div id = "fullContactHolder">
        <h2><img src="newContactIcon.png" alt="Contact Icon"> <?= $name = $dash['title']." ". $dash['firstname'].$dash['lastname']; ?></h2>
        <p>Created on ; by <?= $creator['firstname']." ".$creator['lastname']?>; </p>
        <p>Updated on ; </p>
    </div>    
   
    <table id = "contactDetails">
        <tr>
            <th>Email <br> <?= $dash['email']; ?></th>
            <th>Telephone <br> <?= $dash['telephone']; ?></th>
        </tr>
        <tr>
            <th>Company <br> <?= $dash['company']; ?> </th>
            <th>Type <br> <?= $dash['type']; ?></th>
        </tr>
    </table>

    <?php
        include "addNote.php";
    endif; 
    ?>
</section>