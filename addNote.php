<?php 
    include "setConnection.php"; 

    $queryString = "SELECT * FROM contacts WHERE id = '$id'";
    $grab = $conn->query($queryString);
    $dash = $grab->fetch(PDO::FETCH_ASSOC);

    $queryString = "SELECT * FROM notes WHERE contact_id = '$id'";
?>
<div id = "notes">
    <h3><img src="notesIcon.png" alt="Notes Icon">Notes</h3><hr>

</div>

<label for="addnote"> Add a note about <?= $dash['firstname']?>; 
    <input type = "text" placeholder = "Enter Note Here">
</label>
<button id = "addButton" type = "button">Add Note</button>