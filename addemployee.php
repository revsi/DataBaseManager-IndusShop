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
    $doj = mysql_real_escape_string($_POST['doj']);
    $salary = mysql_real_escape_string($_POST['salary']);
  
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

    $sql_employee = "INSERT INTO `indus_shop`.`employee` (`emp_id`,`salary`,`doj`)
       VALUES ('$person_id','$salary','$doj');";
    $result_employee = mysql_query($sql_employee);

    

    if ($type == 'collector'){
      $sql_collector = "INSERT INTO `indus_shop`.`collector` (`collector_id`)
      VALUES ('$person_id');";
      $result_collector = mysql_query($sql_collector);
      $result_regular = 1;
      $result_specialist = 1;
    }

    if ($type == 'specialist'){
      $sql_specialist = "INSERT INTO `indus_shop`.`specialist` (`emp_id`)
      VALUES ('$person_id');";
      $result_specialist = mysql_query($sql_specialist);
      $result_regular = 1;
      $result_collector = 1;
    }

    if ($type == 'regular'){
      $sql_regular = "INSERT INTO `indus_shop`.`regular_worker` (`emp_id`)
      VALUES ('$person_id');";
      $result_regular = mysql_query($sql_regular);
      $result_collector = 1;
      $result_specialist = 1;
    }

    if($result_specialist and $result_regular and $result_collector and $result_address and $result_contact and $result_employee and $result_person){
      echo("succeded");
      header("location: employee.php");
    }
    else{
      echo("failed");
      die(mysql_error());
      Print '<script>alert("Error Occured");</script>'; //Prompts the user
       Print '<script>window.location.assign("employee.php");</script>';

    }
    //header("location: home.php");
  }
  else
  {
    Print '<script>alert("Error Occured");</script>'; //Prompts the user
    Print '<script>window.location.assign("employee.php");</script>'; // redirects to login.php
  }

?>