<?php
	//var_dump($_POST);
//    session_start();
//	echo $_SESSION["student_name"];

$USER= 'root';
$PW= '1234';
$DBINFO= "mysql:dbname=cwdb;host=localhost;charset=utf8";

try{
    $pdo = new PDO($DBINFO,$USER,$PW); //pdoインスタンスの生成
    $sql = "SELECT * FROM students WHERE seq='%d';";
    $sql = sprintf( $sql, $_GET["seq"] );
    $stmt = $pdo->prepare($sql);
    $stmt->execute(null);
	// 生徒情報が1つだけ取得出来る
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		var_dump($row);
    }

}catch(Exception $e){
    echo "エラー発生" . $e->getMessage();
}

?>

編集画面だよ

