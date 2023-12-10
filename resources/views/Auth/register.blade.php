<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/style.css') }}">
</head>
<body>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Register</h2>
    </div>
    <div class="card-body">   
        <form action="{{ route('register') }}" method="post">
        @csrf
            <div class="imgcontainer">
                <img src="{{ url('public/avatar.png') }}" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger d-block">{{ $message }}</span>
                @enderror
                <label for="uname"><b>Mobile</b></label>
                <input type="text" placeholder="Enter Mobile Number" class="form-control" name="mobile" value="{{ old('mobile') }}">
                @error('mobile')
                <span class="text-danger d-block">{{ $message }}</span>
                @enderror
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email Address" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger d-block">{{ $message }}</span>
                @enderror
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password" >
                @error('password')
                <span class="text-danger d-block">{{ $message }}</span>
                @enderror
                <label for="psw"><b>Confirm Password</b></label>
                <input type="password" placeholder="Repeat Password" class="form-control" name="confirm-password">
                @error('confirm-password')
                <span class="text-danger d-block">{{ $message }}</span>
                @enderror
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
