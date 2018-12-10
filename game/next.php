<?php
$perin = [];
$per = $_POST['per'];
$dic = $_POST['dic'];
for($i = 0; $i < $per-1; $i++){
	$perin[$i] = $_POST["perin$i"];
}
$nowper = $_POST['nowper'];
$perin[$nowper] = $_POST['word'];
#終了条件
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../tahoiya.css">
	<title>たほいやゲーム</title>
</head>
<body>
	<p><?=$nowper?>人の入力がおわりました。</p>
	<form action="vote.php" id="people" method="post">
		では、投票に移ります。一人目の子からもう一度回そう。<br>
		言葉の意味にふさわしいと思うものを選んでね。<br>
		<input type="hidden" name="per" value="<?=$per?>">
		<input type="hidden" name="dic" value="<?=$dic?>">
<?php
	for($i = 0; $i < $per; $i++){
		echo "<input type='hidden' name='perin$i' value='$perin[$i]'>\n";
	}
?>
		<input type="hidden" name="vote" value="notyet">
		</ul>
		<input type="submit" value="最初の子へ" />
		</p>
	</form>
</body>
</html>
