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

        <select id="titleSelector">
            <option value="Mr."> Mr</option>
            <option value="Ms."> Ms</option> 
            <option value="Mrs."> Mrs</option>  
        </select>   

        <label for="firstName"><b>First Name</b>
            <input type="text" name="firstname" id="firstname">
        </label><br><br>
        <label for="lastName"><b>Last Name</b>
            <input type="text" name="lastname" id="lastname">
        </label><br><br>
        <label for="email"><b>Email</b>
            <input type="text" name="email" id="email">
        </label><br><br>
        <label for="tel"><b>Telephone</b>
            <input type="text" name="telephone" id="telephone">
        </label><br><br>
        <label for="company"><b>Company</b>
            <input type="text" name="company" id="company">
        </label><br><br>
        <select id="typeSelector">
            <option value="Support">Support</option>
            <option value="Sales Lead">Sales Lead</option>
        </select><br><br>
        <select id="assignedTo">
            <option value="Andy Bernard">Assigned To</option>
            <option value="Sales Lead">Sales Lead</option>
        </select><br><br>

        <select name="" id="">
        <?php 
            $stmt = $conn->query("SELECT * FROM users");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $result):?>
                <option value="<"></option>
            <?php endforeach; ?>
        ?>
        </select>
        <button type="button" id="saveButton">Save</button>
    </form>
</section>
