<?php 

require 'db.php';

$id = $_GET['id'];

  $sql = 'UPDATE `list` SET is_closed = 1, is_actual = 0 WHERE `id` = ? ';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);

  header('Location: index.php');

 ?>