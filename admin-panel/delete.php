<?php  
	$connect = mysqli_connect("localhost", "root", "mysqlpassword", "csit_library");
	$sql = "DELETE FROM books WHERE id = '".$_POST["book_id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>