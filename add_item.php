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
            <li><a href="home.php">Go Back</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </header>
    <h2 align="center">Add Item</h2>
    <form class="pure-form pure-form-aligned" action="additem.php" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">Item Name</label>
            <input id="name" type="text" placeholder="Name" name="name">
        </div>

        <div class="pure-control-group">
            <label for="description">Item Description</label>
            <input id="description" type="text" placeholder="Description" name="description">
        </div>

        <div class="pure-control-group">
            <label for="condition">Condition</label>
            <input id="condition" type="text" placeholder="Condition" name="condition">
        </div>

        <div class="pure-control-group">
            <label for="customer_id">Customer ID</label>
            <select name = "customer_id">
            <?php
            while ($row=mysql_fetch_array($customer_query)) {
                $cdTitle=$row["customer_id"];
                echo "<option value='$cdTitle'> $cdTitle </option>";
            }
            ?>
            <option value=''>  </option>
            </select>

            <input readonly type="datetime"  name="timestamp" value="<?php $timestamp = date('Y-m-d G:i:s'); echo $timestamp; ?>"/>
        </div>

        <div class="pure-control-group">
            <label for="client">Client ID</label>
           <select name = "client_id">
            <?php
            while ($row=mysql_fetch_array($client_query)) {
                $cdTitle=$row["client_id"];
                echo "<option value='$cdTitle'> $cdTitle </option>";
            }
            ?>
            </select>
        </div>
        <div class="pure-control-group">
            <label >Cost Price</label>
             <input type="number" step="any" placeholder="price at which client sold" name="cost_price">
            </select>
        </div>

        <div class="pure-control-group">
            <label for="collector">Collector ID</label>
            <select name = "collector_id">
            <?php
            while ($row=mysql_fetch_array($collector_query)) {
                $cdTitle=$row["collector_id"];
                echo "<option value='$cdTitle'> $cdTitle </option>";
            }
            ?>
            </select>
        </div>
        <div class="pure-control-group">
            <label >Specialist ID</label>
            <select name = "specialist_id">
            <?php
            $specialist_query=mysql_query("SELECT emp_id FROM specialist") or die ("Error Occurred");
            while ($row=mysql_fetch_array($specialist_query)) {
                $cdTitle=$row["emp_id"];
                echo "<option value='$cdTitle'> $cdTitle </option>";
            }
            ?>
            </select>
        </div>
        <div class="pure-control-group">
            <label >Selling Price</label>
             <input type="number" step="any" placeholder="specialist decided price" name="selling_price">
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
