<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Edit User</h3>

<form method="post" action="/users/update/<?= $user['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/users" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>