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
   require "connect.inc.php";
   $customer_query=mysql_query("SELECT customer_id FROM customer") or die ("Error Occurred");
   $client_query=mysql_query("SELECT client_id FROM client") or die ("Error Occurred");
   $collector_query=mysql_query("SELECT collector_id FROM collector") or die ("Error Occurred");
   ?>
<body>
<div class="container">
<header>
      <div class="logo" >Indus Shop Database Management</div>
      <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
            <li><a href="customer.php">Go Back</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </header>
    <h2 align="center">Add Customer and Sale</h2>
<form class="pure-form pure-form-aligned" action="addcustomer.php" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">Customer First Name</label>
            <input id="name" type="text" placeholder="First name" name="f_name">
        </div>
        <div class="pure-control-group">
            <label for="name">Customer Last Name</label>
            <input id="name" type="text" placeholder="Last Name" name="l_name">
        </div>

        <div class="pure-control-group">
            <label >Date of Birth</label>
            <input type="date" placeholder="" name="dob">
        </div>

        <div class="pure-control-group">
            <label >Sex</label>
            <input type="radio" name="sex" value="m">Male
            <input type="radio" name="sex" value="f">Female
        </div>

        <div class="pure-control-group">
            <label >Item ID</label>
           <select name = "item_id">
            <?php
            $item_query=mysql_query("SELECT item_id FROM item WHERE customer_id IS NULL ");
            while ($row=mysql_fetch_array($item_query)) {
                $cdTitle=$row["item_id"];
                echo "<option value='$cdTitle'> $cdTitle </option>";
            }
            ?>
            </select>

            <input readonly type="datetime"  name="timestamp" value="<?php $timestamp = date('Y-m-d G:i:s'); echo $timestamp; ?>"/>
        </div>  

        <br>
        <br>
        <h3>Add Address</h3>
        <div class="pure-control-group">
            <label >House Number</label>
             <input type="number"  placeholder="House number" name="house_no">
            </select>
        </div>
<div class="pure-control-group">
            <label >Street</label>
             <input type="text"  placeholder="Street Name" name="street">
            </select>
        </div>
        <div class="pure-control-group">
            <label >City</label>
             <input type="text"  placeholder="City Name" name="city">
            </select>
        </div>
        <div class="pure-control-group">
            <label >State</label>
             <input type="text"  placeholder="State Name" name="state">
            </select>
        </div>
        <div class="pure-control-group">
            <label >Country</label>
             <input type="text"  placeholder="Country" name="country">
            </select>
        </div>

         <br>
        <br>
        <h3>Add Contact</h3>
        <div class="pure-control-group">
            <label >Mobile</label>
             <input type="number"  placeholder="Mobile number" name="mobile">
            </select>
        </div>
                <div class="pure-control-group">
            <label >Landline</label>
             <input type="number"  placeholder="Landline" name="landline">
            </select>
        </div>
                <div class="pure-control-group">
            <label >Email</label>
             <input type="email"  placeholder="Email ID" name="email">
            </select>
        </div>


        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
</form>

<?php
include "footer.php";
?>
</div>
</body>
</html>
