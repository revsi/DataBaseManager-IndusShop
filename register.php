<html>
    <?php
include "head.php";
?>
    <body>
    <div class="container">
    <header>
      <div class="logo" >Indus Shop Database Management</div>
    </header>
        <h2>Registration Page</h2>
        <a href="index.php">Go back</a>
        
        <form class="pure-form pure-form-aligned" action="register.php" method="POST">
       <fieldset>
        <div class="pure-control-group">
            <label for="name">Username</label>
            <input id="name" type="text" placeholder="Username" name="username" required="required">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" type="password" placeholder="Password" name="password" required="required">
        </div>

        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary" type="submit" value="Register">Submit</button>
        </div>
    </fieldset>
</form>
<?php
include "footer.php";
?>    </div>
    </body>
</html>


<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
    $bool = true;

  require 'connect.inc.php'; //Connect to database
  $query = mysql_query("Select * from users"); //Query the users table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }

  if($bool) // checks if bool is true
  {
    mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
  }

}
?>