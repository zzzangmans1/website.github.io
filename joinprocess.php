<?php
//require("config/config.php");
//require("lib/db.php");
//$conn = db_init($config['host'], $conifg['duser'], $config['dpw'], $config['dname']);
$conn = mysqli_connect('localhost', 'root', 'ruemfkddl1');
mysqli_select_db($conn, 'loadstore');
$user_id = $_POST['user_id']; // user_id 값을 받자
$sql = "SELECT * FROM `user` WHERE `user_id` = '{$user_id}'"; // user_ id 중복체크 쿼리문
$result = mysqli_query($conn, $sql);
if($result->num_rows == 0){ // id 가 중복이 아니라면
  $sql = "INSERT INTO `user`
                      (`id`, `user_id`, `user_pw`, `addr`, `name`)
                      VALUES
                      (NULL, '".$_POST['user_id']."', '".$_POST['user_pw']."', '".$_POST['email']."','".$_POST['Nickname']."');";
}
else{

}

mysqli_query($conn, $sql);
header('Location: index.php');

?>
