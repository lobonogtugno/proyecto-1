$(document).ready(function(){
	$('#pass2').keyup(function(){
		var pass = $('#pass').val();
		var pass2 = $('#pass2').val();

		if (pass == pass2) {
			$('#error2').text("Coninciden").css("color","green");	
		}else{
			$('#error2').text("No Coninciden").css("color","red");	
		}

		if (pass2 == "") {
			$('#error2').text("No puede dejar en blanco").css("color","red");
		}
	});
});