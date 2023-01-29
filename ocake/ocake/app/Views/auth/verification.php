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
                <h1>Create Account</h1><br>
                <input type="text" id="code" name="code" placeholder="Enter 6 digit pin..." required>
            
                <button type="submit">Verify</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
           
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Login</button>
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
