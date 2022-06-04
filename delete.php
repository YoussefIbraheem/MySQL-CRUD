<?php 
require_once 'connections.php' ;

if($_SERVER['REQUEST_METHOD']== 'DELETE'){

$allData = json_decode(file_get_contents("php://input")) ;
$orderNumber = (int) $allData -> orderNumber;

if(isset($orderNumber)){
$selectedQuery = mysqli_query($connection , "select * from orderdetails where orderNumber = $orderNumber");

if(mysqli_num_rows($selectedQuery)>0){
    $query = mysqli_query($connection , "delete from orderdetails where orderNumber=$orderNumber");
    messages("order deleted successfully" , 200);
}else{
    messages("order not found" , 404);
}

}else{
    messages("order not selected" , 404);
}

}else{
    messages("wrong request" , 405);
}