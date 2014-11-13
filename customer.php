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
        <li class="pure-menu-selected"><a href="customer.php">Customers</a></li>
        <li><a href="sale.php">Sales</a></li>
   </h2>
    </ul>
</div>
    <h1 align="center">Customers</h1>
    <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
          <li><a href="add_customer.php">Add Customer</a></li>
        </ul>
        </div>
    </nav>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Customer Id</th>
            <th>Name</th>
            <th>Selling Time</th>
            <th>Item ID</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $querycustomer = mysql_query("Select * from customer");
          $queryperson = mysql_query("Select * from person");
          while($rowc = mysql_fetch_array($querycustomer))
          {
            echo "<tr>";
              $customer_id = $rowc['customer_id'];
              echo '<td align="center"><a href="person.php?id='. $customer_id .'">'. $customer_id . "</a></td>";
              
              $sql = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$customer_id'";
             // echo $sql;
              $name=mysql_query($sql);
              $row = mysql_fetch_array($name);
              echo '<td align="center">'. $row['f_name'] . " " . $row['l_name'] . "</td>";
              echo '<td align="center">'. $rowc['selling_time'] . "</td>";
              echo '<td align="center"><a href="item.php?id='. $rowc['item_id'] .'">'. $rowc['item_id'] . "</a></td>";
              echo '<td align="center"> <a href="edit_customer.php?id='. $rowc['customer_id'] .'"> edit </a> </td>';
              echo '<td align="center"> <a href="delete_customer.php?id='. $rowc['item_id'] .'"> delete </a></td>';
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