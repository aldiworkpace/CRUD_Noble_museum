<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Login - Museum</title>
    <link href="data/src/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/CRUD_Noble/data/assets/image/background.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-blend-mode: darken;
            min-height: 100vh;
            background-attachment: fixed;
        }

        .card {
            background: rgba(156, 164, 205, 0.104);
            border-radius: 13px;
            box-shadow: 11px 15px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(19.2px);
            -webkit-backdrop-filter: blur(19.2px);
            border: 1px solid rgba(255, 255, 255, 0.98);
        }

        .btn-masuk {
            background-color: #d4f55a;
            color: #1c1c24;
            font-weight: 800;
            letter-spacing: 0.5px;
            border: none;
            transition: 0.3s;
        }

        .btn-masuk:hover {
            background-color: #c2e048;
            color: #1c1c24;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
    <main class="w-100" style="max-width: 420px;">
        <div class="card border-0 rounded-4 p-3 p-md-5 ">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-1 text-white">WELCOME BACK</h2>
                <p class="text-white" style="font-size: 0.95rem;">Hello, silakan Masuk Ke Museum</p>
            </div>
            <form action="data/login/proses_login.php" method="post">
                <h5 class="mb-3 fw-bold text-dark">Sign in</h5>
                <div class="form-group mb-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button class="w-100 btn btn-lg btn-masuk rounded-3" name="submit" type="submit">
                    Sign in
                </button>
                <div class="d-flex justify-content-between align-items-center mt-4" style="font-size: 0.9rem;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Remember Me">
                        <label class="form-check-label text-muted" for="rememberCheck">
                            Remember me
                        </label>
                    </div>
                </div>
            </form>

        </div>
    </main>

    <script src="data/src/js/bootstrap.bundle.min.js"></script>
</body>

</html>