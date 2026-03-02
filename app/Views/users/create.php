<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Add User</h3>

<form method="post" action="/users/store">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="/users" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>