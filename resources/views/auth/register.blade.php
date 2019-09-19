<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
        
		<meta charset="utf-8">
		<title>Matik Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('img/house.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="img/house1.jpg" alt="">
				</div>
                <form method="POST" action="{{ route('register') }}">
                        @csrf
					<a href="index.html"> <img src="img/matik-logo-black.png" alt="AVATAR"> </a>
					<h3>Registration Form</h3>
					<div class="form-group">
						<input id="firstname" placeholder="First Name" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>
						<input id="lastname" placeholder="Last Name" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>
                    </div>
                    
					{{-- <div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div> --}}
                    
                    <div class="form-wrapper">
                            <input type="text" placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <i class="zmdi zmdi-email"></i>
                        </div>
                        
                        {{-- <div class="form-wrapper">
                            <select name="" id="" class="form-control">
                                <option value="" disabled selected>Gender</option>
                                <option value="male">Male</option>
                                <option value="femal">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        </div> --}}
                        <div class="form-wrapper">
                            <input type="password" placeholder="Password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <i class="zmdi zmdi-lock"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="password" placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <i class="zmdi zmdi-lock"></i>
                        </div>
                        <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            <i class="zmdi zmdi-arrow-right"></i>
                        </button>                       
                        
                        {{-- <div class="container-login10-form-btn p-t-5">
                            <button class="login100-form-btn mt-1" type="submit">	
                                Register
    
                            </button>
    
                        </div> --}}
                        
                        <div class="text-center w-full p-t-25 p-b-230">
                            <a href="login.html" class="txt1">
                                I am already a member
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
    
