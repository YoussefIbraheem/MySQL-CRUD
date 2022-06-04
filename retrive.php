<?php 
require_once 'connections.php';
if($_SERVER['REQUEST_METHOD']== 'GET'){
    $allData = json_decode(file_get_contents("php://input")) ;
    // $orderNumber = $allData -> orderNumber ;
    $orderNumber = $_GET['orderNumber'];
if(isset($orderNumber)){
    $query = mysqli_query($connection , "SELECT * FROM `orderdetails` join orders on orderdetails.orderNumber = orders.orderNumber where orderdetails.orderNumber = $orderNumber ;")  ;

    if(mysqli_num_rows($query)>0){
        $result = json_encode(mysqli_fetch_all($query , MYSQLI_ASSOC)) ;
        print_r($result);
    }else{
        messages("couldnt locate selected order" , 405);
    }
}else{
    messages("no order number selected" , 405);
}



} else{
    messages("wrong request" , 405);
}