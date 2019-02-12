<?php
  $connect =mysqli_connect('localhost','root','aodalsgh1','bulletin');
  $regist_day = date("Y-m-d (H:i)");  

  $sql = "select * from list where num=$_GET[num]";
  $result = mysqli_query($connect,$sql);
  $row = mysqli_fetch_array($result);

 
  if ($_POST[passwd] != $row[passwd] and $userid != "admin")
  {
      echo $sql;
      echo $_POST[num];
      echo $_POST[passwd];
     exit;
  } 
  else
  {
      $sql = "delete from list where num = $_GET[num]";
       mysqli_query($connect,$sql);
       mysqli_close();
      Header("Location:list.php");
  }

?>


