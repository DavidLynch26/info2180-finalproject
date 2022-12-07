<?php 
    include "sideBar.php";
    include "generateCsfr.php";
    include "setConnection.php";
?>

<section id="loader">
    <form action="newContact.php" method="POST">
        <input type="hidden" id= "csrfToken" value= "<?php echo $key; ?>" >
        <h1 id="NewUserHeading">New Contact</h1>
        <hr>

        <select name="titles" id="titleSelector">
            <option value = "Mr.">Mr</option>
            <option value = "Mrs.">Mrs</opion>
            <option value = "Ms.">Ms</option>
            <option value = "Dr.">Dr</option>
            <option value = "Prof.">Prof</option>
        </select>                

        <label for="firstName"><b>Firstname</b>
            <input type="text" name="firstname" id="firstname">
        </label>
        <label for="lastName"><b>Lastname</b>
            <input type="text" name="lastname" id="lastname">
        </label>
        <label for="email"><b>Email</b>
            <input type="text" name="email" id="email">
        </label>
        <label for="tel"><b>Telephone</b>
            <input type="text" name="telephone" id="telephone">
        </label>
        <label for="company"><b>Company</b>
            <input type="text" name="company" id="company">
        </label>

        <select id="typeSelector">
            <option value="Support">Support</option>
            <option value="Sales Lead">Sales Lead</option>
        </select>

        <select name="" id="">
        <?php 
            $stmt = $conn->query("SELECT * FROM users");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $result):?>
                <option value="<?= $result['id']; ?>"></option>
            <?php endforeach; ?>
        ?>
        </select>
        <button type="button" id="saveButton">Save</button>
    </form>
</section>