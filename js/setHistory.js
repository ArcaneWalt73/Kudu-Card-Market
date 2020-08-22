
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
 
		        var listOfObjs1 = json[0]; 
		        var listOfObjs2 = json[1]; //detailed columns
		
		
		        //table in the history html
		        var table = document.getElementById("history_table");
		
		        for(var i = 0; i < listOfObjs2.length; ++i) //for each history entry
		        {
		            //empty <tr> element as the ith row
		            var row = table.insertRow(i+1);
		
		            //add empty columns
		            var product_col = row.insertCell(0);
		            var amnt_col = row.insertCell(1);
		            var purchDate_col = row.insertCell(2);
		            var desc_col = row.insertCell(3);
		            
		            //set the respective values
		            product_col.innerHTML = listOfObjs2[i].NAME;
		            amnt_col.innerHTML = listOfObjs2[i].PRICE;
		            purchDate_col.innerHTML = listOfObjs1[i].PURCHASE_DATE;
		            desc_col.innerHTML = listOfObjs2[i].DESCRIPTION;
		        }
		
		}
	);
    }
);
