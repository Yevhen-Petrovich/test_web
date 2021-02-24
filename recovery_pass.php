<?php
    require "media\php\styles.php";
?>
<body>
<div class="login-form">    
    <form action="recovery_pass.php" method="POST">
		<div class="avatar"><i class="material-icons"></i></div>
    	<h4 class="modal-title">Password recovery</h4>
        <?php
        $data = $_POST;
        if ( isset($data['do_login']) )
        {
            $errors=array();
            $user = R::findOne('users', 'login=?', array($data['login']));
            if ($user)
                {
                    $simv = array ("92", "83", "7", "66", "45", "4", "36", "22", "1", "0", 
                   "k", "l", "m", "n", "o", "p", "q", "1r", "3s", "a", "b", "c", "d", "5e", "f", "g", "h", "i", "j6", "t", "u", "v9", "w", "x5", "6y", "z5");
                    for ($k = 0; $k < 8; $k++)
                        {
                        shuffle ($simv);
                        $string = $string.$simv[1];
                        }
                        $user->password = password_hash($string,PASSWORD_DEFAULT);
                        echo '<div style=color:green; class="text"><p> Mission complete </p></div>';		
                                                
                        $mail = $user['email'];
                        $login = $user['login'];

                        mail($mail, "Password recovery request", "Hello, $login. Your new password: $string");
                            
                        echo '<div style=color:black; class="text"><p> <small> A password has been sent to your mailbox: ' .$mail. ', letter sent </small></p></div>';
                        R::store($user);
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
     
        <input type="submit" class="btn btn-primary btn-block btn-lg" name="do_login" value="Recovery">              
    </form>			
    <div class="text-center small">Login? <a href = "login.php" href="#">  Login</a></div>
	<div class="text-center small">Home page <a href = "/" href="#">  Home</a></div>
</div>
</body>