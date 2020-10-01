//address for getCartItems
var phpUrl = './php/getCartItems.php';

$(document).ready //only excecutes after document has loaded
(
    
    //make a get request for the user's purchase history
    function()
    {

        //handle onclick for back button
        var backBtn = document.getElementById("back_btn");
        backBtn.onclick = function()
        {
                var parent_url = "homepage.php"; 
                window.open(parent_url,"_self"); //go back to parent page  
        }

	//make ajax get request
        $.get
	(
		phpUrl,
		function(data)
		{
			var json = JSON.parse(data); //turn the json string into an array of json objects
			if(json.length > 0)
			{	
		        	//table in the history html
			        var table = document.getElementById("cart_table");
			
			        for(let i = 0; i < json.length; ++i) //for each history entry
			        {
			            //empty <tr> element as the ith row
			            var row = table.insertRow(i+1);
			
			            //add empty columns
			            var product_col = row.insertCell(0);
			            var amnt_col = row.insertCell(1);
			            var desc_col = row.insertCell(2);
				    var delete_col = row.insertCell(3);
			            
			            //set the respective values
			            product_col.innerHTML = json[i].NAME;
			            amnt_col.innerHTML = json[i].PRICE;
			            desc_col.innerHTML = json[i].DESCRIPTION;
				    
			
				    //set it such that if user clicks it then item is deleted from cart
				    var delete_btn = document.createElement("input");
				    delete_btn.type = "button";
				    delete_btn.value = "delete";
				    delete_btn.setAttribute("class", "delete_btns");

			            var id = json[i].MARKET_ID; 
				    delete_btn.setAttribute("onclick","removeFromCart(" + id +")");
	
				    delete_col.appendChild(delete_btn);
			        }
			}else
			{
				var table = document.getElementById("cart_table");
				table.deleteRow(0);
				var row = table.insertRow(0);
				var desc_col = row.insertCell(0);
				desc_col.innerHTML = "You haven't added any items to the cart yet!";
	
			}		
			
		}
	);
    }
);

function callback()
{
	console.log("hello");
}

function removeFromCart(item_id)
{
	$.post
	(
		'./php/removeItemFromCart.php',
		{"MARKET_ID":item_id},
		function(data)
		{
			window.open("cart_page.html","_self" );
		}
		
	);
}
