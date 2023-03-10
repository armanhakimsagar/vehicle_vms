<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{asset('assets/css/optional/sweetalert2.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/optional/all.min.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <script src="{{asset('assets/js/global/jquery.min.js')}}"></script>

</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header d-flex  justify-content-center">
                    <h5>System Login</h5>
                </div>
                <div class="d-flex  justify-content-center">
                    <h6 id="error" class="text-danger justify-content-center"></h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}" id="loginFormSubmit" novalidate="novalidate"
                        aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="input-group form-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-radius">
                                    <i class="fas fa-user ml-2 text-white"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control border-radius input-field " name="username"  required autofocus placeholder="Username">
                        </div>
                        <small id="username-error" class="text-danger " for="username"></small>

                        <div class="input-group form-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-radius ">
                                    <i class="fas fa-key ml-2 text-white"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control border-radius input-field " name="password" required autocomplete="current-password" placeholder="Password">
                        </div>
                        <small id="password-error" class="text-danger" for="username"></small>

                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Forgot password ?
                        </a>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a href="{{route('login')}}">Login as a dashboard/dealer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Made with love by Mutiullah Samim*/

        html,
        body {
            background-image: url("{{asset('assets/media/bg/login.jpg')}}");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: Arial, Helvetica, sans-serif sans-serif;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            position: fixed;
            top:20%;
            height: auto;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .form-group{
            margin-bottom: 2px;
            margin-top:15px
        }
        .error-msg{
            margin-left: 50px;
        }
        .card-header {
            background-color: rgba(0, 0, 0, .03);
            ;
        }

        .card-header h5 {
            color: white;
        }


        .input-group-prepend span {
            width: 50px;
            background-color: #E47F37;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;

        }

        .border-radius {
            border-radius: 50px;
        }

        .input-field {
            border-radius: 0 50px 50px 0 !important;
        }

        .remember {
            color: white;
            margin-top:15px;
        }

        .remember input {
            width: 16px;
            height: 16px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #E47F37;
            color: white;
            width: 100px;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
            color: white;
        }

        .card-footer {
            background-color: rgba(0, 0, 0, .03);
        }
        .success-alert{

        }
        @media (max-width: 768px){
            .card {
                padding: 0 25px;
            }
        }
    </style>



        <script src="{{asset('assets/js/global/popper.min.js')}}"></script>
		<script src="{{asset('assets/js/global/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/optional/sweetalert2.min.js')}}"></script>
		<script src="{{asset('assets/js/optional/sweetalert2.init.js')}}"></script>
		<script src="{{asset('assets/js/pages/sweetalert2.js')}}"></script>
    <script>

        $(document).on('submit','form#loginFormSubmit',function(event){

            event.preventDefault();
            $("[id$=-error]").text('');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.login.submit') }}",
                data: $('#loginFormSubmit').serialize(),
                success: function (response) {
                    $("small#username-error").removeClass("error-msg");
                    $("small#password-error").removeClass("error-msg");
                    if(response ==0){
                        $("h6#error").text("Username incorrect!");
                    }else if(response==1){
                        $("h6#error").text("Password incorrect!");
                    }else if(response==2){
                        $("h6#error").text("Your account is deactiveted! Please contact us.");
                    }else if(response==3){
                        swal.fire({
                            type: 'success',
                            title: 'Login successful!',
                            showConfirmButton: false,
                            timer: 3000,
                            customClass: 'success-alert'
                        });
                        setTimeout(function(){
                            window.location.href = "{{route('admin.dashboard')}}"
                            }, 500);
                    }
                },
                error: function (reject) {
                    // errorMsg()
                    if( reject.status === 422 || reject.status === 403 ) {
                        var errors = $.parseJSON(reject.responseText);
                        $.each(errors.error.message, function (key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                        $("small#" + key + "-error").addClass("error-msg");
                        });
                    }
                }
            });
        });


    </script>
</body>

</html>