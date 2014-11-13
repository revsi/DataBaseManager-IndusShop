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
    $f_name = mysql_real_escape_string($_POST['f_name']);
    $l_name = mysql_real_escape_string($_POST['l_name']);
    $dob = mysql_real_escape_string($_POST['dob']);
    $sex = mysql_real_escape_string($_POST['sex']);
    $item_id = mysql_real_escape_string($_POST['item_id']);
    $house_no = mysql_real_escape_string($_POST['house_no']);
    $street = mysql_real_escape_string($_POST['street']);
    $city = mysql_real_escape_string($_POST['city']);
    $state = mysql_real_escape_string($_POST['state']);
    $country = mysql_real_escape_string($_POST['country']);
    $mobile = mysql_real_escape_string($_POST['mobile']);
    $landline = mysql_real_escape_string($_POST['landline']);
    $email = mysql_real_escape_string($_POST['email']);
    $age = date_diff(date_create($dob), date_create('today'))->y;
    $timestamp = mysql_real_escape_string($_POST['timestamp']);
  
    $sql_person = "INSERT INTO `indus_shop`.`person` (`person_id`, `f_name`, `l_name`, `dob`, `sex`, `age`)
      VALUES (NULL,'$f_name','$l_name','$dob','$sex','$age');";
    $result_person = mysql_query($sql_person);

    $person_id=mysql_insert_id();
    $sql_customer = "INSERT INTO `indus_shop`.`customer` (`customer_id`, `item_id`, `selling_time`)
       VALUES ('$person_id','$item_id','$timestamp');";
    $result_customer = mysql_query($sql_customer);

    $sql_address = "INSERT INTO `indus_shop`.`address` (`person_id`, `house_no`, `street`, `city`, `state`, `country`)
      VALUES ('$person_id','$house_no','$street','$city','$state','$country');";
    $result_address = mysql_query($sql_address);

    $sql_contact = "INSERT INTO `indus_shop`.`contact` (`person_id`, `mobile`, `landline`, `email`)
      VALUES ('$person_id','$mobile','$landline','$email');";
    $result_contact = mysql_query($sql_contact);

    $sql = "UPDATE `indus_shop`.`item` SET `customer_id` = $person_id WHERE `item`.`item_id` = '$item_id'";
    $result_item = mysql_query($sql);

    if($result_customer and $result_person and $result_contact and $result_address and $result_item){
      echo("succeded");
      header("location: customer.php");
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