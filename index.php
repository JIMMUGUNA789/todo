<?php
require "server.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list application with php and sql</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="heading">
    <h2>To Do List</h2>
    </div>
    <form method="POST" action="index.php">
        <?php
        if(isset($errors)){
        ?>
 <p><?php echo $errors?></p>
        <?php }?>
    <input type="text" name="task" class="task_input">
    <button type="submit" class="add_btn" name="submit">Add task</button>
    
    </form>
    <table>
        <thread>
            <tr>
                <th>No</th>
                <th>Done</th>
                <th>Task</th>
                <th>Action<th>
            </tr>
</thread>
<tbody>
    <?php
    //displaying todos from db
    //$i helps in renumbering todos after deletion instead of using todo ID
    $i = 1;
    while($row = mysqli_fetch_array($tasks)){
    ?>
     <tr>
    <td><?php echo $i;?></td>
    <?php  if($row['Checked']==1 ){?>

        <td><input type="checkbox" checked> </td>
    <td class="task1" ><?php echo $row['task'];?></td>
    <?php }else{?>
        <td><a href="index.php?check_task=<?php echo $row['id'];?> "><input type="checkbox" > </a></td>
    <td class="task" ><?php echo $row['task'];?></td>

    <?php }?>
    

    <td class="delete">
        <!-- deleting a todo -->
        
        <a href="index.php?del_task=<?php echo $row['id'];?>">X</a>
        <small name="date">Created: <?php echo $row['date_time']?></small>
       
    </td>
    </tr>

    <?php
    $i++;
   }?>
    
</tbody>
    </table>
</body>
</html>