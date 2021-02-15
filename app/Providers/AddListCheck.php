<?php

$list_name = $_POST['name'];

$dsn = 'mysql:dbname=todolist;host=localhost;charset=utf8';
$user = 'root';
$password ='';

try {
  $db = new PDO($dsn,$user,$password);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

  $stmt = $db->prepare("
    INSERT INTO list(name)
    VALUES (:name)"
  );

  $stmt->bindParam(':name', $list_name, PDO::PARAM_STR);

  $stmt->execute();

  header('Location: List.php');
  exit();
} catch(PDOException $e){
  die ('エラー：' . $e->getMessage());
}

?>