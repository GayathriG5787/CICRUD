<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">User Management</h3>
    <a href="/users/create" class="btn btn-primary">+ Add User</a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th width="150">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/users/delete/<?= $user['id'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>