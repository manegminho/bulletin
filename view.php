
<?php
  
  $connect =mysqli_connect('localhost','root','aodalsgh1','bulletin');
  
  if(isset($_GET['num']))
  {
  
    $filtered_id =mysqli_real_escape_string($connect, $_GET['num']);
    $sql = "select * from list where num={$filtered_id}";
    $result = mysqli_query($connect,$sql);
  }
   $row = mysqli_fetch_array($result);
  // echo $sql;
   $content = str_replace("\n", "<br>", $row[content]);
   $content = str_replace("", "&nbsp;", $content);
   $subject = str_replace("", "&nbsp;", $row[subject]);

   $nCount = (int)($row[hit])+ 1;
   $sql = "UPDATE list set hit=$nCount where  num=$_GET[num]";
   $result = mysqli_multi_query($connect,$sql);
   
?>

<html>
 <head>
  <title>:: 내용 보기 :: </title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="css.css" type="text/css">
 </head>
 <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

    <table width=776 border=0 cellspacing=0 cellpadding=0 align=center>

        <tr><td colspan="6" height=25>
             <img src="img/head.gif"></td></tr>
        <tr><td background="img/bbs_bg.gif">
             <img border="0" src="img/blank.gif" 
                   width="1" height="3"></td></tr>
        <tr><td height=10></td></tr>

        <tr><td height=10></td></tr>

        <td align=right height=30><b>조회수 : <?= $nCount ?> </b></td>
        <tr height=1 bgcolor=#5AB2C8><td></td>
        </tr>
        <tr bgcolor="#D2EAF0" height=30>
          <td>&nbsp;&nbsp;<b> 제 목 : <?= $subject ?></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8>
          <td></td>
        </tr>
        <tr> 
          <td>
    <table width=776  border=0 cellspacing=0 cellpadding=0 class=txt>
        <tr height=50>
          <td>&nbsp;<b>글쓴이 : <?= $row[name] ?> <p align=right>&nbsp;&nbsp;작성날짜:<?= $row[regist_day] ?></b></p> 
          </td>
        <tr height=1 bgcolor=#5AB2C8> <td></td></tr>
        <tr bgcolor="#D2EAF0" height=30><td>&nbsp;&nbsp;<B>내 용 :</B></td> </tr>
        <tr height=1 bgcolor=#5AB2C8> <td></td></tr>
        <tr>
             <td><br> <?= $row[content] ?></td>
        </tr>
        
    </table>
          </td>
        </tr>
        <tr height=100>
           <td align=right>&nbsp;<font size=-2>IP : 
                          <? echo $row[ip]; ?></font></td>
        </tr>
                  
        <tr height=1 bgcolor=#5AB2C8>
          <td></td>
        </tr>
        <tr>
          <td>

    <table width=776 border=0 cellspacing=0 cellpadding=0>
        <tr height=10>
          <td></td>
        </tr>

<?php
   if ($userid == "admin")
   {
      echo "
        <tr>
          <td align=center>
          <a href='modify_form.php?num=$row[num]'>
                           <img src='img/i_edit.gif' border=0>&nbsp</a>
          <a href='delete.php?num=$row[num]'>
                           <img src='img/i_del.gif' border=0>&nbsp</a>
          <a href='list.php>
                           <img src='img/i_list.gif' border=0></a>
          </td>
        </tr>
           ";
   }
   else
   {
      echo "
        <tr>
          <td align=center>
          <a href='passwd_form.php?case=modify&num=$row[num]'>
                           <img src='img/i_edit.gif' border=0>&nbsp</a>
          <a href='passwd_form.php?case=delete&num=$row[num]'>
                           <img src='img/i_del.gif' border=0>&nbsp</a>
          <a href='list.php'>
                           <img src='img/i_list.gif' border=0></a>
          </td>
        </tr>
           ";
   }
?>

          </td>
    </table>
 </body>
</html>
