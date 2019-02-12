<?php

        $connect =mysqli_connect('localhost','root','aodalsgh1','bulletin');

      
        $sql = "UPDATE list set content='{$_POST[content]}',
        subject='{$_POST[subject]}',regist_day=NOW() where  num=$_GET[num]";
        $result = mysqli_multi_query($connect,$sql);

      
        if($result == FALSE)
        {
          Header("modify_form.php");  
          echo $sql;
        }
        else
        {
           Header("Location:list.php");  
        }
        mysqli_query($sql, $connect);
        mysqli_close(); 
?>