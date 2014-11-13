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
    $house_no = mysql_real_escape_string($_POST['house_no']);
    $street = mysql_real_escape_string($_POST['street']);
    $city = mysql_real_escape_string($_POST['city']);
    $state = mysql_real_escape_string($_POST['state']);
    $country = mysql_real_escape_string($_POST['country']);
    $mobile = mysql_real_escape_string($_POST['mobile']);
    $landline = mysql_real_escape_string($_POST['landline']);
    $email = mysql_real_escape_string($_POST['email']);
    $age = date_diff(date_create($dob), date_create('today'))->y;
    $type = mysql_real_escape_string($_POST['type']);
    $auction_date = mysql_real_escape_string($_POST['auction_date']);
  
    $sql_person = "INSERT INTO `indus_shop`.`person` (`person_id`, `f_name`, `l_name`, `dob`, `sex`, `age`)
      VALUES (NULL,'$f_name','$l_name','$dob','$sex','$age');";
    $result_person = mysql_query($sql_person);

    $person_id=mysql_insert_id();

    $sql_address = "INSERT INTO `indus_shop`.`address` (`person_id`, `house_no`, `street`, `city`, `state`, `country`)
      VALUES ('$person_id','$house_no','$street','$city','$state','$country');";
    $result_address = mysql_query($sql_address);

    $sql_contact = "INSERT INTO `indus_shop`.`contact` (`person_id`, `mobile`, `landline`, `email`)
      VALUES ('$person_id','$mobile','$landline','$email');";
    $result_contact = mysql_query($sql_contact);

    $sql_client = "INSERT INTO `indus_shop`.`client` (`client_id`)
       VALUES ('$person_id');";
    $result_client = mysql_query($sql_client);

    

    if ($type == 'dealer'){
      $sql_dealer = "INSERT INTO `indus_shop`.`dealer` (`dealer_id`)
      VALUES ('$person_id');";
      $result_dealer = mysql_query($sql_dealer);
      $result_auctioner = 1;
      $result_seller = 1;
    }

    if ($type == 'seller'){
      $sql_seller = "INSERT INTO `indus_shop`.`seller` (`seller_id`)
      VALUES ('$person_id');";
      $result_seller = mysql_query($sql_seller);
      $result_auctioner = 1;
      $result_dealer = 1;
    }

    if ($type == 'auctioner'){
      $sql_auctioner = "INSERT INTO `indus_shop`.`auctioner` (`auctioner_id`,`auction_date`)
      VALUES ('$person_id','$auction_date');";
      $result_auctioner = mysql_query($sql_auctioner);
      $result_dealer = 1;
      $result_seller = 1;
    }

    if($result_client and $result_person and $result_contact and $result_address and $result_dealer and $result_auctioner and $result_seller){
      echo("succeded");
      header("location: client.php");
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