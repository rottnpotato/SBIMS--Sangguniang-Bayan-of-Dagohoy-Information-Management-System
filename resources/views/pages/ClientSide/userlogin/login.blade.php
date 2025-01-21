<!-- index.html -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/ClientCSS/Footer-Clean.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/ClientCSS/Header-Blue.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/ClientCSS/styles.css') }}">

  <!-- JavaScript Files -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <!-- Custom JavaScript -->
  <script>
    // Add custom JavaScript code here
  </script>
</head>

<body style="background-image: url({{ URL::asset('images/city.jpg') }}); background-repeat:no-repeat; background-size: cover">
  <header>
    @include('inc.client_nav_login')
  </header>

  <main class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-sm-9 col-md-7 col-lg-7">
        <div class="card card-signin my-5">
          <div class="card-body">
            @if (session()->has("success_register"))
              <div class="alert alert-success">
                {{ session()->get("success_register") }}
              </div>
            @endif

            <h5 class="card-title text-center">Log In</h5>

            <!-- Form -->
            <form class="log-in-form" action="/management/login" method="post">
              @csrf

              <div class="form-group mt-2">
                <label for="client_login_email">Email address</label>
                <input type="email" id="client_login_email" name="client_login_email" class="form-control" placeholder="Email address" autofocus value="{{ old('client_login_email') }}">
                @error('client_login_email')
                  <span class="text-danger error_text">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mt-2">
                <label for="client_login_password">Password</label>
                <input type="password" id="client_login_password" name="client_login_password" class="form-control" placeholder="Password">
                @error('client_login_password')
                  <span class="text-danger error_text">{{ $message }}</span>
                @enderror
                <br><a href="/management/forgot_password">Forgot your password?</a>
              </div>

              <button class="btn btn-lg btn-success btn-block text-uppercase mt-3" id="clientLoginBtn" type="submit">Log in</button>
            </form>

            <br><a href="/management/register">Don't have an account?? Register!</a>
            <br><a href="/login">Go to admin login</a>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
