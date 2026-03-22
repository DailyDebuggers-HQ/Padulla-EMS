<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UA ACADEMY</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background: linear-gradient(rgba(13, 27, 42, 0.8), rgba(13, 27, 42, 0.8)), url('assets/img/hero.png') no-repeat center center;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(236, 201, 75, 0.5);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-container img {
            width: 100px;
            height: auto;
            margin-bottom: 15px;
        }
        .logo-container h2 {
            color: #0d1b2a;
            font-weight: 800;
            margin: 0;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
        }
        .btn-gold {
            background-color: #ecc94b;
            color: #0d1b2a;
            font-weight: 700;
            border-radius: 50px;
            padding: 12px;
            width: 100%;
            border: 2px solid #ecc94b;
            transition: all 0.3s ease;
        }
        .btn-gold:hover {
            background-color: #f1d570;
            border-color: #f1d570;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .input-group-text {
            border-radius: 50px 0 0 50px;
            border-right: none;
            background-color: transparent;
        }
        .form-control {
            border-left: none;
        }
        .input-group {
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border-radius: 50px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        .back-link a:hover {
            color: #0d1b2a;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="logo-container">
            <img src="assets/img/logo.png" alt="UA ACADEMY Logo">
            <h2>UA Academy</h2>
            <p class="text-muted small">Employee Portal Login</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center rounded-pill py-2">
                <i class="fas fa-exclamation-circle me-1"></i> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user text-muted"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock text-muted"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-gold mt-2"><i class="fas fa-sign-in-alt me-2"></i> LOGIN</button>
        </form>

        <div class="back-link">
            <a href="index.php"><i class="fas fa-arrow-left me-1"></i> Back to Homepage</a>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>