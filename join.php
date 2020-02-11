<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">

  <link href="http://localhost/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

<script>
    //
    function idoverlap(){
    	var user_id = document.getElementById("user_id").value;
    	if(user_id)
    	{
        // url을 넣어줘야 GET 으로 받아서 쓸수 있다.
          url = "id_overlap.php?user_id="+user_id;
    			window.open(url,"user_id","width=300,height=100");
    		}else{
          //user_id 가 false 이면 아무것도 없으니 이게 실행.
    			alert("아이디를 입력하세요");
    		}
    	}
</script>
</head>
<body id="target" class="black">
  <div class="container">
    <?php
    require("menubar.php");
    ?>
    <header class="jumbotron text-center">
      <img src="http://post.phinf.naver.net/20160901_256/1472708857265p6JHM_JPEG/IdNRIq4h0SXpm9CGYX5AGj8ikoZk.jpg" alt="붕어빵" class="img-circle" id="logo">
        <h1><a href="http://localhost/index.php">붕어빵</a></h1>
    </header>
    <div class="row">

        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
          <?php
          while( $row = mysqli_fetch_assoc($result)){
            echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
          }
          ?>
          </ol>
        </nav>
        <div class="col-md-9">
          <article>
            <form action="joinprocess.php" method="POST">

              <div class="form-group">ID
                <input type="text" class="form-control.span1" id="user_id" placeholder="아이디를 적어주세요.">
                <input type="button" value="중복검사" onclick="idoverlap();" />
								<input type="hidden" value="0" name="id_overlap" />
              </div>
              <div class="form-group">Email
                <input type="text" class="form-control.span1" name="email" id="email" placeholder="이메일을 적어주세요.">
              </div>

              <div class="form-group">Nickname
                <input type="text" class="form-control.span1" name="Nickname" id="Nickname" placeholder="닉네임를 적어주세요.">
              </div>

              <div class="form-group">Password
                <input type="password" class="form-control.span1" name="user_pw" id="user_pw" placeholder="비밀번호를 적어주세요.">
              </div>
              <input type="submit" class="btn btn-default  btn-lg">
            </form>
          </article>
          <hr>
          <script type="text/javascript"> // 체크박스 체크하면 바디색 화이트 체크 해제하면 블랙
          function check(box){
            if(box.checked == true) {document.getElementById('target').className='white'}
            else{document.getElementById('target').className='black'}
          }
          </script>
          <div id="control">
            <div class="btn-group" role="group" aria-label="...">
              <input id="toggle" type="checkbox" class="hide" onclick="check(this)"/>
              <label for="toggle"><span class="hide">Label Title</span></label>
              <!--<input type="button" value="white"  class="btn btn-default  btn-lg"/> 화이트, 블랙 박스
              <input type="button" value="black"  class="btn btn-default btn-lg" onclick="document.getElementById('target').className='black'"/> -->
            </div>
            <a href="http://localhost/write.php" class="btn btn-success  btn-lg">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

          </div>
        </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>
