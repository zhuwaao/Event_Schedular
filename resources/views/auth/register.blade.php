<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>



                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
						Sign Up
					</span>


                    <div class="wrap-input100 validate-input" >
                        <input class="input100"  id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required  autocomplete="name" placeholder="Name" />
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
                    </div><br>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100"  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Email" autocomplete="username" />
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div><br>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "confirm Password">
                        <input class="input100" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        
                        <button class="login100-form-btn">
                            {{ __('Register') }}
                        </button>
                        
                        <div class="text-center p-t-136">
                            <a class="txt2" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }} 
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

    </body>
</html>

