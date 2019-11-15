<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="607242155951-f6fdmir1hh4na2f3up69bfa556tulsm8.apps.googleusercontent.com">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
              <h2 style="color: blueviolet;">SMART MR</h2>
              <!-- <a href="#"> -->
              <!-- <img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span> -->
            </div>
            <div class="card-body">
                <form method="POST" id="login">
                        <div class="form-group">
                            <strong id="message"></strong>
                            </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <!-- <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span> -->
                        </label>
                    </div>
                    <button type="submit"  class="btn btn-primary btn-lg btn-block">Sign in</button>


                </form>
            </div>
            <!-- <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div> -->
        </div>
        <?php include "footer.php"; ?>
        <!-- <footer class="footer"> ©  All rights reserved.  designed by <br/> <a href="https://www.praxello.com/" target='_blank'>Praxello Solutions Pvt Ltd</a></footer> -->
    </div>


    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/apifile.js"></script>
    <script src="js/login.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
