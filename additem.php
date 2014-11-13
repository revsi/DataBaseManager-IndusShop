<?php
  session_start();
  if($_SESSION['user']){
  }
  else{
    header("location:index.php");
  }

  if($_SERVER['REQUEST_METHOD'] == "POST") //Added an if to keep the page secured
  {
    include 'connect.inc.php';
    $name = mysql_real_escape_string($_POST['name']);
    $description = mysql_real_escape_string($_POST['description']);
    $condition = mysql_real_escape_string($_POST['condition']);
    $customer_id = mysql_real_escape_string($_POST['customer_id']);
    $client_id = mysql_real_escape_string($_POST['client_id']);
    $collector_id = mysql_real_escape_string($_POST['collector_id']);
    $specialist_id = mysql_real_escape_string($_POST['specialist_id']);
    $selling_price = mysql_real_escape_string($_POST['selling_price']);
    $cost_price = mysql_real_escape_string($_POST['cost_price']);
    $timestamp = mysql_real_escape_string($_POST['timestamp']);
    $flag=0;
   // echo  $name."-".$description."-".$condition."-".$customer_id."-".$client_id."-".$collector_id;

    if($customer_id==''){
      $sql_item = "INSERT INTO `indus_shop`.`item` (`item_id`, `name`, `description`, `condition`, `collector_id`, `customer_id`, `client_id`)
     VALUES (NULL,'$name','$description','$condition','$collector_id',NULL,'$client_id');";
     $flag=1;
    }
    else{
    $sql_item = "INSERT INTO `indus_shop`.`item` (`item_id`, `name`, `description`, `condition`, `collector_id`, `customer_id`, `client_id`)
     VALUES (NULL,'$name','$description','$condition','$collector_id','$customer_id','$client_id');";
   }
    $result_item = mysql_query($sql_item);
    $item_id=mysql_insert_id();
    if($flag==0){
      $sql_customer = "INSERT INTO `indus_shop`.`customer` (`customer_id`, `item_id`, `selling_time`)
     VALUES ('$customer_id','$item_id','$timestamp');";
     $result_customer = mysql_query($sql_customer);
    }
    else{
      $result_customer=1;
    }
    $sql_cp = "INSERT INTO `indus_shop`.`cost_price` (`item_id`, `price`, `client_id`)
     VALUES ('$item_id','$cost_price','$client_id');"; 
    $result_cp = mysql_query($sql_cp);

    $sql_sp = "INSERT INTO `indus_shop`.`selling_price` (`item_id`, `price`, `specialist_id`)
     VALUES ('$item_id','$selling_price','$specialist_id');"; 
    $result_sp = mysql_query($sql_sp);

    $sql_collector = "INSERT INTO `indus_shop`.`collector` (`collector_id`, `item_id`, `client_id`)
     VALUES ('$collector_id','$item_id','$client_id');"; 
    $result_collector = mysql_query($sql_collector);

    $sql_specialist = "INSERT INTO `indus_shop`.`specialist` (`emp_id`, `item_id`)
     VALUES ('$specialist_id','$item_id');"; 
    $result_specialist = mysql_query($sql_specialist);

    if($result_item and $result_customer and $result_cp and $result_sp and $result_specialist and $result_collector){
      echo("succeded");
      header("location: home.php");
    }
    else{
      echo("failed");
      die(mysql_error());
      Print '<script>alert("Error Occured");</script>'; //Prompts the user
       Print '<script>window.location.assign("add_item.php");</script>';
    }
    //header("location: home.php");
  }
  else
  {
    Print '<script>alert("Error Occured");</script>'; //Prompts the user
    Print '<script>window.location.assign("add_item.php");</script>'; // redirects to login.php
  }
?>