<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SBIMS Portal Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(135deg, #1a2a6c 0%, #2d4373 100%);
            position: relative;
            overflow: hidden;
        }
        /* Legislative Background Pattern */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                /* Pillars */
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 160"><path d="M30,10 v100 m0,-100 h40 v100 h-40 M30,20 h40 M30,90 h40" stroke="rgba(255,255,255,0.1)" fill="none" stroke-width="4"/><path d="M25,0 h50 l-5,10 h-40 z M25,110 h50 l-5,10 h-40 z" fill="rgba(255,255,255,0.1)"/></svg>'),
                /* Scales of Justice */
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M50,20 v60 M30,40 h40 M25,60 a15,15 0 1,0 30,0 a15,15 0 1,0 -30,0 M45,60 a5,5 0 1,0 10,0 a5,5 0 1,0 -10,0" stroke="rgba(255,255,255,0.1)" fill="none" stroke-width="2"/></svg>'),
                /* Scroll/Document */
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 80"><path d="M10,10 h40 v60 h-40 z M15,20 h30 M15,30 h30 M15,40 h20" stroke="rgba(255,255,255,0.1)" fill="none" stroke-width="2"/><path d="M45,10 c5,0 5,0 5,5 v50 c0,5 0,5 -5,5" stroke="rgba(255,255,255,0.1)" fill="none" stroke-width="2"/></svg>');
                
            background-size: 200px 320px, 150px 150px, 120px 160px;
            background-position: 
                calc(50% - 400px) 50%,
                calc(50% + 400px) 50%,
                50% 50%;
            background-repeat: repeat-y;
            opacity: 0.3;
            z-index: -1;
            animation: backgroundScroll 60s linear infinite;
        }

        @keyframes backgroundScroll {
            0% {
                background-position: 
                    calc(50% - 400px) 0%,
                    calc(50% + 400px) 0%,
                    50% 0%;
            }
            100% {
                background-position: 
                    calc(50% - 400px) 100%,
                    calc(50% + 400px) 100%,
                    50% 100%;
            }
        } 

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        /* Legislative Pattern for Login Container */
        .login-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M0,0 h100 v2 h-100z M0,25 h100 v1 h-100z M0,50 h100 v1 h-100z M0,75 h100 v1 h-100z" fill="rgba(26,42,108,0.05)"/></svg>');
            background-size: 50px 100px;
            opacity: 0.5;
            z-index: 0;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }
        .login-header {
            background: linear-gradient(135deg, #1a2a6c 0%, #2d4373 100%);
            color: white;
            padding: 30px;
            text-align: center;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        /* Decorative Header Pattern */
        .login-header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M0,0 h100 v2 h-100z M0,25 h100 v1 h-100z M0,50 h100 v1 h-100z M0,75 h100 v1 h-100z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: 20px 40px;
            opacity: 0.3;
        }

        .login-form {
            padding: 40px;
            position: relative;
            z-index: 1;
        }
        .form-control {
            border-radius: 20px;
            padding: 12px 20px;
            border: 1px solid #1a2a6c;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        .form-control:focus {
            border-color: #1a2a6c;
            box-shadow: 0 0 0 0.2rem rgba(26, 42, 108, 0.25);
            background: white;
        }
        .btn-login {
            border-radius: 20px;
            padding: 12px 20px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #1a2a6c 0%, #2d4373 100%);
            border: none;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .btn-login::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 100%;
            background: linear-gradient(115deg, 
                rgba(255,255,255,0) 0%, 
                rgba(255,255,255,0.1) 30%, 
                rgba(255,255,255,0.3) 50%, 
                rgba(255,255,255,0.1) 70%, 
                rgba(255,255,255,0) 100%);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 42, 108, 0.4);
        }
        .btn-login:hover::after {
            transform: translateX(100%);
        }
        .client-login-link {
            text-align: center;
            margin-top: 20px;
        }
        .client-login-link a {
            color: #1a2a6c;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .client-login-link a:hover {
            color: #2d4373;
            text-decoration: underline;
        }
        .logo {
            max-width: 100px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-container">
                    <div class="login-header">
                        <img src="{{ URL::asset('images/icon.png') }}" alt="SBMIS Logo" class="logo">
                        <h2>SBIMS Portal Login</h2>
                    </div>
                    <div class="login-form">
                        <form action="login" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="login_email" class="form-label">Username</label>
                                <input type="text" id="login_email" name="login_email" class="form-control" placeholder="Enter your email" required autofocus value="{{ old('login_email') }}">
                                @error('login_email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="login_password" class="form-label">Password</label>
                                <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Enter your password" required>
                                @error('login_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="login_error" class="form-label" hidden>Password</label>
                                <input type="text" id="login_error" name="login_error" class="form-control" placeholder="Enter your password" value="1" hidden>
                                @error('login_error')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login" type="submit">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>