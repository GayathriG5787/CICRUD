<?php
$imageSrc = null;

if (!empty($user['photo'])) {

    $imagePath = FCPATH . 'uploads/' . $user['photo'];

    if (file_exists($imagePath)) {

        // Resize image to smaller version before encoding
        $image = imagecreatefromstring(file_get_contents($imagePath));

        $width = imagesx($image);
        $height = imagesy($image);

        $newWidth = 300;
        $newHeight = floor($height * ($newWidth / $width));

        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        ob_start();
        imagejpeg($tmp, null, 75); // compress to JPEG
        $imageData = ob_get_clean();

        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($imageData);

        imagedestroy($image);
        imagedestroy($tmp);
    }
}
?>

<h2 style="text-align:center; margin-bottom:20px;">User Profile</h2>

<?php if ($imageSrc): ?>
    <div style="text-align:center; margin-bottom:20px;">
        <img src="<?= $imageSrc ?>" width="150" style="border-radius:50%;">
    </div>
<?php endif; ?>

<p><strong>Name:</strong> <?= $user['name'] ?></p>
<p><strong>Email:</strong> <?= $user['email'] ?></p>
<p><strong>Phone:</strong> <?= $user['phone'] ?></p>
<p><strong>Address:</strong> <?= $user['address'] ?></p>
<p><strong>Date of Birth:</strong> <?= $user['dob'] ?></p>
<p><strong>Status:</strong> <?= $user['status'] ?></p>