<!-- 学生表示画面 -->
<?php

$res = "";  //新しいウェブページのエラー回避
$USER= 'root';
$PW= '1234';
$DBINFO= "mysql:dbname=cwdb;host=localhost;charset=utf8";

try{
    $pdo = new PDO($DBINFO,$USER,$PW); //pdoインスタンスの生成
    $sql = "SELECT * FROM students";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(null);
    $res = "<table>\n";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        //名前を渡し続ける。tarouだけが最終的に代入される。
//        session_start();
//        $_SESSION["student_name"] = $row['student_name'];


        $res .= <<<eod
        <tr>
        <td>{$row['student_number']}</td>
        <td>{$row['student_name']}</td>
        <td>{$row['birth']}</td>
        <td><a href = "edit.php?seq={$row['seq']}">編</a></td>
        </tr>

eod;
    }
    $res .= "</table>\n";

}catch(Exception $e){
    echo "エラー発生" . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>一覧画面</title>
</head>
<body>

<form method="post" action="regist.php">
    <input type="submit" value="新規登録"></input>
</form>

<?php
    echo $res;
?>


</body>
</html>