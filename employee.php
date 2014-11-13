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
   <h2>     <li ><a href="home.php">Items</a></li>
        <li class="pure-menu-selected"><a href="employee.php">Employees</a></li>
        <li><a href="client.php">Clients</a></li>
        <li ><a href="customer.php">Customers</a></li>
        <li><a href="sale.php">Sales</a></li>
   </h2>
    </ul>
</div>

    <h1 align="center">Employees</h1>

    <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
          <li><a href="add_employee.php">Add Employee</a></li>
        </ul>
        </div>
    </nav>

    </br>
    <h2 align="center">Regural Worker</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Worker Id</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Date of Joining</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $queryworker = mysql_query("Select * from regular_worker");
          $queryperson = mysql_query("Select * from person");
          $queryemployee=mysql_query("Select * from employee");
          while($roww = mysql_fetch_array($queryworker))
          {
            echo "<tr>";  
             echo '<td align="center"><a href="person.php?id='. $roww['emp_id'] .'">'. $roww['emp_id'] . "</a></td>";
              $worker_id = $roww['emp_id'];
              $sql1 = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$worker_id'";
              $name=mysql_query($sql1);
              $row = mysql_fetch_array($name);
              echo '<td align="center">'. $row['f_name'] . " " . $row['l_name'] . "</td>";



              $sql2 = "SELECT salary,doj FROM `employee` WHERE `emp_id` = '$worker_id'";
              $sal=mysql_query($sql2);
              $rows = mysql_fetch_array($sal);
              echo '<td align="center">'. $rows['salary']. "</td>";
              echo '<td align="center">'. $rows['doj']. "</td>";





              echo '<td align="center"> <a href="edit_employee.php?id='. $roww['emp_id'] .'"> edit </a> </td>';
              echo '<td align="center"> <a href="delete_employee.php?id='. $roww['emp_id'] .'"> delete </a></td>';
            echo "</tr>";
          }
        ?>
    </tbody>
</table>
<br><br><br>
<h2 align="center">Specialists</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Specialist Id</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Date of Joining</th>
            <th>Item_id</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $queryspecialist = mysql_query("Select * from specialist");
          $queryperson = mysql_query("Select * from person");
          while($rows = mysql_fetch_array($queryspecialist))
          {
            echo "<tr>";
              echo '<td align="center"><a href="person.php?id='. $rows['emp_id'] .'">'. $rows['emp_id'] . "</a></td>";
              $specialist_id = $rows['emp_id'];
              $sql1 = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$specialist_id'";
             // echo $sql;
              $name=mysql_query($sql1);
              $row = mysql_fetch_array($name);
              echo '<td align="center">'. $row['f_name'] . " " . $row['l_name'] . "</td>";/*
              $sql2 = "SELECT item_id FROM `item` WHERE client_id='$_id'";
              $item_id=mysql_query($sql2);
              echo '<td align="center">';
              while($rowi = mysql_fetch_array($item_id))
              {echo ','. $rowi['item_id'] . "";}
              echo '</td>'; */

              $sql2 = "SELECT salary,doj FROM `employee` WHERE `emp_id` = '$specialist_id'";
              $sal=mysql_query($sql2);
              $rowd = mysql_fetch_array($sal);
              echo '<td align="center">'. $rowd['salary']. "</td>";
              echo '<td align="center">'. $rowd['doj']. "</td>";
              echo '<td align="center"><a href="item.php?id='. $rows['item_id'] .'">'. $rows['item_id'] . "</a></td>";
              echo '<td align="center"> <a href="edit_employee.php?id='. $rows['emp_id'] .'"> edit </a> </td>';
              echo '<td align="center"> <a href="delete_employee.php?id='. $rows['emp_id'] .'"> delete </a></td>';
            echo "</tr>";
          }
        ?>
    </tbody>
</table>
<br><br><br>
<h2 align="center">Collectors</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Collector Id</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Date of Joining</th>
            <th>Item_id</th>
            <th>Client id</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $querycollector = mysql_query("Select * from collector");
          $queryperson = mysql_query("Select * from person");
          while($rowc = mysql_fetch_array($querycollector))
          {
            echo "<tr>";
              echo '<td align="center"><a href="person.php?id='. $rowc['collector_id'] .'">'. $rowc['collector_id'] . "</a></td>";
              $collector_id = $rowc['collector_id'];
              $sql1 = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$collector_id'";
             // echo $sql;
              $name=mysql_query($sql1);
              $row = mysql_fetch_array($name);
              echo '<td align="center">'. $row['f_name'] . " " . $row['l_name'] . "</td>";
              $sql2 = "SELECT salary,doj FROM `employee` WHERE `emp_id` = '$collector_id'";
              $sal=mysql_query($sql2);
              $rowd = mysql_fetch_array($sal);
              echo '<td align="center">'. $rowd['salary']. "</td>";
              echo '<td align="center">'. $rowd['doj']. "</td>";
            //  echo ''
              echo '<td align="center"><a href="item.php?id='. $rowc['item_id'] .'">'. $rowc['item_id'] . "</a></td>";
              echo '<td align="center"><a href="person.php?id='. $rowc['client_id'] .'">'. $rowc['client_id'] . "</a></td>";
              echo '<td align="center"> <a href="edit_employee.php?id='. $rowc['collector_id'] .'"> edit </a> </td>';
              echo '<td align="center"> <a href="delete_employee.php?id='. $rowc['collector_id'] .'"> delete </a></td>';
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