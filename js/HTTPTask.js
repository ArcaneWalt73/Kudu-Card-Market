//makes requesting or posting data easier in the same way that asynchttptask does in android
//Both functions return an array of json objects.

class HTTPTask
{
    getQuery = function(phpUrl)
    {
	var output; //will be an array of json objects
	
	function callBack(data)
	{
		console.log("callback: "+ data);
		output = data;
		console.log("output: "+ output);

	}

	async funtion first(data)
	{

			var json = JSON.parse(data);
			callback(data);
	}

	first.then(alert);

	function asyncRequest(callback)
	{
	        $.get
	        (
	            phpUrl,
	            first(data)
	        );
	
	}
	
	asyncRequest(callBack);
	while(output == undefined)
	{
		
	}
	return output;
     }

    //params is an array of json objects in the form: {name1:"value1", name2:"value2", etc}
    getPost = function (phpUrl,params) 
    {
        $.post
        (
            phpUrl,
            params,
            function(data)
            {
                var json = JSON.parse(data);
                return json;
            }
        );
    }
}
