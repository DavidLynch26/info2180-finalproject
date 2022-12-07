<?php
    session_start();
    include "sideBar.php";
    include "generateCsfr.php";
?>

<section id = "loader">
    <h1>New User</h1>
    <form action="newUser.php">
    <input type="hidden" id="csfrToken" value= "<?php echo $key; ?>" >
        <label for="firstName">First Name
            <input type="text">
        </label>
        <label for="lastName">Last Name
            <input type="text">
        </label>
        <label for="email">Email
            <input type="text">
        </label>
        <label for="password">Password
            <input type="text">
        </label>
        <label for="roles">Role
            <select name="roles" id="roleSelector">
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
            </select>
        </label>
        <label for="title">Title
            <select name="titles" id="titleSelector">
                <option value = "Mr.">Mr</option>
                <option value = "Mrs.">Mrs</opion>
                <option value = "Ms.">Ms</option>
                <option value = "Dr.">Dr</option>
                <option value = "Prof.">Prof</option>
            </select>
        </label>
        <button id = "saveButton" type = "button">Save</button>
    </form>
</section>