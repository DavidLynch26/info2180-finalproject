<?php
    include "sidebar.php";

    if (isset($_POST['id'])):
        include "setConnection.php";
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $queryString = "SELECT * FROM contacts WHERE id = '$id'";
        $grab = $conn->query($queryString);
        $dash = $grab->fetch(PDO::FETCH_ASSOC);
?>
<section id = "loader">
    <h2><?php $name = $dash['title'] . $dash['firstname'] . $dash['lastname'];?></h2>
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
    include "addNote.php";
    endif; 
    ?>
</section>