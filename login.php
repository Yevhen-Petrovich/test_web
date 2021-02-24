<?php
    require "media\php\styles.php";
?>
<body>
<div class="login-form">    
    <form action="login.php" method="POST">
		<div class="avatar"><i class="material-icons"></i></div>
    	<h4 class="modal-title">Login to Your Account</h4>
		<?php
            $data = $_POST;
            if ( isset($data['do_login']) )
            {
				$errors=array();
				$user = R::findOne('users', 'login=?', array($data['login']));
				if ($user)
					{//Логин существует
						if (password_verify($data['password'], $user->password))
						{
							
							$_SESSION['logged_user'] = $user->login;
							echo '<div style=color:green; class="text"><p> Mission complete </p></div>';							
							echo '<script>window.location.href = "index.php";</script>';
							//header ("Location: index.php");  // перенаправление на нужную страницу
							echo $_SESSION['logged_user'];
						} else
					{
						$errors[] = 'Wrong password';
					} 
				}
					else 
					{
						$errors[] = 'No such user here';
					}
					
					if(! empty($errors))
                		{//good  
							echo '<div style=color:red; href = "..\index.php" class="text"><p>'.array_shift($errors). '</p></div>'; 

						}
				}	
		?>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Login" name="login" value="<?php echo $data['login']?>" required="required"> 
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $data['password']?>" required="required">
        </div>
        <div class="form-group small clearfix">
		
            <label class="form-check-label"><input type="checkbox" name="remember" id="remember"> Remember me</label>
            <a href = "recovery_pass.php" href="#" class="forgot-link">Forgot Password?</a>
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg" name="do_login" value="Login">              
    </form>			
    <div class="text-center small">Don't have an account? <a href = "signin.php" href="#">  Sign up</a></div>
	<div class="text-center small">Home page <a href = "/" href="#">  Home</a></div>
</div>

</body>