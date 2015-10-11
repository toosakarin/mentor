<html>
<head>
	<title>Test Request Function</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">

		function doRegister() {
			var data = 
				'{"user_name":"POST", "user_password":"PW_POST", "user_device_id":"a25082797"}';
			var request = new XMLHttpRequest(); 
			request.open('POST', "http://localhost/service_magic/_Register");
			request.setRequestHeader('Content-Type', 'application/json');
			request.send(json);
			
			alert("registering...");
		}

		function sendForm(form)
		{
// 			alert("send form");
			var data =
				'{"user_name":"POST", "user_password":"PW_POST", "user_device_id":"a25082797"}'; 
// 		   		"{\"user_name\":\"POST\", \"user_password\":\"PW_POST\", \"user_device_id\":\"a25082797\"}"; 
// 			      "{ \"x\": \"" + form.example1.value + "\", \"y\": " + form.example2.value + " }"
			
			form.value.value = JSON.stringify(data);
			alert(data);
			form.submit();
		}
	</script>
</head>

<body>
<!-- 	<form action="../_Register.php" enctype="application/json"> -->
<!-- 		<input type="hidden" name="user_name" value="POST" /> -->
<!-- 		<input type="hidden" name="user_password" value="PW_POST" /> -->
<!-- 		<input type="hidden" name="user_device_id" value="a25082797" /> -->
<!-- 		<input type="submit" class="send_btn" value="Register" /> -->
<!-- 	</form> -->
	<form action="../_Register.php" method="post" enctype="application/json">
		<input type="hidden" name="value" />
		<input type="submit" class="send_btn" value="Register" onClick="sendForm(this.form);" />
	</form>
</body>
</html>
