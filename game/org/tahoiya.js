//var hito = document.getElementsByName("people");

var npeople;

function getRadioValue(people) {
    //ラジオボタンオブジェクトを取得する
    var radios = document.getElementsByName(people);

    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            //選択されたラジオボタンのvalue値を取得する
            npeople = radios[i].value;
            break;
        }
    }
    //value値を表示する
    alert("value値は" + npeople + "です");
	var pp = npeople; 
    //ほしかったらこれin html
    //<input type="button" value="ボタン" onclick="getRadioValue('per');">
}

for (i = 1; i <= pp; i++){
	document.write(i);
}
