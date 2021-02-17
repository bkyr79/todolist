<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php

try
{

$li_code = $_POST['code'];

$dsn = 'mysql:dbname=heroku_395f170cc9d8e84;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'b8f8ba0e6dce8b';
$password ='64d39a57';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM list WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[] = $li_code;
$stmt->execute($data);

$dbh = null;
}
catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑をお掛けしています。';
  exit();
}

header('Location: index.php');
?>
</body>
</html>