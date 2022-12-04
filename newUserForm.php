<h1>New User</h1>

<form action="newUser.php">
    <label for="firstName"> First Name
        <input type="text">
    </label>
    <label for="lastName"> Last Name
        <input type="text">
    </label>
    <label for="email"> Email
        <input type="text">
    </label>
    <label for="password"> Password
        <input type="text">
    </label>
    <label for="roles"> Role
        <select name="roles" id="roleSelector">
            <option value="member">Member</option>
            <option value="admin">Admin</option>
        </select>
    </label>
    <button id = "saveButton" type = "button">Save</button>
</form>