



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
   
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" href="assets/css/login.css">



</head>
<body>

<div class="container">

	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				
				
			</div>
			<div class="card-body">
				<form action="user_login" method="POST">
                    <!-- User Name -->
					<div class="input-group form-group"> 
                        
						<div class="input-group-prepend">
							<span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                            </svg></span>

                            
						</div>
						<input type="text" class="form-control" id="user_name" name="user_name" placeholder="username">
						
					</div>
                    <!-- Password -->
					<div class="input-group form-group">
                        
						<div class="input-group-prepend">
							<span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg></span>
						</div>
						<input type="password" class="form-control" id="passw" name="passw" placeholder="password">
					</div>
                    
                    
					
					<div class="form-group">
                        
					
						<button type="submit" class="btn btn-primary">Login</button>  <!-- submit to login require -->
					</div>
					<div id="incorrect-credentials" class="alert alert-danger d-none" role="alert">
  Incorrect username or password. Please try again.
</div>
				</form>
			</div>
		
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
  const urlParams = new URLSearchParams(window.location.search);
  const loginFailed = urlParams.get('loginFailed');
  if (loginFailed === 'true') {
    $('#login-failed').removeClass('d-none');
    showAlert();
  }
});

function showAlert() {
  alert("Your account has been disabled. Please contact the administrator for assistance.");
}

$(document).ready(function() {
  const urlParams = new URLSearchParams(window.location.search);
  const error = urlParams.get('error');
  if (error === 'loginFailed') {
    $('#login-failed').removeClass('d-none');
  } else if (error === 'incorrectCredentials') {
    $('#incorrect-credentials').removeClass('d-none');
  }
});

</script>



</body>
</html>