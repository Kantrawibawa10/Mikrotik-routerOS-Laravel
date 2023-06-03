
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Router Mikrotik</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/login/login.css') }}">
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/img/login.jpg') }}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('assets/img/mik.png') }}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Sign into your account Router</p>
                            <form action="{{ route('login.access') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="ip" class="sr-only">Ip Address</label>
                                    <input type="text" name="ip" id="ip" class="mb-0 form-control @error ('ip') is-invalid @enderror" value="{{ old('ip') }}" placeholder="IP address">
                                    @error('ip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="user" class="sr-only">User</label>
                                    <input type="text" name="user" id="user" class="mb-0 form-control  @error ('user') is-invalid @enderror" value="{{ old('user') }}" placeholder="User Router">
                                    @error('user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="pass" id="pass" class="form-control" placeholder="***********">
                                </div>
                                <button class="btn btn-block login-btn mb-4" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('sweetalert::alert')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
