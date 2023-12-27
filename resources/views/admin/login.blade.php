<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        #content {
            text-align: center;
            padding: 20px;
            margin-top: 150px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="content">
                    <div class="login-box">
                        @include('admin.message')
                        <div class="card card-outline card-primary">
                            <div class="card-header text-center">
                                <a href="#" class="h3">Administrative Panel</a>
                            </div>
                            <div class="card-body">
                                <p class="login-box-msg">Sign in to start your session</p>
                                <form action="{{ route('admin.authenticate') }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email">


                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="mb-1 mt-3">
                                    <a href="forgot-password.html">I forgot my password</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
