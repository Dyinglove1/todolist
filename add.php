<?php 

	//Переменные
	$title = $_POST['title'];
    $date = date("Y-m-d H:i:s");
    $text = $_POST['text'];
    $deadline = $_POST['deadline'];
    $is_completed = 0;
    $is_actual = 1;
    $is_closed = 0;

	//Подключение к базе данных
	require 'db.php';

    $sql = "INSERT INTO list(title, date, text, deadline, is_completed, is_actual, is_closed) VALUES(:title, '$date', '$text', '$deadline', '$is_completed', '$is_actual', '$is_closed')";

	$query = $pdo->prepare($sql);
  
	$query->execute(['title' => $title]);

	header('Location: index.php');

?>