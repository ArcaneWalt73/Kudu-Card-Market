<div id="results" style="display: none;">
    <?php
        include('php/getItem.php');
        #echo $_SESSION['login_user'];_
        #include('php/session.php');
        // Insert session checker
    ?>
</div>

<!DOCTYPE html>
<html>
    <head>
        <title>Kudu Mart</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/navbar_.css">
        <link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/homepage.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <!-- Awesome Font CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    </head>

    <body>
        <div class="navbar">
            <a class="tablinks active" onclick="main(event,'home')"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="./history_page.html" style="width:auto;">
                    <i class="fa fa-fw fa-user"></i>History
            </a>
            <input id="userIcon" type="image" src="images/defaultIcon.jpg" >
            <div id="cart" style="float:right">
                <a>Cart<span class="price" style="color:white"><i class="fa fa-shopping-cart"></i> <b id="cartNumber">0</b></span></a>
            </div>

            <div class="search">
              <form id="searchForm">
                  <input id="searchInput" type="text"
                      placeholder=" Search..."
                      name="searc">
                  <button id="searchBtn">
                      <i class="fa fa-search"
                          style="font-size: 18px;">
                      </i>
                  </button>
              </form>
            </div>
        </div>

        <div id="home" class="tabcontent"></div>

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
            $(document).ready(function(){
                $('#searchBtn').click(function(){
                    $.post("https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/php/search_items.php",
                    {
                    search: document.getElementById("searchInput").value
                    },
                    function(data,status){
                    var searchData = JSON.parse(data);
            sessionStorage.setItem('searchData', JSON.stringify(searchData));
                    });
                });
                });
            if(sessionStorage.length !=0){
            var retrievedObject = sessionStorage.getItem('searchData');
            $("#home").empty();
            myData = JSON.parse(retrievedObject);
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
                sessionStorage.clear();
                }
          </script>
    </body>
</html>
