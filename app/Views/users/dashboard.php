<h2>Welcome, <?= esc($user['name']) ?> 👋</h2>

<hr>

<p><strong>Email:</strong> <?= esc($user['email']) ?></p>
<p><strong>Phone:</strong> <?= esc($user['phone']) ?></p>
<p><strong>Address:</strong> <?= esc($user['address']) ?></p>
<p><strong>Date of Birth:</strong> <?= esc($user['dob']) ?></p>
<p><strong>Status:</strong> <?= esc($user['status']) ?></p>

<?php if (!empty($user['photo'])): ?>
    <p><strong>Profile Photo:</strong></p>
    <img src="<?= base_url('uploads/' . $user['photo']) ?>" width="150">
<?php endif; ?>

<hr>

<a href="<?= site_url('/profile/edit') ?>">Edit Profile</a> |
<a href="<?= site_url('/profile/download') ?>">Download PDF</a> |
<a href="<?= site_url('/logout') ?>">Logout</a>