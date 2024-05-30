<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="bg-dark">
    <h3 class="text-center mt-5 text-light">Register</h3>
    <div class="container mt-5 col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.user') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">name</label>
                        <input type="text" id="name" value="{{ old('name') }}" name="name"
                            class="form-control @error('name')
                            is-invalid
                        @enderror">
                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="email">email</label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email"
                            class="form-control @error('email')
                            is-invalid
                        @enderror">
                    </div>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="password">password</label>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password')
                            is-invalid
                        @enderror">
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="cpassword">confirm password</label>
                        <input type="password" id="cpassword" name="confirm_password"
                            class="form-control @error('confirm_password')
                            is-invalid
                        @enderror">
                    </div>
                    @error('confirm_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <p class="mt-3" style="float: right">already have an account? <a
                            href="{{ route('login') }}">Login</a></p>
                    <input type="submit" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
