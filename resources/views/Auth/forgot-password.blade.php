<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Forgot Password</h2>
    </div>
    <div class="card-body">   
        <form action="#" method="post">
            <div class="imgcontainer">
                <img src="avatar.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Email Address</b></label>
                <input type="text" placeholder="Enter Email Address" class="form-control" name="username" required>
                <button type="submit">Forgot Now</button>
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
