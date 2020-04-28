<?php  
 $connect = mysqli_connect("localhost", "root", "mysqlpassword", "csit_library");  
 $output = '';  
 $sql = "SELECT * FROM books ORDER BY book_id";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Book ID</th>  
                     <th width="40%">Title</th>  
                     <th width="40%">Author</th>  
                     <th width="10%">Quantity</th>  
                     <th width="40%">Category</th>  
                     <th width="10%">Level</th>  
                     <th width="40%">Location</th> 
                     <th width="10%">Delete</th>
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM books LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["book_id"].'</td>  
                     <td class="title" data-id1="'.$row["book_id"].'" contenteditable>'.$row["title"].'</td>  
                     <td class="author" data-id2="'.$row["book_id"].'" contenteditable>'.$row["author"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["book_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="first_name" contenteditable></td>  
                <td id="last_name" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td id="first_name" contenteditable></td>  
					<td id="last_name" contenteditable></td>  
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>