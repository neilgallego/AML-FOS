function loadXMLDoc1() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      pres(xmlhttp);
    }
  };
  xmlhttp.open("GET", "nc.xml", true);
  xmlhttp.send();
}



var pcheckCount=0
var pmaxChecks=3
function componentCheck(obj){
	if(obj.checked){
		pcheckCount=pcheckCount+1
	} else {
		pcheckCount=pcheckCount-1
	}
	if(pcheckCount > pmaxChecks){
		obj.checked = false
		pcheckCount = pcheckCount-1
		alert('You may only select up to ' + pmaxChecks + ' component' );
	}
}