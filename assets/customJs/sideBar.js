function onopens(){
	document.getElementById("sideBar").style.width = "38%";
    document.getElementById("dashboard").style.marginLeft = "32%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}
function oncloses(){
	document.getElementById("sideBar").style.width = "0";
    document.getElementById("dashboard").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}