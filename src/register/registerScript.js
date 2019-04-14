function sendToScriptRegister(){
	var email = $("#email").val();
	var password = $("#password").val();
	var repeatedPassword = $("#repeatedPassword").val();
	if(email && password && repeatedPassword){
		$(document).ready(function() {
			$.ajax(
			{	
				url:"../../../src/register/validationRegister.php",
				type: "POST",
				data: {email,password,repeatedPassword},
				success:function(result){
					var resultArray = JSON.parse(result);
					var validationStatus = resultArray['validationStatus'];
					var information = resultArray['information'];

					if (validationStatus=='true') {
						$("#registerForm").html('</br></br></br>');
						$("#correctRegistration").show();
						$("#correctRegistration").html(information);
					}
					else if(validationStatus=='false'){
						$("#wrongRegistration").show();
						$("#wrongRegistration").html(information);
					}
					
				}
			});
		})
	}
	else{
		$("#wrongRegistration").show();
		$("#wrongRegistration").html("Enter necessary data!");
		console.log("Error!")
	}
}

$("#email,#password,#repeatedPassword").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#registerButton").click();
    }
});