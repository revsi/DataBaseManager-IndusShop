<?php
 session_start();
  if($_SESSION['user']){
  }
  else{
    header("location:index.php");
  }
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
        $conn_error = 'Could not connect';
        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $mysql_pass = '';
        $mysql_db = 'indus_shop';
        mysql_connect($mysql_host, $mysql_user, $mysql_pass);
        mysql_select_db($mysql_db)or die("Cannot connect to database");
        $name = mysql_real_escape_string($_POST['name']);
        $description = mysql_real_escape_string($_POST['description']);
        $condition = mysql_real_escape_string($_POST['condition']);
        $customer_id = mysql_real_escape_string($_POST['customer_id']);
        $client_id = mysql_real_escape_string($_POST['client_id']);
        $collector_id = mysql_real_escape_string($_POST['collector_id']);
        $item_id = mysql_real_escape_string($_POST['item_id']);
        if($customer_id==''){
          $sql = "UPDATE `indus_shop`.`item` SET `name` = '$name', `description` = '$description', `condition` = '$condition',
            `customer_id` = NULL,`collector_id` = '$collector_id', `client_id` = '$client_id' WHERE `item`.`item_id` = '$item_id'";
        }
        else{
           $sql = "UPDATE `indus_shop`.`item` SET `name` = '$name', `description` = '$description', `condition` = '$condition',
           `customer_id` = $customer_id,`collector_id` = '$collector_id', `client_id` = '$client_id' WHERE `item`.`item_id` = '$item_id'";
         }
        echo $sql;
    	$result = mysql_query($sql);
        if($result){
          //echo("succeded");
          header("location: home.php");
        }
       else{
           die(mysql_error());
          Print '<script>alert("Error Occured");</script>'; //Prompts the user
          Print '<script>window.location.assign("home.php");</script>';
        }
        //header("location: home.php");*/
    
  }
?>