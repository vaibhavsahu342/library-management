<?php  
$connect = mysqli_connect("localhost", "root", "mysqlpassword", "csit_library");
$sql = "INSERT INTO books(title, author) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>