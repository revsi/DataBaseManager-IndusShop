<html lang="en">
<?php
include "head.php";
?>
<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
<body>
<div class="container">
<header>
      <div class="logo" >Indus Shop Database Management</div>
      <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
        	<li><a href="client.php">Go back</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </header>
    <h2 align="center">Edit Client Details</h2>

    <?php
      if(!empty($_GET['id']))
      {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
        $id_exists = true;
        include "connect.inc.php";//connect to database
        $query_person = mysql_query("Select * from person Where person_id='$id'");
        $query_address = mysql_query("Select * from address Where person_id='$id'");
        $query_contact = mysql_query("Select * from contact Where person_id='$id'"); // SQL Query
        $rowp = mysql_fetch_array($query_person);
        $rowa = mysql_fetch_array($query_address);
        $rowc = mysql_fetch_array($query_contact);

        $f_name=$rowp['f_name'];
        $l_name=$rowp['l_name'];
        $dob=$rowp['dob'];
        $sex=$rowp['sex'];
        $house_no=$rowa['house_no'];
        $street=$rowa['street'];
        $city=$rowa['city'];
        $state=$rowa['state'];
        $country=$rowa['country'];
        $mobile=$rowc['mobile'];
        $landline=$rowc['landline'];
        $email=$rowc['email'];
      }
      else
      {
        $id_exists = false;
      }
    
    ?>
 <br/>
 <br/>
    <form class="pure-form pure-form-aligned" action="editclient.php" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">Client First Name</label>
            <?php
            echo '<input type="text" value="'.$f_name.'" name="f_name">';
          ?>
        </div>
        <div class="pure-control-group">
            <label for="name">Client Last Name</label>
            <?php
            echo '<input type="text" value="'.$l_name.'" name="l_name">';
          ?>
        </div>
         <?php
            echo '<input type="hidden" value="'.$id.'" name="person_id">';
          ?>
        <div class="pure-control-group">
            <label >Date of Birth</label>
            <?php
            echo '<input type="date" value="'.$dob.'" name="dob">';
          ?>
        </div>

        <div class="pure-control-group">
            <label >Sex</label>
            <?php
                if($sex=="m"){
                  $checkedm="checked";
                  $checkedf="";
                }
                else{
                  $checkedf="checked";
                  $checkedm="";
                }
                echo '<input type="radio" ' .$checkedm.  ' value="m" name="sex"> Male';
                echo '<input type="radio" '.$checkedf.' value="f" name="sex"> Female';
            ?>
        </div>

        <br>
        <h3>Add Address</h3>
        <div class="pure-control-group">
            <label >House Number</label>
             <?php
            echo '<input type="number" value="'.$house_no.'" name="house_no">';
          ?>
            </select>
        </div>
<div class="pure-control-group">
            <label >Street</label>
            <?php
            echo '<input type="text" value="'.$street.'" name="street">';
          ?>
            </select>
        </div>
        <div class="pure-control-group">
            <label >City</label>
              <?php
            echo '<input type="text" value="'.$city.'" name="city">';
          ?>

            </select>
        </div>
        <div class="pure-control-group">
            <label >State</label>
              <?php
            echo '<input type="text" value="'.$state.'" name="state">';
          ?>

            </select>
        </div>
        <div class="pure-control-group">
            <label >Country</label>
              <?php
            echo '<input type="text" value="'.$country.'" name="country">';
          ?>

            </select>
        </div>

         <br>
        <br>
        <h3>Add Contact</h3>
        <div class="pure-control-group">
            <label >Mobile</label>
              <?php
            echo '<input type="number" value="'.$mobile.'" name="mobile">';
          ?>

            </select>
        </div>
                <div class="pure-control-group">
            <label >Landline</label>
              <?php
            echo '<input type="number" value="'.$landline.'" name="landline">';
          ?>

            </select>
        </div>
                <div class="pure-control-group">
            <label >Email</label>
              <?php
            echo '<input type="email" value="'.$email.'" name="email">';
          ?>

            </select>
        </div>


        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Update</button>
        </div>
    </fieldset>
</form>

<?php
include "footer.php";
?>
</div>
</body>
</html>