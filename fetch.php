<?php
$connect = mysqli_connect("localhost", "root", "mysqlpassword", "csit_library");
$output = '';

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM books 
	WHERE title LIKE '%".$search."%'
	OR author LIKE '%".$search."%'
	OR  quantity LIKE '%".$search."%'
	OR category LIKE '%".$search."%'
	OR book_level LIKE '%".$search."%'
	OR location LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM books ORDER BY book_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result)  > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Title</th>
							<th>Author</th>
							<th>Quantity</th>
							<th>Category</th>
							<th>Level</th>
							<th>Location</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["title"].'</td>
				<td>'.$row["author"].'</td>
				<td>'.$row["quantity"].'</td>
				<td>'.$row["category"].'</td>
				<td>'.$row["book_level"].'</td>
			</tr>
		';
	}
	echo $output;
	
}
else
{
	echo '<center><h3>Sorry!, this book is not available at CSIT library.</h3></center>';
}

?>