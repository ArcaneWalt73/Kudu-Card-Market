var myFunc = function(studentNo,id){
	sessionStorage.setItem("itemRateId",id);
	sessionStorage.setItem("studentNo",studentNo);		
        return window.location.href = 'rating.html';
}

//address for getHistory
var phpUrl = './php/getHistory.php';
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
		        	//reverse array
				json = reverseArr(json);
				//table in the history html
			        var table = document.getElementById("history_table");
			
			        for(var i = 0; i < json.length; ++i) //for each history entry
			        {
			            //empty <tr> element as the ith row
			            var row = table.insertRow(i+1);
			
			            //add empty columns
			            var product_col = row.insertCell(0);
			            var amnt_col = row.insertCell(1);
			            var purchDate_col = row.insertCell(2);
			            var desc_col = row.insertCell(3);
			            var rate_col = row.insertCell(4);

			            //set the respective values
			            product_col.innerHTML = json[i].NAME;
			            amnt_col.innerHTML = json[i].PRICE;
			            purchDate_col.innerHTML = json[i].PURCHASE_DATE;
			            desc_col.innerHTML = json[i].DESCRIPTION;

                                    //rate an item
				    var id=json[i]["MARKET_ID"];
				    var studNo = json[i]["STUDENT_NO"];
                                    var rate_btn=document.createElement('button');
                                    rate_btn.type="button";
				    rate_btn.innerHTML="rate/review";
				    rate_btn.setAttribute("onclick", "return myFunc("+studNo+","+id+")");
                                    rate_col.append(rate_btn);
			        }
			}else
			{
				var table = document.getElementById("history_table");
				table.deleteRow(0);
				var row = table.insertRow(0);
				var desc_col = row.insertCell(0);
				desc_col.innerHTML = ":( Oh my, you haven't made a purchase yet!";
	
			}		
			
		}
	    /*function myFunc(id){
        	sessionStorage.setItem("itemId", id);
        	return window.location.href='../rating.html';
    	    }*/
	);
    }
);

function reverseArr(arr)
{
	var new_arr = new Array(arr.length);
	for(var i = 0; i < arr.length; ++i)
	{
		new_arr[i] = arr[arr.length - i - 1];
	}
	return new_arr;
}
