<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Register</h2>
    </div>
    <div class="card-body">   
        <form action="#" method="post">
            <div class="imgcontainer">
                <img src="avatar.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Name</b></label>
                <input type="text" placeholder="Enter Username" class="form-control" name="username" required>
                <label for="uname"><b>Mobile</b></label>
                <input type="text" placeholder="Enter Username" class="form-control" name="username" required>
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" class="form-control" name="username" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
                <label for="psw"><b>Confirm Password</b></label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
                <button type="submit">Register</button>
                <div class="row">
                    <div class="col-12">
                        <span class="password">If you Are Already Register. <a href="{{ url('login') }}">Login</a> hear.</span>
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
