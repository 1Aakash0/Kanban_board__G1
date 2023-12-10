<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Login</h2>
    </div>
    <div class="card-body">   
        <form action="#" method="post">
            <div class="imgcontainer">
                <img src="avatar.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" class="form-control" name="username" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
                <div class="row">
                    <div class="col-6">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                    <div class="col-6">
                        <span class="text-right password"><a href="{{ url('forgot-password') }}">Forgot Password?</a></span>
                    </div>
                </div>
                <button type="submit">Login</button>
                <div class="row">
                    <div class="col-12">
                        <span class="password">If you are not <a href="{{ url('register') }}">Register</a></span>
                    </div>
                </div>
            </div> 
        </form>
    </div> 
    <div class="card-footer">
        <div class="container"></div>
    </div>
</div>
</body>
</html>
