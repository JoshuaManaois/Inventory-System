<?php 
session_start(); 
include "user_db_control.php";

if (isset($_POST['user_name']) && isset($_POST['passw'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$user_name = validate($_POST['user_name']);
	$pass = validate($_POST['passw']);

	if (empty($user_name)) {
		header("Location: Login?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: Login?error=passw is required");
	    exit();
	}else{
		$sql = "SELECT * FROM accounts WHERE user_name='$user_name' AND passw='$pass'";

		$result = mysqli_query($connection, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $user_name && $row['passw'] === $pass) {
            	if ($row['branch'] === "disabled") {
            		header("Location: Login?loginFailed=true");
            		exit();
            	} else {
	            	$_SESSION['user_name'] = $row['user_name'];
	            	$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['branch'] = $row['branch'];
	            	$_SESSION['id'] = $row['id'];
					
					// Determine the user branch
					if ($_SESSION['branch'] == "admin") {
						header("Location: Home");
						exit();
					} elseif ($_SESSION['branch'] == "Branch-A") {
						header("Location: BranchA");
						exit();
					} elseif ($_SESSION['branch'] == "Branch-B") {
						header("Location: BranchB");
						exit();
					} 
	            }
            }else{
				header("Location: Login?error=Incorect User name or passw1");
		        exit();
			}
		}else{
			
			header("Location: Login?error=incorrectCredentials");
exit();
		}
	}
	
}else{
	header("Location: Login");
	exit();
}

?>
