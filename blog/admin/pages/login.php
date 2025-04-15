<script type="text/javascript">
	$(document).ready(function() {
		$("#btnLogin").click(function() {
			//get input field values
			var user_email = $('input[name=txtEmail]').val();
			var user_password = $('input[name=txtPassword]').val();			
			//simple validation at client's end
			//we simply change border color to red if empty field using .css()
			var proceed = true;
			if(user_email==""){ 
				$('#txtEmail').css('border-color','red'); 
				proceed = false;
			}
			if(user_password=="") {    
				$('#txtPassword').css('border-color','red'); 
				proceed = false;
			}	
			//everything looks good! proceed...
			if(proceed) {
				//data to be sent to server
				post_data = {'userEmail':user_email, 'userPassword':user_password};
				//Ajax post data to server
				$.post("./pages/f-login.php", post_data, function(response){  
					//load json data from server and output message     
					if(response.type == 'error') {
						output = '<div class="loginError">'+response.text+'</div>';
					} else {
						window.location.replace("./");
						//output = '<div class="loginSuccess">'+response.text+'</div>';
						//reset values in all input fields
						//$('#frmLogin input').val(''); 
						//$('#frmLogin textarea').val(''); 
					}
					$(".loginResult").hide().html(output).slideDown();
				}, 'json');
			}
		});		
		//reset previously set border colors and hide all message on .keyup()
		$("#frmLogin input").keyup(function() { 
			$("#txtEmail, #txtPassword").css('border-color','#dbdbdb'); 
			$(".pqfResult").slideUp();
		});		
	});	
</script>

<div class="login-box">
	<div class="login-logo">
		<a href="./"><b>Administrator Panel</b></a>
	</div><!-- /.login-logo -->
	
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<!--form action="./" method="post"-->
			<div class="form-group has-feedback">
				<input type="email" name="txtEmail" id="txtEmail" class="form-control" value="" placeholder="Email" tabindex="1" />
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password" tabindex="2" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label><input type="checkbox">&nbsp;&nbsp;Remember Me</label>
					</div>
				</div><!-- /.col -->
				<div class="col-xs-4">
					<input type="submit" name="btnLogin" id="btnLogin" value="Sign in" class="btn btn-primary btn-block btn-flat" tabindex="3" />
				</div><!-- /.col -->
			</div>
		<!--/form-->
		
		<!--<a href="#">I forgot my password</a>--><br>
	
	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->

