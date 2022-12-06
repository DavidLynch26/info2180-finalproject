

            <!-- Sidebar-->
            <section id  = "sideBar">
                 <?php include 'sideBar.php'; ?> 
    
            </section>
            <section id="loader">
                <form action="add_new_user.php" method="POST">

                    <div class="addUserContainer">
                        <h1 id="NewUserHeading">New Contact</h1>
                        <hr>
                        <select id="titleSelector" >
                            <option value="Mr."> Mr</option>
                            <option value="Ms."> Ms</option> 
                            <option value="Mrs."> Mrs</option>  
</select>                       
                        <label for="firstname"><b>Firstname</b></label>
                        <input type="text" name="firstname" id="firstname" required>
                    
                        <label for="lastname"><b>Lastname</b></label>
                        <input type="text" name="lastname" id="lastname" required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" name="email" id="email" required>
                        
                        <label for="tel"><b>Telephone</b></label>
                        <input type="text" name="telephone" id="telephone" required>  
                        
                        <label for="company"><b>Company</b></label>
                        <input type="text" name="company" id="company" required>

                        <label for="type"><b>Type</b></label>
                        <input type="text" name="type" id="type" required>
                        
                        <label for="assign"><b>Assigned To</b></label>
                        <input type="assign" name="assign" id="assign" required>
                        
                        <button type="save" class="Savebtn">Save</button>
                    </div>

                </form>

</section>