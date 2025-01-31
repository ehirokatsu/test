<!DOCTYPE html PUBLIC "-// W3C// DTD XHTML 1.0 Transitional// EN"
 "http:// www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:// www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>PHP Quiz Answer</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<br>
<br>
<div class="center">
<H1>
<font color="blue">クイズ課題 結果</font>

</H1>
<?php

define("ERROR_NULL", "0");//NULL
define("ERROR_INPUT", "1");//未入力
define("ERROR_ILLEGAL", "2");//異常入力
define("INCORRECT", "3");//不正解
define("CORRECT", "4");//正解

//自作関数を使用する
require 'QuizLib.php';

$quizLib = new QuizLib();

//クイズ１のユーザー回答
$quiz1Ans = "";
//クイズ１の回答結果
$quiz1Result = "";

//クイズ１回答がNULLの場合（NULLを関数の引数にするとwarningになるから）
if (!isset($_POST['quiz1'])) {
    $quiz1Result = ERROR_NULL;
//クイズ１回答がNULLではない場合
} else {
    //$a = array("a","aa");//ILLEGALデバッグ用
    //$_POST['quiz1'] = $a;//ILLEGALデバッグ用
    $quiz1Result = $quizLib->isQuiz1($_POST['quiz1']);
    //回答が文字列なら表示用変数に格納する（配列だとechoするときにエラーになるから）
    if ($quiz1Result !== ERROR_ILLEGAL) {
        $quiz1Ans = $_POST['quiz1'];
    }
}

//クイズ２のユーザー回答
$quiz2Ans = array();
//クイズ２の回答結果
$quiz2Result = "";

//チェックボックスがNULLの場合
if (!isset($_POST['quiz2'])) {
    $quiz2Result = ERROR_NULL;
//NULLではない場合、配列チェックを行う
} else {
    $quiz2Result = $quizLib->isQuiz2($_POST['quiz2']);
    if ($quiz2Result !== ERROR_ILLEGAL) {
        $quiz2Ans = $_POST['quiz2'];
    }
}

//クイズ3のユーザー回答
$quiz3Ans = "";
//クイズ3の回答結果
$quiz3Result = "";

//クイズ3回答がNULLの場合
if (!isset($_POST['quiz3'])) {
    $quiz3Result = ERROR_NULL;
//クイズ３回答がNULLではない場合
} else {
    //$a = array("a","aa");//ILLEGALデバッグ用
    //$_POST['quiz3'] = $a;//ILLEGALデバッグ用
    $quiz3Result = $quizLib->isQuiz3($_POST['quiz3']);
    //回答が文字列なら表示用変数に格納する
    if ($quiz3Result !== ERROR_ILLEGAL) {
        $quiz3Ans = $_POST['quiz3'];
    }
}
?>


//以下、回答結果出力

クイズ１：回答→<?php echo "[",$quiz1Ans,"]\n"; ?>
<?php
    if ($quiz1Result === ERROR_NULL) {
        echo '<font color="red">  回答が送信されていません！</font><br><br>';
    } elseif ($quiz1Result === ERROR_INPUT) {
        echo '<font color="red">  回答が入力されていません！</font><br><br>';
    } elseif ($quiz1Result === ERROR_ILLEGAL) {
        echo '<font color="red">  回答が不正送信されました！</font><br><br>';
    } elseif ($quiz1Result === INCORRECT) {
        echo '<font color="red">  不正解！</font><br><br>';
    } elseif ($quiz1Result === CORRECT) {
        echo '<font color="green">   正解！</font><br><br>';
    }
?>
<br>

クイズ２：回答→
<?php
    //回答内容を表示する
    echo "[";
    foreach($quiz2Ans as $value){
       echo $quizLib->isEscape($value);
       echo ",\n";
    }
    echo "]";
    if ($quiz2Result === ERROR_NULL) {
        echo '<font color="red">  回答が送信されていません！</font><br><br>';
    } elseif ($quiz2Result === ERROR_INPUT) {
        echo '<font color="red">  回答が入力されていません！</font><br><br>';
    } elseif ($quiz2Result === ERROR_ILLEGAL) {
        echo '<font color="red">  回答が不正送信されました！</font><br><br>';
    } elseif ($quiz2Result === INCORRECT) {
        echo '<font color="red">  不正解！</font><br><br>';
    } elseif ($quiz2Result === CORRECT) {
        echo '<font color="green">   正解！</font><br><br>';
    }
?>

クイズ3：回答→<?php echo "[",$quiz3Ans,"]\n"; ?>
<?php
    if ($quiz3Result === ERROR_NULL) {
        echo '<font color="red">  回答が送信されていません！</font><br><br>';
    } elseif ($quiz3Result === ERROR_INPUT) {
        echo '<font color="red">  回答が入力されていません！</font><br><br>';
    } elseif ($quiz3Result === ERROR_ILLEGAL) {
        echo '<font color="red">  回答が不正送信されました！</font><br><br>';
    } elseif ($quiz3Result === INCORRECT) {
        echo '<font color="red">  不正解！</font><br><br>';
    } elseif ($quiz3Result === CORRECT) {
        echo '<font color="green">   正解！</font><br><br>';
    }
?>
<br>

<a href="Quiz.php">戻る</a>
<br>
</div>

</body>
</html>

