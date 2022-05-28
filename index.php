<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>To do</title>
</head>
<body>
    <div class="container">
        <h2 class="h2">To do list</h2>
        <form action="add.php" method="POST">
    	    <label for="title">Name task</label>
    		<input type="text" name="title" required><br>
    		<label for="text">Description</label>
    		<input type="text" name="text"><br>
    		<label for="deadline">Complete before</label>
    		<input type="datetime-local" id="deadline" name="deadline"><br>
    		<input type="submit" value="New task">
    		<br>
        </form>
    	<button><a href="sort_by_deadline.php">Sort by deadline</a></button>
    	<button><a href="sort_by_date.php">Sort by creation date</a></button>
    	<button><a href="completed_tasks.php">Completed tasks</a></button>
    	<button><a href="closed_tasks.php">Closed tasks</a></button>
    	<button><a href="index.php">Current tasks</a></button>
    	<br><br><label>Current tasks</label>
    	<ul>
    		<?php
    
    		    require 'db.php';
    
    		    $query = $pdo->query('SELECT * FROM `list` WHERE is_actual=1 ORDER BY `id` DESC');
    
    		    while($row = $query->fetch(PDO::FETCH_OBJ)) {
    				echo '<div><li>'. $row->title .' <br> '. $row->text .'<br> Complete before '. $row->deadline .' <a href="set_as_closed.php?id='.$row->id.'" id="card-link-click" class="list" style="color:red"> х </a> <a href="set_as_completed.php?id='.$row->id.'" id="card-link-click" class="list" style="color:green"> ✓ </a></li>' . ' </div>';
    
    			}
    		 ?>
        </ul>
    </div>
</body>
</html>