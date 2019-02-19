<?php if(TRUE) :
  include "conn/connect.php";
  $regist_day = date("Y-m-d (H:i)");  

  $sql = "select passwd from list where num=$_GET[num]";
  $result = mysqli_query($connect,$sql);
  $row = mysqli_fetch_array($result);

 
  if ($_POST[passwd] != $row[passwd] and $userid != "admin")
  {
    echo "<script>alert('패스워드를 입력해주세요.') ;history.go(-1); </script>";
    exit;
  } 
  else
  {
      $sql = "delete from list where num = $_GET[num]";
       mysqli_query($connect,$sql);
       Header("Location:../list.php");  
       mysqli_close();
    
  }

 ?>

<?php endif ?>
