<h2>Edit My Profile</h2>

<form method="post" action="<?= site_url('/profile/update') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div>
        <label>Name</label>
        <input type="text" name="name" value="<?= esc($user['name']) ?>" required>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="<?= esc($user['email']) ?>" required>
    </div>

    <div>
        <label>Phone</label>
        <input type="text" name="phone" value="<?= esc($user['phone']) ?>">
    </div>

    <div>
        <label>Address</label>
        <input type="text" name="address" value="<?= esc($user['address']) ?>">
    </div>

    <div>
        <label>Date of Birth</label>
        <input type="date" name="dob" value="<?= esc($user['dob']) ?>">
    </div>

    <div>
        <label>Status</label>
        <select name="status">
            <option value="active" <?= $user['status'] == 'active' ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= $user['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
        </select>
    </div>

    <div>
        <label>New Password (leave blank if not changing)</label>
        <input type="password" name="password">
    </div>

    <br>

    <button type="submit">Update Profile</button>
</form>