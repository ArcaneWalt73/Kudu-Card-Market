<?php 
	
	$username = "s1965919";
	$password = "ICTPass1670";
	$database = "d1965919";
	
	//connection to database 
	$con = mysqli_connect("127.0.0.1",$username,$password,$database) or die('Unable to Connect...');
	
	//sql query to fetch all Items 
	$sql = "SELECT * FROM Items";
	
	//getting Items 
	$result = mysqli_query($con,$sql);
	
	//response array 
	$response = array(); 
	$response['error'] = false; 
	$response['Items'] = array(); 
	
	//traversing through all the rows 
	while($row = mysqli_fetch_array($result)){
		$temp = array(); 
		$temp['id']=$row['id'];
		$temp['name']=$row['name'];
		$temp['url']=$row['url'];
		$temp['price']=$row['price'];
		$temp['category']=$row['category'];
		$temp['description']=$row['description'];
		array_push($response['Items'],$temp);
	}
	//displaying the response 
	echo json_encode($response);
?>



