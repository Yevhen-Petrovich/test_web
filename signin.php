<?php
    require "media\php\styles.php";
?>
<body>
<div class="login-form">    
    <form action="signin.php" method="POST">
		<div class="avatar"><i class="material-icons"></i></div>
        <h4 class="modal-title">Create an Account</h4>
        <?php
            $data = $_POST;
            if ( isset($data['do_signup']) )
            {
                $errors = array();
                if( trim($data['login']) == '')
                {
                    $errors[] = 'Enter the login';
                }
                if( trim($data['email']) == '')
                {
                    $errors[] = 'Enter the email';
                }
                if( $data['password'] == '')
                {
                    $errors[] = 'Enter the password';
                }
                if( $data['password2'] != $data['password'])
                {
                    $errors[] = 'Password mismatch';
                }

                if( R::count('users', "email = ?", array($data['email'])) > 0)
                {
                    $errors[] = "This email already exists";
                }
                
                if( R::count('users', "login = ?", array($data['login'])) > 0)
                {
                    $errors[] = "This login already exists";
                }
                
                if(empty($errors))
                {//good         
                    $user = R::dispense('users');
                    $user->login = $data['login'];
                    $user->email = $data['email'];
                    $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
                    R::store($user);
                    echo '<div style=color:green; class="text"><p> Mission complete </p></div>';
                }
                else
                {
                    echo '<div style=color:red; class="text"><p>'.array_shift($errors). '</p></div>';
                }
            }
        ?>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Login" name="login" value="<?php echo $data['login']?>" required="required"> 
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $data['email']?>" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $data['password']?>" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Сonfirm the password" name="password2" value="<?php echo $data['password2']?>" required="required"> 
        </div>
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Сreate" name="do_signup">   
    </form>	
    <div class="text-center small"> <a href = "login.php" href="#">  Back</a></div>           
</div>
</body>