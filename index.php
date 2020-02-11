<?php
require("config/config.php");
require("lib/db.php");

$conn = db_init($config['host'], $config['duser'], $config['dpw'], $config['dname']);
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
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
          <o1 class="nav nav-pills nav-stacked">

          <?php
          if ($_GET['id'] == jindo){ ?>
                 <h2><li id="jindo_eup"><a href="#Jindo_eup">진도읍</a></li></h2>
                 <h2><li id="Gunnae_myeon"><a href="#Gunnae_myeon">군내면</a></li></h2>
                 <h2><li id="GoGun_myeon"><a href="#GoGun_myeon">고군면</a></li></h2>
                 <h2><li id="Uisein_myeon"><a href="#Uisein_myeon">의신면</a></li></h2>
                 <h2><li id="Limhoe_myeon"><a href="Limhoe_myeon">임회면</a></li></h2>
                 <h2><li id="Jisan_myeon"><a href="#Jisan_myeon">지산면</a></li></h2>
                 <h2><li id="Chodo_myeon"><a href="#Chodo_myeon">조도면</a></li></h2>

          <?php } ?>

        </ol>
        <?php
              //while ($row = mysqli_fetch_assoc($result))
               //{
//echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
              // }
              ?>
           </ol>
        </nav>
        <div class="col-md-9">

          <article>
          <?php
          if(empty($_GET['id']) === false ) {
              $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
              echo '<p>'.htmlspecialchars($row['name']).'</p>';
              echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
          }
          ?>
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
              <label id="circle"for="toggle"><span class="hide">Label Title</span></label>
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
