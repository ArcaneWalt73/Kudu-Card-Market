
//address for getHistory
var phpUrl = 'https://lamp.ms.wits.ac.za/home/s1965919/Project/getHistoryWeb.php';

//get username set in the login page
var username = 694569;//document.cookie.split("=")[1];

$(document).ready
(
   
    
    //make a post request for the user's purchase history
    function()
    {
        //handle onclick for back button
        var backBtn = document.getElementById("back_btn");
        backBtn.onclick = function()
        {
            var parent_url = "";
            window.open(parent_url,"_self"); //go back to parent page  
        }

        $.post
        (
            phpUrl,
            {
                studentNo: username
            },
            function(data)
            {
                console.log("Data: " + data);
                
                var json = JSON.parse(data);
                //json = [[list Of JsonOBJs],[list Of JsonOBJs]]
                //json[1] is the more detailed version

                var listOfObjs1 = json[0];
                var listOfObjs2 = json[1];


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
                    console.log("p date: "+ listOfObjs1[i])
                    desc_col.innerHTML = listOfObjs2[i].DESCRIPTION;
                }


            }      
        );
    }    
);
