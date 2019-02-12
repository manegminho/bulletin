<?php
        $scale=5; //한 화면에  표시되는 글수
        $connect =mysqli_connect("localhost","root","aodalsgh1","bulletin");
        $sql = "select * from list";
        $result = mysqli_query($connect, $sql);
?>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=Korean">
    <head>
        <title> List </title>
        <link rel = "stylesheet" href = "style.css" type="text/css">
        <link rel = "stylesheet" href = "style.css" type="css/css">
    </head>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table border=0 cellspacing=0 cellpdding=0 width='776' align='center'>
        <tr><td colspan="5" height=25>
            <img src="img/Head.gif"></td></tr>
        <tr><td background="img/bbs_bg.gif">
            <img border="0" src="img/blank.gif" width="1" height="3">
         </td></tr>
         <tr><td height=10></td></tr>

         <?php  $total_record = mysqli_num_rows($result); // ��ü �� ��?>
              <tr>
                 <td align="right" colspan="5" height=20><b>전체 
                   <?php echo $total_record ?>건</b>
                 </td></tr>  
                <tr>
          <td>
    
          <table border=0 cellspacing=0 cellpdding=0 width='100%' class="txt">
          <tr bgcolor="#5AB2C8"> 
          <td colspan="5" height=1></td>
        </tr>
        <tr bgcolor="#D2EAF0" height=25> 
          <td width="50" align="center"><strong>번호</strong></td>
          <td width="450" align=center><strong>제목</strong></td>
          <td width="76" align=center><strong>글쓴이</strong></td>
          <td width="145" align=center><strong>작성일</strong></td>
          <td width="55" align=center><strong>조회</strong></td>
        </tr>
        <tr bgcolor ="#5AB2C8">
                <td colspan="5" height=1><td>    <!--colspan = 이 속성은 가로줄을 합치게 하는 속성이죠.. -->
         </tr>     
       
         
    <?php
           $connect =mysqli_connect("localhost","root","aodalsgh1","bulletin");
           $sql = "Select *from list";
           $result = mysqli_query($connect,$sql);

           $ncount =0;
           while($row = mysqli_fetch_array($result))
           {
               
               $listSubject = NULL;
               $listSubject =$listSubject."<a href =\"view.php?num={$row['num']}\"> {$row['subject']}</a>";
               echo "
               <td align='center'>{$row['num']}</td> 
               <td align='center'>$listSubject</td>
               <td align='center'>{$row['name']}</td>
               <td align='center'>{$row['regist_day']}</td>
               <td align='center'>{$row['hit']}</td>
               <tr bgcolor='#CCCCCC' height=1> 
               <td colspan='5'></td>
             </tr>";
           }
           

    ?>

        <tr> 
          <td colspan="5" height=20></td>
        </tr>

        <tr height=25>
          <td colspan=5 align=center>
    <?php
            //게시판 목록하단에 페이지링크 번호 출력

            for($i=1 ; $i<$total_page;$i++)
            {
                if($page == $i)
                {
                    echo "<font color='4C5317'><b>[$i]</b></font>";
                }
                else
                {
                    echo "<a href='list.php?page=$i'>
                    <font color='4C5317'>[$i]</font></a>";
                }
            }
            echo "1";
    ?>

        </td>
        </tr>
        <tr bgcolor="#CCCCCC" height=1>
            <td colspan="5"></td>
        </tr>
        </table>

        <!-- 검색하기 시작-->

        <table width=766 align=center border=0 cellpadding=0 
               cellspacing=0 bgcolor="#D2EAF0">
            <tr height=5>
                <td></td>
            </tr>
            <form name=searchForm method=post action="search.php" >
                <tr>
                    <td>&nbsp;&nbsp;
                        <select name="find" class='dropdown catem'> 
                            <option value="subject" selected ="selected">제목에서</option>
                            <option value="content">본문에서</option>
                            <option value="name">글쓴이에서</option>
                         </select>

                        <input type="text"  name="search" size=10 
                        style="vertical-align:Top">

                        <input type="image" src="img/i_search.gif" 
                             border=0>
                    </td>

                    <td align=right>
                        <a href="write_form.php">
                        <img src="img/i_write.gif"  border=0></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="list.php"><img src="img/i_list.gif"  border=0></a>
                    &nbsp;</td>
                    </tr>
                    <tr heigt=2>
                            <td></td>
                    </tr>
                    <tr bgcolor="#5AB2CB" height=1>
                        <td colspan=2> </td>
                    </tr>
             </form>
        </table>
        <!-- 검색하기 끝-->
    </body>
</html>
