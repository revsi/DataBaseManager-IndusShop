<?php
    session_start(); //starts the session
    if($_SESSION['user']){ //checks if user is logged in
    }
    else {
       header("location:index.php"); //redirects if user is not logged in.
    }

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
       include 'connect.inc.php'; //Connect to database
       $id = $_GET['id'];
    }
    else
    {
       header("location:home.php");
    }
?>
<html lang="en">
<?php
include "head.php";
?>

<body>
<div class="container">
<header>
      <div class="logo" >Indus Shop Database Management Item Page</div>
      <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
          <li><a href="javascript:history.go(-1)">Go Back</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </header>
    <h2 align="center">Person Details</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Person Id</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Sex</th>
            <th>Age</th>
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
          $query = mysql_query("Select * from person Where person_id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              echo "<tr>";
              echo '<td align="center">'. $row['person_id'] . "</td>";
              echo '<td align="center">'. $row['f_name'] ." " . $row['l_name']. "</td>";
              echo '<td align="center">'. $row['dob'] . "</td>";
              echo '<td align="center">'. $row['sex'] . "</td>";
              echo '<td align="center">'. $row['age'] . "</td>";
            echo "</tr>";
            /*$name=$row['name'];
            $description=$row['description'];
            $condition=$row['condition'];
            $customer_id=$row['customer_id'];
            $client_id=$row['client_id'];
            $collector_id=$row['collector_id'];*/
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
 <h2 align="center">Address</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Person Id</th>
            <th>house no</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
    </thead>

    <tbody>
        <?php
        if(!empty($_GET['id']))
        {
          $id = $_GET['id'];
          $_SESSION['id'] = $id;
          $id_exists = true;
          include "connect.inc.php";//connect to database
          $query = mysql_query("Select * from address Where person_id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              echo "<tr>";
              echo '<td align="center">'. $row['person_id'] . "</td>";
              echo '<td align="center">'. $row['house_no'] . "</td>";
              echo '<td align="center">'. $row['street'] . "</td>";
              echo '<td align="center">'. $row['city'] . "</td>";
              echo '<td align="center">'. $row['state'] . "</td>";
              echo '<td align="center">'. $row['country'] . "</td>";
            echo "</tr>";
           
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
<h2 align="center">Contact</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Person_Id</th>
            <th>Mobile</th>
            <th>Landline</th>
            <th>email</th>
    </thead>

    <tbody>
        <?php
        if(!empty($_GET['id']))
        {
          $id = $_GET['id'];
          $_SESSION['id'] = $id;
          $id_exists = true;
          include "connect.inc.php";//connect to database
          $query = mysql_query("Select * from contact Where person_id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              echo "<tr>";
              echo '<td align="center">'. $row['person_id'] . "</td>";
              echo '<td align="center">'. $row['mobile'] . "</td>";
              echo '<td align="center">'. $row['landline'] . "</td>";
              echo '<td align="center">'. $row['email'] . "</td>";
            echo "</tr>";           
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

 <br/>
 <br/>
<?php
include "footer.php";
?>
</div>
</body>
</html>