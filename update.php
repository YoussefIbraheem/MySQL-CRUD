<?php 
require_once 'connections.php';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $id = (int) $_POST['id'];
    $comments = $_POST['comments'];
    $status = $_POST['status'];
    $selectedQuery = mysqli_query($connection , "select * from orderdetails where orderNumber=$id" ) ;
    if(mysqli_num_rows($selectedQuery)>0){
        $query = mysqli_query($connection , "update  orderdetails set comments = '$comments' , status = '$status' where orderNumber = $id");
        messages('data updated successfully' , 200);}
        else{
            messages('error while updating' , 404);
        }
    }else{
        messages('wrong request' , 405);
    }







?>
