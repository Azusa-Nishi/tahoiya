<?php
$perin = [];
$point = [];
$count = [];
$per = $_POST['per'];
$dic = $_POST['dic'];
for($i = 0; $i < $per; $i++){
	$perin[$i] = $_POST["perin$i"];
}
$sel = array();
$nowper = $_POST['nowper'];
for($i = 0; $i < $per; $i++){
	$sel[$i] = array($_POST['perno'.$i], $_POST['perin'.$i]);
	$selans[$i] = $_POST['selans'.$i];
}
$selans[$nowper-1] = $sel[$_POST['sel']][0];
$selorg = array();
$sortkey = array();
$selorg = $sel;
for($i = 0; $i < $per; $i++){
	$sortkey[$i] = $selorg[$i][0];
}
array_multisort($sortkey, SORT_ASC, $selorg);
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
	<p>答え合わせ</p>
	<form action="start.html" id="people" method="post">
	<table border='1'>
<?php
	echo "<tr>\n";
	echo "<td>&nbsp;</td>\n";
	for($i = 0; $i < $per; $i++){
		if($i == 0){
			echo "<td>親の答え</td>\n";
		}else{
			echo "<td>子".$i."の答え</td>\n";
		}
	}
	echo "</tr><tr>\n";
	echo "<td>&nbsp;</td>\n";
	for($i = 0; $i < $per; $i++){
		echo "<td>".$selorg[$i][1]."</td>\n";
	}
	echo "</tr>\n";
	for($i = 0; $i < $per; $i++){
		$point[$i] = 0;
		$count[$i] = 0;
	}
	for($i = 0; $i < $per-1; $i++){
		echo "<tr>\n";
		echo "<td>子".($i+1)."</td>";
		for($j = 0; $j < $per; $j++){
			if($j == $selans[$i]){
				echo "<td>〇</td>\n";
				if($i+1 == $j){
					$point[$j]--;
					echo "子".$j."さん自爆!減点1<br>";
				}
				if($j == 0){
					$point[$i+1]++;
					echo "子".($i+1)."さん、正解!加点1<br>";
				}
				$count[$j]++;
			}else{
				echo "<td>&nbsp;</td>\n";
			}
		}
		echo "</tr>\n";
	}
	$min = 9999;
	$minw = 0;
	$max = 0;
	$minw = 0;
	for($i = 0; $i < $per-1; $i++){
		if($min > $count[$i]){
			$min = $count[$i];
			$minw = $i;
		}
		if($max < $count[$i]){
			$max = $count[$i];
			$maxw++;
		}
	}
	if($minw == 0){
		$point[0] = 2;
		echo "親さん、だまし成功!加点2<br>";
	}
	$poi = floor(2/$maxw*10)/10;
	for($i = 1; $i < $per; $i++){
		if($max == $count[$i]){
			$point[$i] += $poi;
			echo "子".$i."さん、最大".$max."人だまし成功!加点".$poi."<br>";
		}
	}
?>
	</table><br>
	点数<br>
	<table border=1>
	<tr><td>親</td>
<?php
	for($i = 0; $i < $per-1; $i++){
		echo "<td>子".($i+1)."</td>";
	}
	echo "</tr><tr>\n";
	for($i = 0; $i < $per; $i++){
		echo "<td>".$point[$i]."</td>";
	}
?>
	</table>
	<input type="submit" value="もう一度" />
	</form>
	<form action="../tahoiya.html" id="people" method="post">
	<input type="submit" value="やめる" />
	</form>
</body>
</html>
