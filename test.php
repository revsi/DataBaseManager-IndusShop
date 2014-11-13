<?php
include "connect.inc.php";
          $querycustomer = mysql_query("Select * from customer");
          $queryperson = mysql_query("Select * from person");
          while($rowc = mysql_fetch_array($querycustomer))
          {
            //echo "<tr>";
              //echo '<td align="center">'. $rowc['customer_id'] . "</td>";
              $customer_id = $rowc['customer_id'];
              $sql = "SELECT f_name,l_name FROM `person` WHERE `person_id` = '$customer_id'";
              $name=mysql_query($sql);
              $row = mysql_fetch_array($name);
              echo $row['f_name'];
              if($name){
                echo $name['f_name'];
                echo "string";
              }
              else{
                die(mysql_error());
              }
            }
              ?>