
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Google Style Login Page With Bootstrap</title>
    <!-- Bootstrap -->
    <link href="{{url('admin/css/bootstrap.css')}}" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

            .form-signin .form-signin-heading, .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin .checkbox {
                font-weight: normal;
            }

            .form-signin .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

                .form-signin .form-control:focus {
                    z-index: 2;
                }

            .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

        .account-wall {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .login-title {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }

        .profile-img {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .need-help {
            margin-top: 10px;
        }

        .new-account {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body class="login-screen-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                
                 <h1 class="text-center login-title">AGROMG</h1>
                <div class="account-wall">
                    <img class="profile-img" src="http://lh3.googleusercontent.com/-fCvAilRkD5Q/VeqB3DKzIwI/AAAAAAAAET4/hdzqqWYflYE/s462-Ic42/icon-user-default.png"
                        alt="">
                    <form class="form-signin">
                    	<h1 class="text-center login-title">Iniciar sesión</h1>
                        <input type="text" class="form-control" placeholder="Usuario" required autofocus>
                        <input type="password" class="form-control" placeholder="Contraseña" required>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                            Entrar</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
