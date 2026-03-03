<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-card {
            width: 100%;
            max-width: 1100px;
            border-radius: 25px;
            padding: 50px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            background: #ffffff;
        }

        .form-control, .form-select {
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

        .btn-secondary {
            border-radius: 8px;
            padding: 10px 20px;
        }

        h2 {
            font-weight: 700;
            margin-bottom: 40px;
        }

        .section-divider {
            margin: 40px 0;
        }
    </style>
</head>

<body>

<div class="profile-card">

    <h2 class="text-center">Edit My Profile</h2>

    <form method="post" action="<?= site_url('/profile/update') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="row">

            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Name</label>
                <input type="text" name="name" value="<?= esc($user['name']) ?>" class="form-control" required>
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" value="<?= esc($user['email']) ?>" class="form-control" required>
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Phone</label>
                <input type="text" name="phone" value="<?= esc($user['phone']) ?>" class="form-control">
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Date of Birth</label>
                <input type="date" name="dob" value="<?= esc($user['dob']) ?>" class="form-control">
            </div>

            <div class="col-12 mb-4">
                <label class="form-label fw-semibold">Address</label>
                <input type="text" name="address" value="<?= esc($user['address']) ?>" class="form-control">
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select">
                    <option value="active" <?= $user['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= $user['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Leave blank if not changing">
            </div>

        </div>

        <hr class="section-divider">

        <div class="text-center">
            <button type="submit" class="btn btn-primary me-3">
                Update Profile
            </button>

            <a href="<?= site_url('/dashboard') ?>" class="btn btn-secondary">
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>