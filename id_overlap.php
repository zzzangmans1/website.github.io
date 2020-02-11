<?php
	$conn = mysqli_connect('localhost', 'root', 'ruemfkddl1');
  mysqli_select_db($conn, 'loadstore');
  // url 로 아이디값을 받으니 $_GET 으로 아이디값 을 받아온다.
	$user_id = $_GET['user_id'];
  $sql = "SELECT * FROM `user` WHERE `user_id` = '{$user_id}'";
	$result = mysqli_query($conn, $sql);
	if($result->num_rows == 0)
	{
?>
<div><?php echo "$user_id"; ?><br/>는 사용가능한 아이디입니다.</div>

<?php
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo "$user_id"; ?><br/>중복된아이디입니다.<div>
<?php
	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
