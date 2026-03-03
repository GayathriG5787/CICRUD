<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 500px;
            border-radius: 25px;
            padding: 50px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            background: #ffffff;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 14px;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #1e40af;
        }

        h2 {
            font-weight: 700;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h2 class="text-center">Welcome Back</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>

        <div class="mb-4">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>

    </form>

</div>

</body>
</html>