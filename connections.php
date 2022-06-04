<?php 
$connection = mysqli_connect("localhost" , "root","","corp");
header('content-type:json;charset=utf8');
header('access-control-allow-origin');
function messages(string $msg , int $code){
    echo $msg ;
    http_response_code($code);

}
?>