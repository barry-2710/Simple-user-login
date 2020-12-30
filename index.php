<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guvi Assignment</title>
</head>
<body>
    <div class="main-content">
        <?php include "navbar.php" ?>
        <div class="container mt-5 mb-5 pb-5" id="login-card">
            <div class="card col-lg-6">
                <div class="card-body bg-light">
                <h4 class="text-center">Sign In</h4>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="w-100 btn btn-lg btn-outline-dark text-center mt-3">Sign In</button>
                    </form>
                    <p class="text-dark text-center mt-4">No Registered? <a href="register.php" class="text-dark fw-bold">Click here to Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>