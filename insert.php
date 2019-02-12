<?php

$connect =mysqli_connect('localhost','root','aodalsgh1','bulletin');
     $regist_day = date("Y-m-d (H:i)");  

     $sql = "Select *from list";
     $result = mysqli_query($connect,$sql);
     $nCount = 0;

  

     while($row = mysqli_fetch_array($result))
     {
        $nCount  =  (int)($row[num])+1;
       echo $nCount;
     }
     
      $ip = $_SEVER_["REMOTE_ADDR"];  
      if($ip == "")
      {
        $ip = "127.0.0.1";
      }
      $sql = " INSERT INTO list(num,name,passwd,subject,content,regist_day,hit)
      VALUES('{$nCount}','{$_POST[name]}','{$_POST[passwd]}' ,'{$_POST[subject]}','{$_POST[content]}',NOW(),0 )";
      $result=mysqli_query($connect,$sql);
      if($result == FALSE)
      {
        Header("write_form.php");  
        echo $sql;
      }
      else
      {
         Header("Location:list.php");  
      }
      mysqli_query($sql, $connect);
      mysqli_close();  
?>
