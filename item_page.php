<?php
#include("./php/getUser.php");i
include("./php/helperFunctions.php");
include("./php/sessionHelper.php");

$helper = new HelperFunctions;
#echo $name;
$id = $_GET['id'];
$response = $helper->getItemInfo($id);
static $button_press = 0;
$resp = getUserSession();

if (isset($resp['name'])){$phpFile="./homepage.php";}else{$phpFile="./index.php";}
//$resp['name']." ".$resp['code'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Kudu Mart</title>

	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

	<!-- FontAwesome -->
	<script src="https://kit.fontawesome.com/e351a758ee.js" crossorigin="anonymous"></script>

	<!-- Custom Style -->
	<link rel="stylesheet" type="text/css" href="./css/item_page.css">

	<!-- Slick CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- Navbar CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/navbar_.css">
	<link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/dropbox.css">
	<link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/snackbar.css">

	
	<script defer src="./jquery/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--script src="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/js/snackbar.js"></script-->
	<script defer src="./js/cartHandler.js"></script>
	
</head>
<body>

	<div class="navbar">
		<a href=<?php echo $phpFile; ?> class="tablinks active"><i class="fa fa-fw fa-home"></i>Home</a>

           
		<div class="dropdown" id="cart" style="float:left" text-align="center">
			<button id="cart_count" class="dropbtn" style="width:auto" onclick="openCartPage()">
				<i class="fa fa-shopping-cart"></i>
			</button>
			<div class="dropdown-content" style="background-color:#009900" onclick="checkoutOnclick()">
				<button>checkout</button>
			</div>		

	     	</div>	
	
		<div class="dropdown">
	                 <button class="dropbtn" style="width:auto;"><b id="username"> <?php if (isset($resp['name'])){ echo $resp['name'];} ?> 
               		 </b>
               		 <i class="fa fa-caret-down"></i>
               		 </button>
               		 <div class="dropdown-content">

                       		 <a>Balance: R<b id="balance"> <script>
                       			 var balance = "<?php
                               		 include('php/getBalance.php');
                               		 echo $login_balance;
                               		 ?>";
                       			 document.getElementById("balance").innerHTML = balance;
                       			 </script>        
                       			 </b>
				 </a>

                        <a href="./history_page.html">
                       		 <i class="fa fa-fw fa-user"></i>History
                        </a>

                        <a href="./logout.php" class="tablinks">
                       		 <i class="fa fa-fw fa-home"></i> logout
                        </a>

                </div>
            </div>
		
	<img src="images/defaultIcon.jpg" style="dispay: inline-block;" width="44px" height="44px">
         
 
        </div>
			
		<div>
		<div class="item">
			<img src="<?php echo $response['URL']; ?>" style="max-width:300px;max-height:280px;margin:10px">
			<h1><?php echo $response['NAME']; ?></h1>
			<p class="price"><?php echo 'R'.$response['PRICE']?></p>
			<p><?php echo $response['DESCRIPTION']; ?></p>
			<p>Available : <p id="qty"><?php echo $response['QTY']?></p></p>
			<p><button onclick="showSnackbar()" id="buy_btn">Add to Cart</button></p>
		</div>
		<div class="reviews">
			<span id="head" class="heading">User Rating</span>
			<p id="ratingP"style="display:none"><?php echo $response['RATING']?></p>
			<p id="bars" style="display:none">
			<?php
				for ($i=1; $i<6; $i = $i+1){
					if(!isset($response[$i.''])){
						$response[$i.''] = 0;
					}
				}
				echo json_encode($response);
			?></p>
			<script>
				var checked = parseInt(document.getElementById('ratingP').innerHTML);
				var parenT = document.createElement('span');
				parenT.setAttribute("style","margin-left:25px;");
				for(var j=0; j<checked; j++){
					var local = document.createElement("span");
					local.setAttribute("class","fa fa-star checked");
					parenT.appendChild(local);
				}
				var unChecked = 5-checked;
				for(var j=0; j<unChecked; j++){
					var local = document.createElement("span");
					local.setAttribute("class","fa fa-star");
					local.setAttribute("style","color:grey");
					parenT.appendChild(local);;
				}
				document.getElementById("head").appendChild(parenT);
				var numBars = JSON.parse(document.getElementById('bars').textContent);
				var createReviewBars = function(numStars){
					var percent = parseInt((numBars[numStars]/numBars['REVIEW'])*100);
					return percent+"%";
				};
			</script>
			<p><?php echo $response['RATING']?> average based on <?php echo $response['REVIEW']?> reviews.</p>
			<hr style="border:3px solid #f1f1f1">

			<div class="row">
				<div class="side">
					<div>5 star</div>
				</div>
				<div class="middle">
					<div id="star5" class="bar-container">
						<script>
							var bar = document.createElement('div');
							bar.setAttribute("class","bar-5");
							bar.setAttribute("style","width:"+createReviewBars(5));
							document.getElementById('star5').appendChild(bar);
						</script>
					</div>
				</div>
				<div class="side right">
					<div><?php echo $response[5]?></div>
				</div>
				<div class="side">
					<div>4 star</div>
				</div>
				<div class="middle">
					<div id="star4"class="bar-container">
						<script>
							var bar = document.createElement('div');
							bar.setAttribute("class","bar-4");
							bar.setAttribute("style","width:"+createReviewBars(4));
							document.getElementById('star4').appendChild(bar);
						</script>
					</div>
				</div>
				<div class="side right">
					<div><?php echo $response[4]?></div>
				</div>
				<div class="side">
					<div>3 star</div>
				</div>
				<div class="middle">
					<div id="star3" class="bar-container">
						<script>
							var bar = document.createElement('div');
							bar.setAttribute("class","bar-3");
							bar.setAttribute("style","width:"+createReviewBars(3));
							document.getElementById('star3').appendChild(bar);
						</script>
					</div>
				</div>
				<div class="side right">
					<div><?php echo $response[3]?></div>
				</div>
				<div class="side">
					<div>2 star</div>
				</div>
				<div class="middle">
					<div id ="star2" class="bar-container">
						<script>
							var bar = document.createElement('div');
							bar.setAttribute("class","bar-2");
							bar.setAttribute("style","width:"+createReviewBars(2));
							document.getElementById('star2').appendChild(bar);
						</script>
					</div>
				</div>
				<div class="side right">
					<div><?php echo $response[2]?></div>
				</div>
				<div class="side">
					<div>1 star</div>
				</div>
				<div class="middle">
					<div id="star1" class="bar-container">
						<script>
							var bar = document.createElement('div');
							bar.setAttribute("class","bar-1");
							bar.setAttribute("style","width:"+createReviewBars(1));
							document.getElementById('star1').appendChild(bar);
						</script>
					</div>
				</div>
				<div class="side right">
					<div><?php echo $response[1]?></div>
				</div>
			</div>
		</div>
	</div>

	<div id="snackbar"><p id="alert"></p></div>
	<script>
		// Get the modal
		var modal = document.getElementById('login');
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>

	<script>
		/*
		* How to use:
		* Create a div element with id="snackbar" and message between tags
		* call showSnackbar() when you want to show it
		*/

		function showSnackbar () {	
			var item_id = <?php echo $id ?>;
			var studentNo = <?php echo $resp['name'] ?>;
			var code = <?php echo $resp['code'] ?>;
			var qty = document.getElementById("qty").innerText;
			$.post (
				'./php/addItemToCart.php',
				{"MARKET_ID":item_id, 
				"STUDENT_ID":studentNo,
				"QTY":qty,
				"CODE":code},
				function(data) {
					console.log(data);
					//alert("Data : "+data);
					var output = JSON.parse(data);

					var message = "Please Login First";
					var x = document.getElementById("snackbar");
					var a = document.getElementById("alert");
					var q = document.getElementById("qty");
					if (output.error == 0) {
						message = "Successfully Added To Cart";
					} else if (output.error == 1) {
						message = "Unable To Add To Cart";
					}
					
					a.innerText = message;
					x.className = "show";
					q.innerText = output.qty;
					console.log(data);
					setTimeout(
						function (){
							x.className = x.className.replace("show", "");
						}, 3000
					)
					//window.open("item_info.php", "self");
				}
			)
		}
	</script>


	<!-- checkout completion modal -->
	  <div id="completion_modal" class="modal">
	  	<div id= "confirm_btns_div" class="modal-content animate" style="background-color:#1e376c">
			<p> All done! Thank you for your money.</p> 
	  	</div>
	  </div>

	<!-- insufficient funds modal -->
	  <div id="user_is_broke_modal" class="modal">
	  	<div id= "confirm_btns_div" class="modal-content animate" style="background-color:#1e376c">
			<p> Oops! You have insufficient funds</p> 
	  	</div>
	  </div>

	  <!-- add to cart first modal -->
	  <div id="empty_cart_modal" class="modal">
	  	<div id= "confirm_btns_div" class="modal-content animate" style="background-color:#1e376c">
			<p> :) You might want to add something to the cart first </p> 
	  	</div>
	  </div>

</body>
</html>

