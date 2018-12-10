<?php
$perin = [];
$per = $_POST['per'];
$dic = $_POST['dic'];
ini_set("display_errors", 0);
for($i = 0; $i < $per; $i++){
	$perin[$i] = $_POST["perin$i"];
}
$sel = array();
$sortkey = array();
if(strcmp($_POST['vote'], "notyet") == 0){
	for($i = 0; $i < $per; $i++){
		$sel[$i] = array($i, $perin[$i]); 
		$sortkey[$i] = $perin[$i];
	}
	array_multisort($sortkey, SORT_ASC, $sel);
	$nowper = 0;
}else{
	$nowper = $_POST['nowper'];
	for($i = 0; $i < $per; $i++){
		$sel[$i] = array($_POST['perno'.$i], $_POST['perin'.$i]);
		$selans[$i] = $_POST['selans'.$i];
	}
	$selans[$nowper-1] = $sel[$_POST['sel']][0];
}
$nowper++;
#終了条件
if($nowper >= $per-1){
	#全員入力終了
	$next = "answer.php";
}else{
	#まだまだ入力
	$next = "vote.php";
}
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
	<p><?=$nowper?>人目の子の人</p>
	<form action="<?=$next?>" id="people" method="post">
		「<?=$dic?>」に対する正しい意味だと思うものを選んでね。<br>
		<input type="hidden" name="per" value="<?=$per?>">
		<input type="hidden" name="nowper" value="<?=$nowper?>">
		<input type="hidden" name="dic" value="<?=$dic?>">
<?php
	for($i = 0; $i < $per; $i++){
		$chk = "";
		if($i == 0){
			$chk = "checked";
		}
		echo "<input type='radio' name='sel' value='$i' $chk>".$sel[$i][1]."<br>\n";
		echo "<input type='hidden' name='perno$i' value='".$sel[$i][0]."'>\n";
		echo "<input type='hidden' name='perin$i' value='".$sel[$i][1]."'>\n";
	}
	for($i = 0; $i < $per; $i++){
		echo "<input type='hidden' name='selans$i' value='".$selans[$i]."'>\n";
	}
?>
		<input type="hidden" name="vote" value="ongoing">
		</ul>
		<input type="submit" value="次の子へ" />
		</p>
	</form>
</body>
</html>
