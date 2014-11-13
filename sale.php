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
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </header>
    <div class="pure-menu pure-menu-open pure-menu-horizontal">

    <ul>
   <h2>     <li><a href="home.php">Items</a></li>
        <li><a href="employee.php">Employees</a></li>
        <li><a href="client.php">Clients</a></li>
        <li><a href="customer.php">Customers</a></li>
        <li class="pure-menu-selected"><a href="sale.php">Sales</a></li>
   </h2>
    </ul>
</div>
    <h2 align="center">Sold Products</h2>
   <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
          <li><a href="add_customer.php">Add Sale</a></li>
        </ul>
        </div>
    </nav>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Customer</th>
            <th>Sale Time</th>
            <th>Selling Price</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $queryitem = mysql_query("Select * from item WHERE customer_id IS NOT NULL");
          $querycustomer = mysql_query("Select * from person");
          while($row = mysql_fetch_array($queryitem))
          {
            echo "<tr>";
              echo '<td align="center"><a href="item.php?id='. $row['item_id'] .'">'. $row['item_id'] . "</a></td>";
              $item_id=$row['item_id'];
              echo '<td align="center">'. $row['name'] . "</td>";
              echo '<td align="center">'. $row['description'] . "</td>";
              $person_id = $row['customer_id'];
              $sql =  "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$person_id'";
              $name = mysql_query($sql);
              $rowp = mysql_fetch_array($name);

              $sqls =  "SELECT selling_time FROM `customer` WHERE `item_id` = '$item_id'";
              $names = mysql_query($sqls);
              $rows = mysql_fetch_array($names);

              $sqlsp =  "SELECT price FROM `selling_price` WHERE `item_id` = '$item_id'";
              $namesp = mysql_query($sqlsp);
              $rowsp = mysql_fetch_array($namesp);

              echo '<td align="center"><a href="person.php?id='. $row['customer_id'] .'">'. $rowp['f_name']." ". $rowp['l_name'] . "</a></td>";
              echo '<td align="center">'. $rows['selling_time'] . "</a></td>";
              echo '<td align="center">'."Rs. ". $rowsp['price'] . "</a></td>";
            echo "</tr>";
          }
        ?>
    </tbody>
</table>
<?php
include "footer.php";
?>
</div>
</body>
</html>