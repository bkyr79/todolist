<?php


if(isset($_POST['delete'])==true)
{
  $pro_code=$_POST['procode'];
  header('Location: pro_delete.php?procode='.$pro_code);
  exit();
}

?>