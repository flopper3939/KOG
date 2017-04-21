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
function adjustGamma(_) {
  return Math.pow((_ + 0.055) / 1.055, 2.4);
}

function rgbToRealativeLumens(rgb) {
  var rc = 0.2126;
  var gc = 0.7152;
  var bc = 0.0722;
  var lowc = 1 / 12.92;
  var rsrgb = rgb[0] / 255;
  var gsrgb = rgb[1] / 255;
  var bsrgb = rgb[2] / 255;
  var r = (rsrgb <= 0.03928) ? (rsrgb * lowc) : adjustGamma(rsrgb);
  var g = (gsrgb <= 0.03928) ? (gsrgb * lowc) : adjustGamma(gsrgb);
  var b = (bsrgb <= 0.03928) ? (bsrgb * lowc) : adjustGamma(bsrgb);
  return r * rc + g * gc + b * bc;
};

function componentToHex(c) {
  var hex = c.toString(16);
  return hex.length == 1 ? "0" + hex : hex;
}

function rgbToHex(r, g, b) {
  return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}

function hexToRgb(hex) {
  // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
  var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
  hex = hex.replace(shorthandRegex, function(m, r, g, b) {
    return r + r + g + g + b + b;
  });

  var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
  return result ? normailzeRGB({
    r: parseInt(result[1], 16),
    g: parseInt(result[2], 16),
    b: parseInt(result[3], 16)
  }) : null;
}

function normailzeRGB(obj) {
  return [obj.r, obj.g, obj.b];
}

function getColorGrade(rgb1, rgb2) {
  var L1 = rgbToRealativeLumens(rgb1);
  var L2 = rgbToRealativeLumens(rgb2);
  var score;
  if (L1 >= L2) {
    score = (L1 + 0.05) / (L2 + 0.05);
  } else {
    score = (L2 + 0.05) / (L1 + 0.05)
  }
  var obj = {};
  if (score >= 0 && score < 3) {
    obj.large = "FAIL";
    obj.small = "FAIL"
  }
  if (score >= 3 && score < 4.5) {
    obj.large = "AA";
    obj.small = "FAIL"
  }
  if (score >= 4.5 && score < 7) {
    obj.large = "AAA";
    obj.small = "AA"
  }
  if (score >= 7) {
    obj.large = "AAA";
    obj.small = "AAA"
  }
  return obj;
}
function colorObjectToRGB(obj) {
	// Get colors in RGB
	obj = obj.toRGB();
    // Parse to array
    obj = $.map(obj, function(value) { return value;})
	// Remove alpha elemnt
	obj.splice(3, 1);
	return obj;
}