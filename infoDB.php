 <!DOCTYPE html>
<html>
   <head>
      <title>guestBookphp</title>
      <meta name = "charset" content="UTF-8">
      <link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">

      <style type = "text/css">
         #body{background-image: url(back.jpg); background-repeat: no-repeat; background-position: top center; background-size: cover; 
               font-family:'Jua', sans-serif;text-align: center; text-shadow: 3px 3px 3px orange; font-size:20px;}
      </style>
   </head>
   <body id="body">
      <image src="1.png" width=200px>

      <?php 
         $db = new mysqli("localhost", "luiej98", "eunjeh3982","luiej98");
         if(mysqli_connect_errno()){
            print "Error: Could not connect to database server.";
            exit;
         }
         mysqli_set_charset($db, "utf8");
         $u_name = $_GET["name"];
         $u_mail = $_GET["mail"];
         $u_rel = $_GET["relationship"];
         $u_date = $_GET["date"];
         $u_sat = $_GET["satisfied"];
         $u_memo= $_GET["memo"];
          //결과 저장
         $q = "insert into people (u_name,u_mail,u_rel,u_date,u_sat,u_memo) values('$u_name','$u_mail', '$u_rel', '$u_date', '$u_sat', '$u_memo')";
         $db->query($q);
         
         print "<br/><br/><br/><br/>";
         print $u_name."님이 남기신 방명록입니다.";
         print "<br/><br/> 이메일 정보 : ".$u_mail;

         if($u_rel == children){
            print "<br/><br/> 관계 : 주인님과 소꿉 친구시군요! ";
         }
         elseif($u_rel == midhigh){
            print "<br/><br/> 관계 : 주인님과 중고등학교 친구시군요! ";
         }
         elseif($u_rel == college){
            print "<br/><br/> 관계 : 주인님과 대학교 친구시군요! ";
         }
         elseif($u_rel == family){
            print "<br/><br/> 관계 : 주인님과 가족 관계시군요! ";
         }
        elseif($u_rel == lover){
            print "<br/><br/> 관계 : 주인님과 애인 관계시군요! ";
         }

         print "<br/><br/> 생일 정보: ".$u_date;

         if($u_sat == 4){
            print "<br/><br/> 귀여움 만족도 : '매우 귀엽다'를 선택했네요 :3 고마워요";
         }
         elseif($u_sat == 3){
            print "<br/><br/> 귀여움 만족도 : '귀엽다'를 선택했네요 :3 고마워요";
         }
         elseif($u_sat == 2){
            print "<br/><br/> 귀여움 만족도 : '안 귀엽다'를 선택했네요 :( 왜죠?";
         }
         elseif($u_sat == 1){
            print "<br/><br/> 귀여움 만족도 : '매우 안귀엽다'를 선택했네요 :( 왜죠?";
         }
       
         print "<br/><br/> 메모 : ".$u_memo;
      ?>
   </body>
</html>