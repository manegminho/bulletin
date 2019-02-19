<?php if(TRUE) :
       include "conn/connect.php";
        $sql = "UPDATE list set content='{$_POST[content]}',
        subject='{$_POST[subject]}',regist_day=NOW() where  num=$_GET[num]";
        $result = mysqli_multi_query($connect,$sql);

      
        if($result == FALSE)
        {
          Header("Location:../modify_form.php");  
          echo $sql;
          exit;
        }
        else
        {
          mysqli_query($sql, $connect);
           mysqli_close(); 
           Header("Location:../list.php");  
           exit;
        }
?> <?php endif ?>