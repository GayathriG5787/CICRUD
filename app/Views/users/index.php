<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">User Management</h3>
    <a href="<?= site_url('users/create') ?>" class="btn btn-primary">
        + Add User
    </a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th width="200">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= esc($user['name']) ?></td>
            <td><?= esc($user['email']) ?></td>

            <!-- Photo Column -->
            <td>
                <?php if (!empty($user['photo'])): ?>
                    <img src="<?= base_url('uploads/' . $user['photo']) ?>"
                         width="50"
                         height="50"
                         style="object-fit: cover; border-radius: 5px;">
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>

            <td class="d-flex gap-2">

                <!-- Edit Button -->
                <a href="<?= site_url('users/edit/' . $user['id']) ?>"
                   class="btn btn-sm btn-warning">
                    Edit
                </a>

                <!-- Delete Button -->
                <form action="<?= site_url('users/delete/' . $user['id']) ?>"
                      method="post"
                      onsubmit="return confirm('Are you sure?');">

                    <?= csrf_field() ?>

                    <button type="submit" class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>