<!DOCTYPE html>
<html>
    <head>
        <title>Kudu Mart</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/navbar_.css">
        <link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/homepage.css">
	<link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/dropbox.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Awesome Font CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    
    </head>

    <body>
        <div class="navbar">
            <a onclick="clearSearch()" class="tablinks active"><i class="fa fa-fw fa-home"></i> Home</a>

            <div id="cart" style="float:left">
                <a>Cart<span class="price" style="color:white"><i class="fa fa-shopping-cart"></i> <b id="cartNumber">0</b></span></a>
            </div>
	   
	   <div class="dropdown">
		 <button class="dropbtn" style="width:auto;"><b id="username"><script>
                        var username = "<?php
                                include('php/getUser.php');
                                echo $name;
                                ?>";
                        document.getElementById("username").innerHTML = username;
                </script>
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
			</b></a>      			

	    		<a href="./history_page.html">
                    	<i class="fa fa-fw fa-user"></i>History
            		</a>
      			
			<a href="./logout.php" class="tablinks">
                        <i class="fa fa-fw fa-home"></i> logout
                        </a>

    		</div>
  	    </div>


            <img src="images/defaultIcon.jpg" style="dispay: inline-block;" width="44px" height="44px">

            <div id="searchI" class="search"> 
              <form id="searchForm"> 
                  <input id="searchInput" type="text"
                      placeholder=" Search..."
                      name="search" value=''> 
                  <button id="searchBtn"> 
                      <i class="fa fa-search"
                          style="font-size: 18px;"> 
                      </i> 
                  </button> 
              </form> 
            </div>

        </div>
        
        <div id="home" class="tabcontent"></div>
	<div id="results" style="display: none;">
          <?php
        	include('php/getItem.php');
        	// Insert session checker
    	  ?>
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
          </script>
          <script>
              var div = document.getElementById("results");
              var data =JSON.parse(div.textContent);
              //console.log(data[0]);
              //function to diplay items
              var displayItems = function(myData){
                  var home = document.getElementById("home");

                  for (var i=0; i<myData.length; i++){
                      var div1 = document.createElement("div");
                      var div2 = document.createElement("div");
                      div1.setAttribute("class","column");
                      var string1 = "location.href='./item_page.php?id=";
                      string1 = string1.concat(myData[i]['MARKET_ID'], "';");
                      div1.setAttribute("onclick", string1);
                      div2.setAttribute("class","card");
                      var img = document.createElement("IMG");
                      img.setAttribute("class", "images");
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
              }
              displayItems(data);
              //function to search
              var searchEvent = function(event){
                  event.preventDefault();
                  var key = event.target.elements['search'].value;
                  search(key);
              }
              var search = function(key){
                  var tokens = key.toLowerCase().split(' ')
                                  .filter(function(token){
                                    return token.trim() !=='';
                                  });
                  if(tokens.length){
                      var keyRegex = new RegExp(tokens.join('|'),'gim');
                      var filteredList = data.filter(function(i){
                          var dataString = '';
                          for(var j in i){
				if(j == 'NAME'){
				    if(i.hasOwnProperty(j) && i[j]!==''){
				      dataString += i[j].toString().toLowerCase().trim()+' ';
				    }
			  	}
                          }
                          return dataString.match(keyRegex);

                      });
                      document.getElementById('home').innerHTML = "";
                      //window.history.pushState({}, document.title, "/" + "search?"+key);
                      if(filteredList.length==0){
                        document.getElementById('home').innerHTML = "Ops!!!, no search results for "+key+"<br>click home to return to main page";
                      }
                      sessionStorage.setItem('search',key);
                      displayItems(filteredList);
                  }
              };
              //install the event listener for the search form
              document.getElementById('searchForm').addEventListener('submit',searchEvent);
              /*in th case the page is reloaded and we still want to keep the search results
                get the latest search key from the sessionStorage
              */
              if(sessionStorage.length !=0){
                document.getElementById('searchInput').value = sessionStorage.getItem('search');
                document.addEventListener('load',search(sessionStorage.getItem('search')));
              }
              /* the function clears the search input and also removes the key from the sessionStorage*/
              function clearSearch(){
                  document.getElementById('searchInput').value = '';
                  document.getElementById('home').innerHTML = '';
                  sessionStorage.clear();
                  //window.history.pushState({}, document.title, "/");
                  displayItems(data);
              }
              /*the end of search*/
          </script>
    </body>
</html>
