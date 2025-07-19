<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{asset('images/Untitled_design-removebg-preview.png')}}">
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth/loading.css')}}">
    <script src="{{asset('js/auth/login.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>
<body> @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                timer: 3000
            });
        </script>
    @endif

    <!-- Preloader -->
    <div class="preloader">
        <div class="loader-container">
           <div class="preload-image">               
            <img src="{{asset('images\Untitled_design-removebg-preview.png')}}">
           </div>

            <h1 class="title">GB Biller</h1>
           
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p class="loading-text">Loading...</p>
        </div>
    </div>

    <!-- Main Content (Your existing login form) -->
    <div class="main-content">
        <div class="container">
            <div class="login-form">
                <div class="logo">
                    <img src="{{asset('images\Untitled_design-removebg-preview.png')}}" alt="">
                </div>
                <h2>Login</h2>
                <form id="loginForm" action="{{route('loginpost')}}" method="post">
					@csrf
                    <div class="input-group">
                        <input type="email" required name="email" id="email">
                        <label>Email</label>
                    </div>
                    <div class="input-group">
                        <input type="password" required name="password" id="password">
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="remember" id="remember"> Remember me</label>
                    </div>
                    <button type="submit" id="loginButton">
                        <span id="buttonText">Login</span>
                        <div class="spinner" id="loginSpinner"></div>
                    </button>
                    <div class="register-link">
                        <p>Don't have an account? <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

  
</body>
</html>