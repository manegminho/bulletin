<?php if(TRUE):
    include "mysql/conn/connect.php";
    $regist_day = date("Y-m-d (H:i)");  

    $sql = "select name,passwd,subject,content from list where num=$_GET[num]";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);

  
    if ($_POST[passwd] != $row[passwd] and $userid != "admin")
    {
       echo "
          <script>
              alert('비밀번호가 틀렸습니다.');
              history.go(-1);
          </script>
       ";
       exit;
      
    } 
?> <?php endif ?>
      
<html>
 <head>
  <title> :: 수정 ::</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="css.css" type="text/css">
 </head>
    <table border=0 cellspacing=0 cellpdding=0 width='776' align='center'>
        <tr><td colspan="6" height=25>
          <img src="img/head.gif"></td></tr>
        <tr><td background="img/bbs_bg.gif">
          <img border="0" src="img/blank.gif" width="1" height="3"></td>
        </tr>
        <tr><td height=10></td></tr>
     <form name="modifyform" 
         action="mysql/Update.php?num=<?= $_GET[num] ?>&content=<?= $row[content]?>" method="post">
        <tr>
           <td align=center colspan=2>
    <table width=776 border=0 cellspacing=0 cellpadding=0 
           class="txt" bgcolor=#FFFFFF>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr bgcolor="#D2EAF0" height=20>
          <td width="100%">&nbsp;&nbsp;
            <b>사용자 정보</b></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr>
          <td>
    <table width="100%" border=0 cellspacing=0 cellpadding=0 
           class="txt">
        <tr height=25>
          <td align=right width=100>성명&nbsp;</td>
          <td align=left>
            <input style='font-size:9pt;border:1px solid' type=text 
                    name="name" value=<?= $row[name] ?>
                    size=25 maxlength=16></td>
        </tr>

        <tr height=25>
          <td align=right>비밀번호&nbsp;</td>
          <td align=left><input style='font-size:9pt;border:1px solid'
           type="password" name="passwd" 
          value=<?= $row[passwd] ?> size=25 maxlength=16>
          </td>
        </tr>

    </table>
          </td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
        <tr bgcolor="#D2EAF0" height=20>
          <td colspan=2>&nbsp;&nbsp;<b>메모내용</b></td>
        </tr>        
        <tr height=1 bgcolor=#5AB2C8><td colspan=5></td></tr>  
        <tr>
          <td colspan=2>
    <table width="100%" border=0 cellspacing=0 
                   cellpadding=0 class="txt">
        <tr> 
          <td height=25>&nbsp;&nbsp;제 목&nbsp;&nbsp;&nbsp;
           <input style='font-size:9pt;border:1px solid' 
                   type='text' name="subject" 
                  value=<?= $row[subject] ?> 
                   size=50 maxlength=100></td>
        </tr>
        <tr><td height=2>&nbsp;&nbsp;</td> </tr>
        <tr valign="top">
          <td>&nbsp;&nbsp;<p2>내 용</p2>&nbsp;&nbsp;
         
          <textarea style='font-size:9pt;border:1px solid;align-content:left;margin:0px; padding:0px'name="content" style=background-image:url('img/bbs_text_line.gif'); cols=74 rows=14 wrap=virtual><?= $row[content]?></textarea></td>
        </tr>
        <tr height=20>
          <td></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td colspan=2></td></tr>
        <tr bgcolor="#D2EAF0" height=30>
     
        <td align=right>
                <input type=image src="img/i_write.gif" align=absmiddle border=0>
               &nbsp;&nbsp;&nbsp;
                    <a href="list.php"><img src="img/i_list.gif" align=absmiddle  border=0></a>
                    &nbsp;</td>

        </tr>        
        <tr height=1 bgcolor=#5AB2C8><td colspan=5></td></tr>  
        <tr>

         
        </tr>
    </table>
          </td>
        </tr> 
    </table>
          </td>
        </tr>
     </form>
    </table>
  </body>
</html>