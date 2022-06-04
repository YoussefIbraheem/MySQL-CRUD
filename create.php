<?php 
require_once 'connections.php' ;

if($_SERVER['REQUEST_METHOD']== 'POST'){

$allData = json_decode(file_get_contents("php://input")) ;
    $customerName = $allData ->customerName;
    $phone = $allData ->phone;
    $country = $allData ->country;
    $address_1 = $allData ->address_1;
    $city = $allData ->city;
    $state = $allData ->state;
    $postalCode = $allData ->postalCode; 
 $creditLimit = $allData ->creditLimit;
    $query =  "insert into `customers`(`customerName`, `country` , `phone` , `addressLine1` , `city` , `state` , `postalCode` , `creditLimit`) values ('$customerName','$country' , '$phone' , '$address_1' , '$city' , '$state' , '$postalCode' , '$creditLimit');" ;
    $result = mysqli_query($connection , $query);
    if($result){
        
        messages("Data inserted successfully" , 200);
    }else{
        messages("error while inserting" , 405);
    }
}else{
    messages("wrong request" , 405);
}


?>