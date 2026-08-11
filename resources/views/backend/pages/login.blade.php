<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Admin Login | Roydon MEP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f4f6f5;
        }

        .login-page {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 35px;
            border: 1px solid #e1e5e2;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .login-logo {
            display: grid;
            width: 55px;
            height: 55px;
            margin: 0 auto 15px;
            place-items: center;
            border-radius: 10px;
            background: #82b440;
            color: white;
            font-size: 25px;
            font-weight: 700;
        }

        .login-title {
            margin-bottom: 5px;
            color: #101613;
            font-size: 25px;
            font-weight: 700;
            text-align: center;
        }

        .login-description {
            margin-bottom: 25px;
            color: #7b857f;
            font-size: 14px;
            text-align: center;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
        }

        .form-control {
            min-height: 48px;
        }

        .form-control:focus {
            border-color: #82b440;
            box-shadow: 0 0 0 3px rgba(130, 180, 64, 0.15);
        }

        .login-button {
            min-height: 48px;
            border: 0;
            background: #101613;
            color: white;
            font-weight: 600;
        }

        .login-button:hover {
            background: #82b440;
            color: white;
        }

        .copyright {
            margin: 25px 0 0;
            color: #929b96;
            font-size: 11px;
            text-align: center;
        }

        .pw-wrapper {
            position: relative;
        }

        .pw-wrapper .form-control {
            padding-right: 44px;
        }

        .pw-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9aab9e;
            cursor: pointer;
            padding: 0;
            font-size: 15px;
            line-height: 1;
            transition: color 0.2s;
        }

        .pw-toggle:hover {
            color: #82b440;
        }
    </style>
</head>

<body>

    <main class="login-page">

        <div class="login-card">

            <div class="login-logo">
                R
            </div>

            <h1 class="login-title">
                Admin Login
            </h1>

            <p class="login-description">
                Login to manage Roydon MEP website
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}"
                method="POST">

                @csrf

                <div class="mb-3">

                    <label for="email" class="form-label">
                        Email Address
                    </label>

                    <input type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter admin email"
                        autocomplete="email"
                        required
                        autofocus>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="password" class="form-label">
                        Password
                    </label>

                    <div class="pw-wrapper">
                        <input type="password"
                            id="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter password"
                            autocomplete="current-password"
                            required>

                        <button type="button" class="pw-toggle" id="pwToggle" aria-label="Show/hide password">
                            <i class="fa-regular fa-eye" id="pwIcon"></i>
                        </button>
                    </div>

                    @error('password')
                        <div class="invalid-feedback" style="display:block;">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-check mb-4">

                    <input type="checkbox"
                        id="remember"
                        name="remember"
                        value="1"
                        class="form-check-input"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember" class="form-check-label">
                        Remember me
                    </label>

                </div>

                <button type="submit"
                    class="btn login-button w-100">

                    Login

                </button>

            </form>

            <p class="copyright">
                © {{ date('Y') }} Roydon MEP Contracting
            </p>

        </div>

    </main>

    <script>
        document.getElementById('pwToggle').addEventListener('click', function () {
            var input = document.getElementById('password');
            var icon  = document.getElementById('pwIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>

</html>