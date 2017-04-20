function getToken(callbackFunction) {
	$.post( "/ajax/getToken.php", function( data ) {
		var obj = JSON.parse(data);
		var tokenName = data.split(":")[0].replace('"', '');
		var tokenValue = data.split(":")[1].replace('"', '').replace("'", '').replace("'", '');
	    if(typeof callbackFunction == 'function')
	    {
	    	callbackFunction.call(this, [tokenName, tokenValue]);
	    }
	});

}