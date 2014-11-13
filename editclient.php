<?php
 session_start();
  if($_SESSION['user']){
  }
  else{
    header("location:index.php");
  }
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
        include "connect.inc.php";
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
        $person_id = mysql_real_escape_string($_POST['person_id']);

        $sql_person = "UPDATE `indus_shop`.`person` SET `f_name` = '$f_name' , `l_name`='$l_name', `dob`='$dob', `sex`='$sex', `age`='$age'
         WHERE `person`.`person_id` = '$person_id';";
        $result_person = mysql_query($sql_person);

        $sql_address = "UPDATE `indus_shop`.`address` SET `house_no` = '$house_no' , `street`='$street', `city`='$city', `state`='$state', `country`='$country'
         WHERE `address`.`person_id` = '$person_id';";
        $result_address = mysql_query($sql_address);

        $sql_contact = "UPDATE `indus_shop`.`contact` SET `mobile` = '$mobile' , `landline`='$landline', `email`= '$email'
         WHERE `contact`.`person_id` = '$person_id';";
        $result_contact = mysql_query($sql_contact);


        if($result_contact and $result_address and $result_person){
          //echo("succeded");
          header("location: client.php");
        }
       else{
           die(mysql_error());
          Print '<script>alert("Error Occured");</script>'; //Prompts the user
          Print '<script>window.location.assign("client.php");</script>';
        }
        //header("location: home.php");*/
    
  }
?>