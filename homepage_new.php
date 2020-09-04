<div id="results" style="display: none;">
    <?php
        
	include('php/session.php');
	include('php/getItem.php');
	// Insert session checker	
    ?>
</div>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/navbar.css">
	<link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/homepage.css">




	<!-- Awesome Font CDN -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    </head> 

    <body>
        <div class="navbar">
            <a class="tablinks active" onclick="main(event,'home')"><i class="fa fa-fw fa-home"></i> Home</a>
            <a class="tablinks" onclick="main(event,'search')"><i class="fa fa-fw fa-search"></i> Search</a>
            <!--a onclick="document.getElementById('login').style.display='block'" style="width:auto;">
                <i class="fa fa-fw fa-user"></i> Login
            </a-->
	    
            <a href="./history_page.html" style="width:auto;">
                <i class="fa fa-fw fa-user"></i> History
            </a>
	    <div class="dropdown">
		<p><?php
			if ($_SESSION['login_user'])
				echo "Welcome, ".$_SESSION['login_user'];
			else
				echo "User Not defined";
		 ?></p>
	    </div>
			
	    <!-- div class="topnav-right">
              <a class="tablinks"><i class="fas fa-user-alt"></i>Hello, User</a>
            </div>
            <div>
              <span id="user-text">Hello, User</span>
            </div-->
        </div>

        <div id="home" class="tabcontent"></div>
        <div id="search" class="tabcontent" style="display: none;">search catagories here</div>

          <script>
            // Get the modal
            var modal = document.getElementById('login');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            /* this function takes in id, which correponds to the tabs. i.e home,search,login
            home is active by default
            make the tabs active accordingly 
            */
            function main(evt,id){
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(id).style.display = "block";
                evt.currentTarget.className += " active";
              
            }
          </script>
          <script>
            var div = document.getElementById("results");
            var myData =JSON.parse(div.textContent);
            console.log(myData[0]);
            var home = document.getElementById("home");
            div.setAttribute("class","row");
            for (var i=0; i<myData.length; i++){
                    var div1 = document.createElement("div");
                    var div2 = document.createElement("div");
                    div1.setAttribute("class","column");
		    var string1 = "location.href='./item_page.php?id=";
		    string1 = string1.concat(myData[i]['MARKET_ID'], "';");
		    div1.setAttribute("onclick", string1);
                    div2.setAttribute("class","card");
                    var img = document.createElement("IMG");
                    img.setAttribute("src", myData[i]["IMAGE_URL"]);
                    img.setAttribute("alt", myData[i]["NAME"]);
                    img.setAttribute("width","210");
                    img.setAttribute("height","170");
                    var div3 = document.createElement("div");
                    div3.setAttribute("class","container");
                    var para = document.createElement("P");
                    para.innerText = myData[i]["NAME"];
               
                    var priceDiv = document.createElement("div");
                    priceDiv.setAttribute("class", "container");
		    var price = document.createElement("P");
		    price.innerText = "R" + myData[i]["PRICE"];
                    priceDiv.appendChild(price);
 
                    div3.appendChild(para);
                    div2.appendChild(img);
                    div2.appendChild(div3);
                    div2.appendChild(priceDiv);
                    div1.appendChild(div2);
                    home.appendChild(div1);
            }
          </script>

         
    </body>
</html>
