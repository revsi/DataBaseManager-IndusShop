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
      <div class="logo" >Indus Shop Database Management Home Page</div>
      <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
        	<li><a href="index.php">Go back</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </header>
    <h2 align="center">Edit Item Details</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Condition</th>
            <th>Customer_ID</th>
            <th>Client_ID</th>
            <th>Collector_ID</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
        if(!empty($_GET['id']))
        {
          $id = $_GET['id'];
          $_SESSION['id'] = $id;
          $id_exists = true;
          include "connect.inc.php";//connect to database
          $query = mysql_query("Select * from item Where item_id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              echo "<tr>";
              echo '<td align="center">'. $row['item_id'] . "</td>";
              echo '<td align="center">'. $row['name'] . "</td>";
              echo '<td align="center">'. $row['description'] . "</td>";
              echo '<td align="center">'. $row['condition'] . "</td>";
              if ($row['customer_id'] == NULL)
              {
                echo '<td align="center">'. 'Not yet sold' . "</td>";
              }
              else
              {
                echo '<td align="center">'. $row['customer_id'] . "</td>";
              }
              echo '<td align="center">'. $row['client_id'] . "</td>";
              echo '<td align="center">'. $row['collector_id'] . "</td>";
              echo '<td align="center"> <a href="deleteitem.php?id='. $row['item_id'] .'"> delete </a></td>';
            echo "</tr>";
            $name=$row['name'];
            $description=$row['description'];
            $condition=$row['condition'];
            $customer_id=$row['customer_id'];
            $client_id=$row['client_id'];
            $collector_id=$row['collector_id'];
            }
          }
          else
          {
            $id_exists = false;
          }
        }
        ?>
    </tbody>
</table>
<?php
   $customer_query=mysql_query("SELECT customer_id FROM customer") or die ("Error Occurred");
   $client_query=mysql_query("SELECT client_id FROM client") or die ("Error Occurred");
   $collector_query=mysql_query("SELECT collector_id FROM collector") or die ("Error Occurred");
   ?>
 <br/>
 <br/>
    <form class="pure-form pure-form-aligned" action="edititem.php" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">Item Name</label>
            <?php
            echo '<input id="name" type="text" value="'.$name.'" name="name">';
        	?>
        </div>
        <?php
            echo '<input type="hidden" value="'.$id.'" name="item_id">';
        	?>

        <div class="pure-control-group">
            <label for="description">Item Description</label>
            <?php
            echo '<input id="description" type="text" value="'.$description.'" name="description">';
        	?>
        </div>

        <div class="pure-control-group">
            <label for="condition">Condition</label>
            <?php
            echo '<input id="condition" type="text" value="'.$condition.'" name="condition">';
        	?>
        </div>

        <div class="pure-control-group">
            <label for="customer_id">Customer ID</label>
            <select name = "customer_id">
            <?php
            while ($row=mysql_fetch_array($customer_query)) {
                $cdTitle=$row["customer_id"];
                if($customer_id==$cdTitle){
                	echo "<option value='$cdTitle' selected> $cdTitle </option>";
                }
                else{
                	echo "<option value='$cdTitle'> $cdTitle </option>";
                }
            }
            ?>
            <option value=''>  </option>
            </select>
        </div>

        <div class="pure-control-group">
            <label for="client">Client ID</label>
           <select name = "client_id">
            <?php
            while ($row=mysql_fetch_array($client_query)) {
                $cdTitle=$row["client_id"];
                if($client_id==$cdTitle){
                	echo "<option value='$cdTitle' selected> $cdTitle </option>";
                }
                else{
                	echo "<option value='$cdTitle'> $cdTitle </option>";
                }
            }
            ?>
            </select>
        </div>

        <div class="pure-control-group">
            <label for="collector">Collector ID</label>
            <select name = "collector_id">
            <?php
            while ($row=mysql_fetch_array($collector_query)) {
                $cdTitle=$row["collector_id"];
                if($collector_id==$cdTitle){
                	echo "<option value='$cdTitle' selected> $cdTitle </option>";
                }
                else{
                	echo "<option value='$cdTitle'> $cdTitle </option>";
                }
            }
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