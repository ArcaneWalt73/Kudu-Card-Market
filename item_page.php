<?php
#include("./php/getUser.php");i
include("./php/helperFunctions.php");
include("./php/sessionHelper.php");

$helper = new HelperFunctions;
#echo $name;
$id = $_GET['id'];
$response = $helper->getItemInfo($id);

$resp = getUserSession();

if (isset($resp['name'])){$phpFile="./homepage.php";}else{$phpFile="./index.php";}

function showSnackbar($message) {
	echo "
	<div id='snackbar'>
		$message;
		<script type='text/javascript'>
			showSnackbar();
		</script>
	</div>
	";
}

/*if ($e['ERROR'] === true)
	if (isset($name))
		header("location: ../homepage.php");
	else
		header("location: ../index.php");
*/
/*$message = "please login first";
if(isset($_POST['buy_btn'])) { 
	if ($resp['code'] === 0) {
		showSnackbar("Hello ".$resp['name']);
		#echo $resp['name'];
		/*if ($helper->buyItem($id, $resp['name']) === 0)
			$message = "Transaction Successfull";
		else
			$message = "Transaction Failed";
		echo "
			<script type='text/javascript'>
				alert('$message');
				window.location.replace('./homepage.php');
			</script>" ;/
	} else {
		#echo "set user";
		showSnackbar($message);
		/echo "
			<script type='text/javascript'>
				alert('$message');
				window.location.replace('./index.php');
			</script>" ;*
	}
}*/
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

	

        <div id = "name_div" class="item-title" >
            <!--i class="fa fa-shopping-bag"></i--><h1 id="name"><?php echo $response['NAME'] ?></h1>
            <!--a class="tablinks" onclick="main(event,'search')"><i class="fa fa-fw fa-search"></i> Search</a>
            <a onclick="document.getElementById('login').style.display='block'" style="width:auto;">
                <i class="fa fa-fw fa-user"></i> Login
            </a>
	    <div class="topnav-right">
              <a class="tablinks"><i class="fas fa-user-alt"></i>Hello, User</a>
            </div>
            <div>
              <span id="user-text">Hello, User</span>
            </div-->
        </div>
	<div id="price_div">
	    <h4><?php echo 'R '.$response['PRICE']?><h4>
	</div>

	<div class="column">
		<div id="image_div" class="card">
			<img alt="Item image" id="image" width="500" height="400" src=<?php echo $response['URL']; ?>>;
		</div>
		<div id="item_info" class="container">
			<h6>DESCRIPTION</h6>
			<p id="item_info"><?php echo $response['DESCRIPTION']?></p>
		</div>
		<div id="item_info" class='container'>
			<h6>QTY:</h6>
			<p id="qty"><?php echo $response['QTY']?></p>
		</div>
		<!--div id="item_info" class="container">
			<form method="post"> 
        			<input type="submit" name="buy_btn" value="BUY"/>
			</form>
		</div-->
		<button onclick="showSnackbar()" name="buy_btn" type="submit" formmethod="post">ADD TO CART</button>
	</div>

	<div id="snackbar"><p id="alert"></p></div>

	<script>
		/*var options = window.location.search.slice(1)
                      .split('&')
                      .reduce(function _reduce (/*Object* a, /*String* b) {
                        b = b.split('=');
                        a[b[0]] = decodeURIComponent(b[1]);
                        return a;
                      }, {});
		options = String(options);
		console.log(options);
		var opt = options.split("?");
		console.log(opt[0]);
		console.log(opt[1]);

		var myData = JSON.parse(opt[1]);
		var para = document.getElementById("name");
		var img = document.getElementById("item_image");
		var info = document.getElementById("item_info");
		var price = document.getElementById("price");

		para.innerText = myData['NAME'];
		img.setAttribute("src", myData['IMAGE_URL']);
		info.innerText = myData['DESCRIPTION'];
		price.innerText = myData['PRICE'];*/
	</script>

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
/*$message = "please login first";
if(isset($_POST['buy_btn'])) { 
	if ($resp['code'] === 0) {
		showSnackbar("Hello ".$resp['name']);
		#echo $resp['name'];
		/*if ($helper->buyItem($id, $resp['name']) === 0)
			$message = "Transaction Successfull";
		else
			$message = "Transaction Failed";
		echo "
			<script type='text/javascript'>
				alert('$message');
				window.location.replace('./homepage.php');
			</script" ;/
	} else {
		#echo "set user";
		showSnackbar($message);
		/echo "
			<script type='text/javascript'>
				alert('$message');
				window.location.replace('./index.php');
			</scrip>" ;*
	}
}*/
		var output = "<?php
				if (isset($_POST["buy_btn"])) {
					if ($resp['code'] === 0) {
						if ($helper->addToCart($id, $resp['name']) === 0) {
							$response['QTY'] -= 1;
							echo "0";
						}
						else
							echo "1";
					} else
						echo "2";
				} else
					echo "3";
				?>";
		var message = "Please Login First";
		console.log(output);
		if (output == "0")
			message = "Successfully Added To Cart";
		else if (output == "1")
			message = "Unable To Add To Cart";

		var x = document.getElementById("snackbar");
		var a = document.getElementById("alert");
		var q = document.getElementById("qty");		

		a.innerText = message;
		x.className = "show";
		q.innerText = "<?php
				echo $response['QTY'];
				?>";
		console.log(q.innerText);

		setTimeout(
			function (){
				x.className = x.className.replace("show", "");
			}, 3000
		);
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
