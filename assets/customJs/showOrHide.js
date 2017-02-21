$(document).ready(function(){
	var elem = document.getElementById("hideShow");
    $("#hideShow").click(function(){
        $("#editProfile").toggle();
        if (elem.value=="Edit Profile") elem.value = "Close";
     	else elem.value = "Edit Profile";
    });
});