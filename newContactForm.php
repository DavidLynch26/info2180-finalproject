<?php
    session_start();
    include "sideBar.php";
    include "generateCsfr.php";
    include "setConnection.php";
?>
<section id="loader">
    <h1 id="NewUserHeading">New Contact</h1>
    <form action="newContact.php" method="POST">
        <input type="hidden" id= "csrfToken" value= "<?php echo $key; ?>" >

        <label for="titles"><b>Title</b><br>
            <select name="titles" id="titleSelector">
                <option value = "Mr.">Mr</option>
                <option value = "Mrs.">Mrs</opion>
                <option value = "Ms.">Ms</option>
                <option value = "Dr.">Dr</option>
                <option value = "Prof.">Prof</option>
            </select>   
        </label>             

        <label for="firstName"><b>First Name</b><br>
            <input type="text" name="firstname" id="firstname" placeholder="First Name">
        </label>
        <label for="lastName"><b>Last Name</b><br>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name">
        </label>
        <label for="email"><b>Email</b><br>
            <input type="text" name="email" id="email" placeholder="Email">
        </label>
        <label for="tel"><b>Telephone</b><br>
            <input type="text" name="telephone" id="telephone" placeholder="999-999-9999">
        </label>
        <label for="company"><b>Company</b><br>
            <input type="text" name="company" id="company" placeholder="Company Name">
        </label>
        <label for="types"><b>Type</b><br>
            <select id="typeSelector">
                <option value="Support">Support</option>
                <option value="Sales Lead">Sales Lead</option>
            </select>
        </label>
        <label for="assigned"><b>Assigned To</b><br>
            <select id="assignedSelector">
                <?php 
                    $stmt = $conn->query("SELECT * FROM users");
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach($results as $result):?>
                        <option value="<?= $result['id']; ?>"><?= $result['title']." ".$result['firstname']." ".$result['lastname']; ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="button" id="saveButton">Save</button>
    </form>
</section>