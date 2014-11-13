<html>
    <?php
include "head.php";
?>
    <body>
    <div class="container">
    <header>
      <div class="logo" >Indus Shop Database Management</div>
       <nav class="float-right">
            <div class="pure-menu pure-menu-open pure-menu-horizontal">
            <ul>
            <li><a href="register.php">Register</a></li>
            </ul>
            </div>
        </nav>
    </header>
        <h2>Login Page</h2>
        <a href="index.php">Go back</a>
        
        <form class="pure-form pure-form-aligned" action="checklogin.php" method="POST">
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
            <button type="submit" class="pure-button pure-button-primary" type="submit" value="Login">Submit</button>
        </div>
    </fieldset>
</form>
    <?php
include "footer.php";
?>
    </div>
    </body>
</html>


