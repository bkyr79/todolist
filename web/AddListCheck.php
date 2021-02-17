<?php

$list_name = $_POST['name'];

$dsn = 'mysql:dbname=heroku_395f170cc9d8e84;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'b8f8ba0e6dce8b';
$password ='64d39a57';

try {
  $db = new PDO($dsn,$user,$password);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

  $stmt = $db->prepare("
    INSERT INTO list(name)
    VALUES (:name)"
  );

  $stmt->bindParam(':name', $list_name, PDO::PARAM_STR);

  $stmt->execute();

  header('Location: index.php');
  exit();
} catch(PDOException $e){
  die ('エラー：' . $e->getMessage());
}

?>