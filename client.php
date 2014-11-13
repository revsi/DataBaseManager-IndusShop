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
    </header>
       <div class="pure-menu pure-menu-open pure-menu-horizontal">

    <ul>
   <h2>     <li><a href="home.php">Items</a></li>
        <li><a href="employee.php">Employees</a></li>
        <li class="pure-menu-selected"><a href="client.php">Clients</a></li>
        <li><a href="customer.php">Customers</a></li>
        <li><a href="sale.php">Sales</a></li>
   </h2>
    </ul>
</div>
    <h1 align="center">Clients</h1>
    <hr>
        <nav class="float-right">
      <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
          <li><a href="add_client.php">Add Client</a></li>
        </ul>
        </div>
    </nav>
    </br>
    <h2 align="center">Dealers</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Dealer Id</th>
            <th>Name</th>
            <th>Item_id</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $querydealer = mysql_query("Select * from dealer");
          $queryperson = mysql_query("Select * from person");
          while($rowd = mysql_fetch_array($querydealer))
          {
            echo "<tr>";
             
             echo '<td align="center"><a href="person.php?id='. $rowd['dealer_id'] .'">'. $rowd['dealer_id'] . "</a></td>";
              $dealer_id = $rowd['dealer_id'];
              $sql1 = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$dealer_id'";
             // echo $sql;
              $name=mysql_query($sql1);
              $row = mysql_fetch_array($name);
              echo '<td align="center">'. $row['f_name'] . " " . $row['l_name'] . "</td>";
              $sql2 = "SELECT item_id FROM `item` WHERE client_id='$dealer_id'";
              $item_id=mysql_query($sql2);
              echo '<td align="center">';
              $c=0;
              while($rowi = mysql_fetch_array($item_id)){
                  if($c!=0){
                  echo ','. '<a href="item.php?id='. $rowi['item_id'] .'">'. $rowi['item_id'] . "</a>" . "";

                }
                else{
                  echo   '<a href="item.php?id='. $rowi['item_id'] .'">'. $rowi['item_id'] . "</a>". "";
                }$c++;
              }
              echo '</td>';
              echo '<td align="center"> <a href="edit_client.php?id='. $rowd['dealer_id'] .'"> edit </a> </td>';
              echo '<td align="center"> <a href="delete_client.php?id='. $rowd['dealer_id'] .'"> delete </a></td>';
            echo "</tr>";
          }
        ?>
    </tbody>
</table>
<br><br><br>
<h2 align="center">Seller</h2>
    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Seller Id</th>
            <th>Name</th>
            <th>Item_id</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $queryseller = mysql_query("Select * from seller");
          $queryperson = mysql_query("Select * from person");
          while($rowd = mysql_fetch_array($queryseller))
          {
            echo "<tr>";
             echo '<td align="center"><a href="person.php?id='. $rowd['seller_id'] .'">'. $rowd['seller_id'] . "</a></td>";
              $seller_id = $rowd['seller_id'];
              $sql1 = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$seller_id'";
             // echo $sql;
              $name=mysql_query($sql1);
              $row = mysql_fetch_array($name);
              echo '<td align="center">'. $row['f_name'] . " " . $row['l_name'] . "</td>";
              $sql2 = "SELECT item_id FROM `item` WHERE client_id='$seller_id'";
              $item_id=mysql_query($sql2);
              echo '<td align="center">';
              $c=0;
              while($rowi = mysql_fetch_array($item_id)){
                  if($c!=0){
                  echo ','. '<a href="item.php?id='. $rowi['item_id'] .'">'. $rowi['item_id'] . "</a>" . "";

                }
                else{
                  echo   '<a href="item.php?id='. $rowi['item_id'] .'">'. $rowi['item_id'] . "</a>". "";
                }$c++;
              }
              echo '</td>';
              echo '<td align="center"> <a href="edit_client.php?id='. $rowd['seller_id'] .'"> edit </a> </td>';
              echo '<td align="center"> <a href="delete_client.php?id='. $rowd['seller_id'] .'"> delete </a></td>';
            echo "</tr>";
          }
        ?>
    </tbody>
</table>
<br><br><br>
<h2 align="center">Auctioners</h2>

    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Auctioner Id</th>
            <th>Name</th>
            <th>Item_id</th>
            <th>Auction dates</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
          include "connect.inc.php";
          $queryauctioner = mysql_query("Select * from auctioner");
          $queryperson = mysql_query("Select * from person");
          while($rowd = mysql_fetch_array($queryauctioner))
          {
            echo "<tr>";
             echo '<td align="center"><a href="person.php?id='. $rowd['auctioner_id'] .'">'. $rowd['auctioner_id'] . "</a></td>";
              $auctioner_id = $rowd['auctioner_id'];
              $sql1 = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$auctioner_id'";
             // echo $sql;
              $name=mysql_query($sql1);
              $row = mysql_fetch_array($name);
              echo '<td align="center">'. $row['f_name'] . " " . $row['l_name'] . "</td>";
              $sql2 = "SELECT item_id FROM `item` WHERE client_id='$auctioner_id'";
              $item_id=mysql_query($sql2);
              echo '<td align="center">';
              $c=0;
              while($rowi = mysql_fetch_array($item_id)){
                  if($c!=0){
                  echo ','. '<a href="item.php?id='. $rowi['item_id'] .'">'. $rowi['item_id'] . "</a>" . "";

                }
                else{
                  echo   '<a href="item.php?id='. $rowi['item_id'] .'">'. $rowi['item_id'] . "</a>". "";
                }$c++;
              }
              echo '</td>';
              echo '<td align="center">'. $rowd['auction_date'] . "</td>";
              echo '<td align="center"> <a href="edit_client.php?id='. $rowd['auctioner_id'] .'"> edit </a> </td>';
              echo '<td align="center"> <a href="delete_client.php?id='. $rowd['auctioner_id'] .'"> delete </a></td>';
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