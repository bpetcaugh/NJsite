<?php

if(isset($_GET['policy_name']) )
{
  $name = $_GET['policy_name'];
  $url = "location: ./res/policies/". $name .".pdf";
  header($url);
} else {
    header("location: index.php");
}


?>