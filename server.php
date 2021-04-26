<?php
//declaring errors i.e dont accept empty todo
$errors="";
//connect to database
$username="root";
$password="";
$database="to-do";
$host="localhost";
//create connection
$db=mysqli_connect($host,$username,$password,$database);
//check connection
if($db->connect_error){
    die("connection failed:".$db->connect_error);
}
//getting data from form if submitted
if(isset($_POST['submit'])){
    //assign todo to a variable task
    $task = $_POST['task'];
    //if todo is blank then return an error
    if(empty($task)){
        $errors = "You must fill in the task";
    }else{
 //query to add info to db
 $query="INSERT INTO tasks(task) VALUES('$task')";
 //run query
 mysqli_query($db, $query);
 //redirect user to same page
 header('location:index.php');
    }
   

}
//deleting a todo
if(isset($_GET['del_task'])){
    $id = $_GET['del_task'];
    //Delete query
    $delete_query = "DELETE FROM tasks WHERE id=$id";
    //run delete query
    mysqli_query($db, $delete_query);
    //redirect to same page
    header('location:index.php');
}

// Checking to do
if(isset($_GET['check_task'])){
    $checktask=$_GET['check_task'];
    $true=1;
    //update query
    $update_query="UPDATE tasks SET Checked=$true WHERE id=$checktask";
    //run update query
    mysqli_query($db, $update_query);
    //redirect to updated page
    header('location:index.php');
}
// if(!isset($_GET['check_task'])){
//     $checktask=$_GET['check_task'];
//     $false=0;
//     //update query
//     $update_query="UPDATE tasks SET Checked=$false WHERE id = $checktask";
//     //update db
//     mysqli_query($db, $update_query);
//     //redirect 
//     //header('location:index.php');

 

// }
//get all tasks from db to display
$tasks=mysqli_query($db, "SELECT * FROM tasks");




?>