<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .profile-card {
            border-radius: 20px;
        }
        .profile-img {
            width: 170px;
            height: 170px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #ffffff;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="card profile-card shadow-lg border-0 p-4">
        <div class="row align-items-center">

            <!-- Profile Image -->
            <div class="col-md-4 text-center">
                <?php if (!empty($user['photo'])): ?>
                    <img src="<?= base_url('uploads/' . $user['photo']) ?>" 
                         class="profile-img shadow">
                <?php else: ?>
                    <img src="https://via.placeholder.com/170"
                         class="profile-img shadow">
                <?php endif; ?>
            </div>

            <!-- User Info -->
            <div class="col-md-8">

                <h2 class="fw-bold mb-3">
                    Welcome, <?= esc($user['name']) ?>
                </h2>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <p><strong>Email:</strong><br><?= esc($user['email']) ?></p>
                    </div>

                    <div class="col-sm-6">
                        <p><strong>Phone:</strong><br><?= esc($user['phone']) ?></p>
                    </div>

                    <div class="col-sm-6">
                        <p><strong>Address:</strong><br><?= esc($user['address']) ?></p>
                    </div>

                    <div class="col-sm-6">
                        <p><strong>Date of Birth:</strong><br><?= esc($user['dob']) ?></p>
                    </div>

                    <div class="col-sm-6">
                        <p><strong>Status:</strong><br>
                            <span class="badge bg-success px-3 py-2">
                                <?= esc($user['status']) ?>
                            </span>
                        </p>
                    </div>
                </div>

                <hr>

                <!-- Buttons -->
                <div class="mt-3">
                    <a href="<?= site_url('/profile/edit') ?>" class="btn btn-primary me-2">
                        Edit Profile
                    </a>

                    <a href="<?= site_url('/profile/download') ?>" class="btn btn-outline-secondary me-2">
                        Download PDF
                    </a>

                    <a href="<?= site_url('/logout') ?>" class="btn btn-danger">
                        Logout
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>

</body>
</html>