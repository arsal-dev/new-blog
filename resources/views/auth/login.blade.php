<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="bg-dark">
    <h3 class="text-center mt-5 text-light">Login</h3>

    <div class="container mt-5 col-4">
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Error!</h4>
                <p>{{ session()->get('error') }}</p>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success!</h4>
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('login.attempt') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email">email</label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email"
                            class="form-control">
                    </div>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div>
                        <label for="remember">remember me</label>
                        <input type="checkbox" id="remember" name="remember">
                    </div>
                    <p class="mt-3" style="float: right">don't have an account? <a
                            href="{{ route('register') }}">Register</a></p>
                    <input type="submit" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
