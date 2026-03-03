<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Add User</h3>

<form method="post" action="<?= site_url('users') ?>" enctype="multipart/form-data">
<?= csrf_field() ?>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="dob" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="/users" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>