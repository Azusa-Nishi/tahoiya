<?php
$perin = [];
$per = $_POST['per'];
$dic = $_POST['dic'];
ini_set("display_errors", 0);
#error_reporting(E_ALL);
for($i = 0; $i < $per-1; $i++){
	$perin[$i] = $_POST["perin$i"];
}
$nowper = $_POST['nowper'];
$perin[$nowper] = $_POST['word'];
$nowper++;
#終了条件
if($nowper >= $per-1){
	#全員入力終了
	$next = "next.php";
}else{
	#まだまだ入力
	$next = "input.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../tahoiya.css">
	<title>たほいやゲーム(子)</title>
</head>
<body>
	<p><?=$nowper?>人目の子</p>
	<form action="<?=$next?>" id="people" method="post">
		「<?=$dic?>」に対する意味を考えて入力しよう。<br>
		<input type="hidden" name="per" value="<?=$per?>">
		<input type="hidden" name="nowper" value="<?=$nowper?>">
		<input type="text" name="word"><br>
		<input type="hidden" name="dic" value="<?=$dic?>">
<?php
	for($i = 0; $i < $nowper; $i++){
		echo "<input type='hidden' name='perin$i' value='$perin[$i]'>\n";
	}
?>
		</ul>
		<br>下のボタンを押してから次の子に渡してね。<br>
		<input type="submit" value="次の子へ" />
		</p>
	</form>
</body>
</html>
