<div id="results" style="display: none;">
    <?php
        include('php/getItem.php');
	#include('php/session.php');
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
            <a onclick="document.getElementById('login').style.display='block'" style="width:auto;">
                <i class="fa fa-fw fa-user"></i> Login
            </a>
	    <!-- div class="topnav-right">
              <a class="tablinks"><i class="fas fa-user-alt"></i>Hello, User</a>
            </div>
            <div>
              <span id="user-text">Hello, User</span>
            </div-->
        </div>

        <div id="home" class="tabcontent"></div>
        <div id="search" class="tabcontent" style="display: none;">search catagories here</div>

        <!--login form-->
        <div id="login" class="modal">
            <form id='loginForm' class="modal-content animate" action="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/php/login.php" method="post" style="background-color:#1e376c">
              <div class="imgcontainer">
                <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/images/wits_logo.png" alt="Avatar" class="avatar">
              </div>
          
              <div class="container">
                <input style="border-radius:15px 15px 15px 15px;" type="text" placeholder="Enter Username" name="studentNumber" required>
          
                <input style="border-radius:15px 15px 15px 15px;" type="password" placeholder="Enter Password" name="password" required>
                  
                <button style="border-radius:15px 15px 15px 15px;" type="submit">Login</button>
              </div>
          
              <div class="container" style="background-color:#1e376c">
                <button style="border-radius:15px 15px 15px 15px;" type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">create <a href="#" onclick="document.getElementById('register').style.display='block'">account?</a></span>
              </div>
            </form>
          </div>
          
          <div id="register" class="modal">
            <form id='registerForm' class="modal-content animate" action="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/php/register.php" method="post" style="background-color:#1e376c">
              <div class="imgcontainer">
                <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/images/wits_logo.png" alt="Avatar" class="avatar">
              </div>
          
              <div class="container">
                <input style="border-radius:15px 15px 15px 15px;" type="text" placeholder="Enter Username" name="studentNumber" required>
          
                <input style="border-radius:15px 15px 15px 15px;" type="password" placeholder="Enter Password" name="password" required>

                <input style="border-radius:15px 15px 15px 15px;" type="text" placeholder="First Name" name="fname" required>

                <input style="border-radius:15px 15px 15px 15px;" type="text" placeholder="Last Name" name="lname" required>

                <input style="border-radius:15px 15px 15px 15px;" type="email" placeholder="Email" name="email" required>

                <input style="border-radius:15px 15px 15px 15px;" type="tel" placeholder="Contact Number" name="contact" required>
                  
                <button style="border-radius:15px 15px 15px 15px;" type="submit">Register</button>
              </div>
          
              <div class="container" style="background-color:#1e376c">
                <button style="border-radius:15px 15px 15px 15px;" type="button" onclick="document.getElementById('register').style.display='none'" class="cancelbtn">Cancel</button>
              </div>
            </form>
          </div>

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
                    div3.appendChild(para);
                    div2.appendChild(img);
                    div2.appendChild(div3);
                    div1.appendChild(div2);
                    home.appendChild(div1);
            }
          </script>

         
    </body>
</html>
