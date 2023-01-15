<!DOCTYPE html>
<html>

<head>
    <title>SignUp and Login</title>
    <link rel="stylesheet" type="text/css" href="signlog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container" id="container">
    
        <div class="form-container sign-up-container">
            <?= isset($msg)? $msg:''?>
            <form method="post" action="<?=site_url('save') ?>">
                <h1>Create Account</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>
                <span>or use your email for registration</span> -->
                <input type="text" id="firstname" name="firstname" placeholder="firstname" required>
                <input type="text" id="lastname" name="lastname" placeholder="lastname" required>
                <input type="text" id="mobile" name="mobile" placeholder="mobile" required>
                <!-- <select type="text" id="municipality" name="municipality" placeholder="municipality">
                    <option value="" disabled selected>municipality</option>
                    <option>Naujan</option>
                </select>
                <select type="text" id="barangay" name="barangay" placeholder="barangay">
                        <option value="" disabled selected>barangay</option>
                    <?//php foreach($address as $data){?>
                        <option><?//php echo $data->barangay;?></option>
                    <?//php }?>
                </select> -->
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form method="post" action="<?=site_url('login') ?>">
                <h1>Sign In</h1>
                <?= isset($msg)? $msg:''?>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a> -->
                </div>
                <!-- <span>or use your account</span> -->
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <a class="small" href="<?=site_url('userforgotpassword')?>">Forgot Password?</a>

                <button type="submit"> Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your details and start journey with us</p>
                    <button class="ghost" id="signUp">Register</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>


</body>

</html>
