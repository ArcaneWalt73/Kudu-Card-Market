
//address for getHistory
var phpUrl = './php/getCartItems.php';

var cart_count = 0;
var total_cost = 0; //the total cost of the cart items
var userBalance = 0;
$(document).ready //only excecutes after document has loaded
(
    
    //make a get request for the user's purchase history
    function()
    {
	//make ajax get request
        $.get
	(
		phpUrl,
		function(data)
		{
			console.log(data);
			var json = JSON.parse(data); //turn the json string into an array of json objects

			if(json.length > 0)
			{	
				cart_count = json.length;
				$('#cart_count').append(" "+ cart_count +" items");
				
				//calculate total_cost
				for(var i = 0; i < cart_count; ++i)
				{
					var cost = json[i].PRICE;
					total_cost +=  parseInt(cost, 10);
				}
				
			}else
			{
				$('#cart_count').append(" "+ cart_count +" items");
			}
			
		}
	);
    }
);


function checkoutOnclick()
{
	if(cart_count > 0)
	{
		showConfirmation();
	}else
	{
		var empty_cart_modal = document.getElementById("empty_cart_modal");
		empty_cart_modal.style.display = "block";
		window.onclick = function(event)
		{
			if(event.target == empty_cart_modal)
			{
				empty_cart_modal.style.display = "none";
			}
		}

	}
}


function showConfirmation()
{
	var confirm_modal = document.getElementById("confirm_modal");
	confirm_modal.style.display = "block";
	window.onclick = function(event)
	{
		if(event.target == confirm_modal)
		{
			confirm_modal.style.display = "none";
		}
	}


	var yes_btn = document.getElementById("yes_btn");
	yes_btn.onclick = function()
	{
		
		confirm_modal.style.display = "none";
		if(balance >= total_cost)
		{
			dbCheckout();
			var completion_modal = document.getElementById("completion_modal");
			completion_modal.style.display = "block";

			window.onclick = function(event)
			{
				if(event.target == completion_modal)
				{
					completion_modal.style.display = "none";
					window.open("homepage.php","_self"); 					
				}
			}

		}else
		{
			var broke_modal = document.getElementById("user_is_broke_modal");
			broke_modal.style.display = "block";

			window.onclick = function(event)
			{
				if(event.target == broke_modal)
				{
					broke_modal.style.display = "none";
				}
	}


		}
	}	

	  

}

//checks if balance is all good

//does all that is necessary to checkout
function dbCheckout()
{
	var new_bal = balance - total_cost;
	$.post
	(
		'./php/checkout.php',
		{"NEW_BAL":new_bal},
		function(data)
		{
			//var json = JSON.parse(data);
			console.log(data);
		}
	);

}

function openCartPage()
{
	window.open("cart_page.html","_self");
}
