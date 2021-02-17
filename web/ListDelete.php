<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>TODOリスト（おうち用）</title>
<link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>

<?php

try
{
$li_code=$_GET['code'];

$dsn = 'mysql:dbname=heroku_395f170cc9d8e84;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'b8f8ba0e6dce8b';
$password ='64d39a57';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name FROM list WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$li_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$dbh = null;
}
catch (Exception $e)
{

  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>
<div class="confirmation-of-completion">
<h3>完了でいいですか？</h3>
</div>
<form method="post" action="ListDeleteDone.php">
<input type="hidden" name="code" value="<?php print $li_code; ?>">
<input type="button" onclick="history.back()" class="back" value="戻る">
<input type="submit" class="ok" value="OK">
</form>
</body>
</html>