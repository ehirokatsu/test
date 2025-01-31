<!DOCTYPE html PUBLIC "-// W3C// DTD XHTML 1.0 Transitional// EN"
 "http:// www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:// www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>PHP Quiz</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br>
<br>
<div class="center">
<H1>
<font color="blue">クイズ課題</font>

</H1>

<form action="/Quiz_Answer.php" method="post"" name="quiz_form">
    <label for="quiz1">クイズ１：WEBページを記述するための言語は何でしょうか？</label>
    <br>
    <input type="text" id="quiz1" name="quiz1">
    <br>
    <br>
    <label for="quiz2">クイズ２：WEBサーバに使用されるものはどれでしょうか？</label>
    <br>
    <input type="checkbox" id="check1" name="quiz2[]" value="Apache">
    <label for="check1">Apache</label>
    <input type="checkbox" id="check2" name="quiz2[]" value="iPhone">
    <label for="check2">iPhone</label>
    <input type="checkbox" id="check3" name="quiz2[]" value="Tomcat">
    <label for="check3">Tomcat</label>
    <br>
    <br>
    <label for="quiz3">クイズ３：次のうちブラウザはどれでしょうか？</label>
    <br>
    <input type="radio" id="radio1" name="quiz3" value="Edge">
    <label for="radio1">Edge</label>
    <input type="radio" id="radio2" name="quiz3" value="Android">
    <label for="radio2">Android</label>
    <input type="radio" id="radio3" name="quiz3" value="Apple">
    <label for="radio3">Apple</label>
    <br>
    <br>
    <input type="submit" value="送信する">
    <br>
</form>

</div>
</body>
</html>

