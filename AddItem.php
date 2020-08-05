<?php
	
	$username = "s1965919";
	$password = "ICTPass1670";
	$database = "d1965919";
	
	//this is our upload folder 
	$upload_path = 'uploads/';
	
	//Getting the server ip 
	$server_ip = 'lamp.ms.wits.ac.za';
	
	//creating the upload url 
	$upload_url = 'https://'.$server_ip.'/~s1965919/'.$upload_path; 
	
	//response array 
	$response = array(); 
 

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//checking the required parameters from the request 
		if(isset($_POST['name']) and isset($_POST['price']) and isset($_POST['Category']) and isset($_POST['Description']) and isset($_FILES['image']['name'])){		
			
			//connecting to the database 
			$con = mysqli_connect("127.0.0.1",$username,$password,$database);
			
			//getting params from the request 
			$name = $_POST['name'];
			$price = $_POST['price'];
			$Category = $_POST['Category'];
			$Description = $_POST['Description'];
			
			//getting file info from the request 
			$fileinfo = pathinfo($_FILES['image']['name']);
			
			//getting the file extension 
			$extension = $fileinfo['extension'];
			
			//file url to store in the database 
			$file_url = $upload_url . getFileName() . '.' . $extension;
			
			//file path to upload in the server 
			$file_path = $upload_path . getFileName() . '.'. $extension; 
			
			//trying to save the file in the directory 
			try{
				//saving the file 
				move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
				$sql = "INSERT INTO MARKET_NEW (IMAGE_URL, NAME, PRICE, CATEGORY, DESCRIPTION) VALUES ('$file_url', '$name', '$price', '$Category', '$Description');";
				
				//adding the path and name to database 
				if(mysqli_query($con,$sql)){
					
					//filling response array with values 
					$response['error'] = false; 
					$response['url'] = $file_url; 
					$response['name'] = $name;
					$response['price'] = $price;
					$response['Category'] = $Category;
					$response['Description'] = $Description;
					
				}
			//if some error occurred 
			}catch(Exception $e){
				$response['error']=true;
				$response['message']=$e->getMessage();
			}		
			//displaying the response 
			echo json_encode($response);
			
			//closing the connection 
			mysqli_close($con);
	}else{
			$response['error']=true;
			$response['message']='Please choose a file';
			echo json_encode($response);
		}
}
	
	
	/*
		We are generating the file name 
		so this method will return a file name for the image to be upload 
	*/
	function getFileName(){
		$username = 's1965919';
		$password = 'ICTPass1670';
		$database = 'd1965919';
		$con = mysqli_connect("127.0.0.1",$username,$password,$database) or die('Unable to Connect...');
		$sql = "SELECT max(MARKET_ID) as MARKET_ID FROM MARKET_NEW";
		$result = mysqli_fetch_array(mysqli_query($con,$sql));
		
		mysqli_close($con);
		if($result['MARKET_ID']==null)
			return 0; 
		else 
			return ++$result['MARKET_ID']; 
	}
?>
