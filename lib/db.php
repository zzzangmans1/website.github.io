<?php
// db_init 함수만듬
function db_init($host, $duser, $dpw, $dname){
  $conn = mysqli_connect($host, $duser, $dpw); // mysqli_connect php에서 mysql 데이터베이스 연결하는 함수
  mysqli_select_db($conn, $dname);
  return $conn;
}
?>
