function sendToScriptLogin(){
	var emailLog = $("#emailLog").val();
	var passwordLog = $("#passwordLog").val();
	if(emailLog && passwordLog){
		$(document).ready(function() {
			$.ajax(
			{	
				url:"../../../src/login/validationLogin.php",
				type: "POST",
				data: {emailLog,passwordLog},
				success:function(result){
					var resultArray = JSON.parse(result);
					var validationStatus = resultArray['validationStatus'];
					var information = resultArray['information'];

					if (validationStatus=='true') {
						location.href="../../../";
						console.log('Logged ');
					}
					else if(validationStatus=='false'){
						$("#wrongLogin").show();
						$("#wrongLogin").html(information);
					}
					
				}
			});
		})
	}
	else{
		$("#wrongLogin").show();
		$("#wrongLogin").html("Enter necessary data!");
		console.log("Error!")
	}
}

$("#passwordLog,#emailLog").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#bottomLoginButton").click();
    }
});
