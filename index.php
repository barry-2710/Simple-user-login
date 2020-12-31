<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guvi Assignment</title>
</head>
<body>
    <div class="main-content">
        <?php 
            include "navbar.php";
            if(isset($_SESSION["loggedin"])) {
                header("Location: home.php");
                exit();
            }
        ?>
        <div class="container mt-5 mb-5 pb-5" id="login-card">
            <div class="card col-lg-6">
                <div class="card-body bg-light">
                <h4 class="text-center">Sign In</h4>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control email" name="email" id="Email" aria-describedby="emailHelp">
                            <div class="invalid-feedback emailError" style="font-size:16px;">Email is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control password" name="password" id="Password">
                            <div class="invalid-feedback passwordError" style="font-size:16px;">Password is required</div>
                        </div>
                        <button type="submit" id="sign_in" class="w-100 btn btn-lg btn-outline-dark text-center mt-3">Sign In</button>
                    </form>
                    <p class="text-dark text-center mt-4">No Registered? <a href="register.php" class="text-dark fw-bold">Click here to Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</body>
</html>