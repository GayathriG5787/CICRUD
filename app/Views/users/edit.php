<h2>Edit User</h2>

<form method="post" action="/users/update/<?= $user['id'] ?>">
    Name: <input type="text" name="name" value="<?= $user['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>
    <button type="submit">Update</button>
</form>