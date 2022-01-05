$("#image" ).hide();


function myFunction() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text"
	} else {
		x.type = "password";
	}
}

$(document).ready(function() {
	$('.img')
		.mouseover(function() {
			$(this).attr("src", "../assets/img/evamerc-login-on.png");
		})
		.mouseover(function() {
			//$(this).attr("src", "../assets/img/evamerc-login-off.png");
		});
});
function ocultarboton(){
	contrasena=$("#password").val()
	if (contrasena!="") {
		$("#image" ).show();
	}else{
		$("#image" ).hide();
	}
}
     