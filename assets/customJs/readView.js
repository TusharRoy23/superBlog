function onread(threadTitle, threadContent, userID, threadID, loggedInUserID){
		if(loggedInUserID == ""){
			$.ajax({
				type:"POST",
				url: "getCommentsFromDB.php",
				data:{threadID:threadID, userID:userID},
				dataType:"JSON",
				success: function(data){
					var count = Object.keys(data).length;
					var myModal = $('#notLoggedInReadModal');
					myModal.find('.modal-title').text(threadTitle);
					myModal.find('.description').text(threadContent);
					var form = $(this);
					document.getElementById("showCommentsInNoneLoggedIn").innerHTML=""; 
					if(count != '0'){
						for(i = 0; i<count; i++){ 
							document.getElementById("showCommentsInNoneLoggedIn").innerHTML += 
							'<div class="box onlyBorder">'+
								'<p>'+data[i].commentDate+'  at  '+data[i].commentTime+'  by   '+data[i].fullname+'</p>'+
								data[i].commentContent+
							'</div>';
						}
					}
					else{
						document.getElementById("showCommentsInNoneLoggedIn").innerHTML += '<div class="box onlyBorder"><b>No comment</b></div>';
					}
					myModal.modal('show');
					$(form).fadeOut(800, function(){
		                            form.html(data).fadeIn().delay(2000);

		            });
				},
				error: function (jqXHR, textStatus, errorThrown){
					alert("Error");
				}
			});
		}
		else{
			$.ajax({
				type:"POST",
				url: "getCommentsFromDB.php",
				data:{threadID:threadID, userID:userID},
				dataType:"JSON",
				success: function(data){
					var count = Object.keys(data).length;
					var readModal = $('#readModal');
					readModal.find('.modal-title').text(threadTitle);
					readModal.find('.description').text(threadContent);
					var form = $(this);
					document.getElementById("showComments").innerHTML=""; 
					if(count != '0'){
						for(i = 0; i<count; i++){ 
							document.getElementById("showComments").innerHTML += 
							'<div class="box onlyBorder">'+
								'<p>'+data[i].commentDate+'  at  '+data[i].commentTime+'  by   '+data[i].fullname+'</p>'+
								data[i].commentContent+
							'</div>';
						}
					}
					else{
						document.getElementById("showComments").innerHTML += '<div class="box onlyBorder"><b>No comment</b></div>';
					}
					readModal.modal('show');
					$(form).fadeOut(800, function(){
		                            form.html(data).fadeIn().delay(2000);

		            });
				},
				error: function (jqXHR, textStatus, errorThrown){
					alert("Error");
				}
			});
		}
}

function onregister(){
	alert("Hello");
}
function signupforprofile(){
	//alert('plz register');
	$('#registerModal').modal('show');
}
function readaftersearch(){
	$('#notLoggedInReadModal').modal('show');
}
