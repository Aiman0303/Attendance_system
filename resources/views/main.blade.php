<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Put this in the <head> of your file -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-image: url('image/bg-img.jpg');
            background-color: #b7fdff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .Login-card{
           width: 100%;
           max-width: 400px;
           padding: 20px;
           border-radius: 10px;
           border:none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>LogIn</title>
</head>
<body>
    <div class="card Login-card">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Welcome Teachers</h3>

            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none">Forgot Password?</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>