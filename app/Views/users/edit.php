<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Edit User</h3>

<form method="post"
      action="/users/update/<?= $user['id'] ?>"
      enctype="multipart/form-data">

    <?= csrf_field() ?>

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               name="name"
               value="<?= esc($user['name']) ?>"
               class="form-control"
               required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               name="email"
               value="<?= esc($user['email']) ?>"
               class="form-control"
               required>
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text"
               name="phone"
               value="<?= esc($user['phone'] ?? '') ?>"
               class="form-control">
    </div>

    <!-- Date of Birth -->
    <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date"
               name="dob"
               value="<?= esc($user['dob'] ?? '') ?>"
               class="form-control">
    </div>

    <!-- Address -->
    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address"
                  class="form-control"
                  rows="3"><?= esc($user['address'] ?? '') ?></textarea>
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="active"
                <?= ($user['status'] ?? '') === 'active' ? 'selected' : '' ?>>
                Active
            </option>
            <option value="inactive"
                <?= ($user['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>
                Inactive
            </option>
        </select>
    </div>

    <!-- Password (Optional) -->
    <div class="mb-3">
        <label class="form-label">
            New Password (Leave blank to keep existing)
        </label>
        <input type="password"
               name="password"
               class="form-control">
    </div>

    <!-- Current Photo -->
    <div class="mb-3">
        <label class="form-label">Current Photo</label><br>

        <?php if (!empty($user['photo'])): ?>
            <img src="<?= base_url('uploads/' . $user['photo']) ?>"
                 width="80"
                 height="80"
                 style="object-fit: cover; border-radius: 6px;">
        <?php else: ?>
            <p>No Image</p>
        <?php endif; ?>
    </div>

    <!-- Change Photo -->
    <div class="mb-3">
        <label class="form-label">Change Photo</label>
        <input type="file"
               name="photo"
               class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/users" class="btn btn-secondary">Cancel</a>

</form>

<?= $this->endSection() ?>