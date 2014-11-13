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
       $sql_query="DELETE FROM employee WHERE emp_id='$id'";
       $result=mysql_query($sql_query);
       if($result){
              header("location:employee.php");
        }
        else{
          echo mysql_error();
        }
    }
?>