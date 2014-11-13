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
       $sql_query="DELETE FROM item WHERE item_id='$id'";
      // $result1=mysql_query($sql_query1);
       //$result2=mysql_query($sql_query2);
      // $result3=mysql_query($sql_query3);
      // $result4=mysql_query($sql_query4);
       $result=mysql_query($sql_query);
      // $result=mysql_query($sql_query);
       if(/*($result and $result2 and $result1 and $result3 and $result4 and*/ $result){
              header("location:home.php");
        }
        else{
          echo mysql_error();
        }
    }
?>