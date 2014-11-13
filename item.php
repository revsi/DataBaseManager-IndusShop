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
          <li><a href="home.php">Go back</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </header>
    <h2 align="center">Item Details</h2>
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
                echo '<td align="center"><a href="person.php?id='. $row['customer_id'] .'">'. $row['customer_id'] . "</a></td>";
                $flag=1;
              }
              echo '<td align="center"><a href="person.php?id='. $row['client_id'] .'">'. $row['client_id'] . "</a></td>";
              echo '<td align="center"><a href="person.php?id='. $row['collector_id'] .'">'. $row['collector_id']  . "</a></td>";
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
 <h2 align="center">Selling Price</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Item_Id</th>
            <th>Price</th>
            <th>Specialist ID</th>
    </thead>

    <tbody>
        <?php
        if(!empty($_GET['id']))
        {
          $id = $_GET['id'];
          $_SESSION['id'] = $id;
          $id_exists = true;
          include "connect.inc.php";//connect to database
          $query = mysql_query("Select * from selling_price Where item_id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              echo "<tr>";
              echo '<td align="center">'. $row['item_id'] . "</td>";
              echo '<td align="center">'. $row['price'] . "</td>";
               $sellp=$row['price'];
              echo '<td align="center"><a href="person.php?id='. $row['specialist_id'] .'">'. $row['specialist_id'] . "</a></td>";
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
<h2 align="center">Cost_Price</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Item_Id</th>
            <th>Price</th>
            <th>Client ID</th>
    </thead>

    <tbody>
        <?php
        if(!empty($_GET['id']))
        {
          $id = $_GET['id'];
          $_SESSION['id'] = $id;
          $id_exists = true;
          include "connect.inc.php";//connect to database
          $query = mysql_query("Select * from cost_price Where item_id='$id'"); // SQL Query
          $count = mysql_num_rows($query);
          if($count > 0)
          {
            while($row = mysql_fetch_array($query))
            {
              echo "<tr>";
              echo '<td align="center">'. $row['item_id'] . "</td>";
              echo '<td align="center">'. $row['price'] . "</td>";
               $sellc=$row['price'];
              echo '<td align="center"><a href="person.php?id='. $row['client_id'] .'">'. $row['client_id'] . "</a></td>";
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
<table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Approximated Profit</th>
    </thead>

    <tbody>
        <?php
              echo "<tr>";
              echo '<td align="center">'. ($sellp-$sellc)  . "</td>";
              echo "</tr>";   
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