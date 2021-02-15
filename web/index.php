<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>TODOリスト（おうち用）</title>
<link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
<div class="title-and-lists">
<h3>やることリスト</h3>

<?php
try
{

$dsn = 'mysql:dbname=todolist;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT id, name FROM list WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '<form method="post" action="#" class="confirm-form">';
while(true)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false)
  {
    break;
  }
  print '<div>';
  print '<input type="radio" name="code" id="todolist'.$rec['id'].'" value="'.$rec['id'].'">';
  print '<label for="todolist'.$rec['id'].'"> '.$rec['name'].'</label>';
  print '<br/>';
  print '</div>';
}
print '</div>';

print '<a href="AddList.html" class="addlist-jump-button"><span>リスト追加</span></a>';
print '<input type="submit" name="delete" class="complete-submit" value="完了">';
print '</form>';
}
catch(Exception $e)
{
  print '<form method="post" action="#" class="confirm-form">';
  print '<a href="AddList.html" class="addlist-jump-button"><span>リスト追加</span></a>';
  print '<input type="submit" name="delete" class="complete-submit" value="完了">';
  print '</form>';
  
}

if(isset($_POST['delete'])==true)
{
  $li_code=$_POST['code'];
  header('Location: ListDelete.php?code='.$li_code);
  exit();
}
?>

</body>
</html>