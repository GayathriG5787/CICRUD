<?php
$imageSrc = null;

if (!empty($user['photo'])) {

    $imagePath = FCPATH . 'uploads/' . $user['photo'];

    if (file_exists($imagePath)) {

        $image = imagecreatefromstring(file_get_contents($imagePath));

        $width = imagesx($image);
        $height = imagesy($image);

        $newWidth = 300;
        $newHeight = floor($height * ($newWidth / $width));

        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        ob_start();
        imagejpeg($tmp, null, 80);
        $imageData = ob_get_clean();

        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($imageData);

        imagedestroy($image);
        imagedestroy($tmp);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 0;
            font-size: 26px;
        }

        .divider {
            height: 2px;
            background-color: #e0e0e0;
            margin: 20px 0;
        }

        .profile-image {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-image img {
            border-radius: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 10px 5px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            width: 30%;
            color: #555;
        }

        .value {
            width: 70%;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            background-color: #28a745;
            color: white;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>User Profile</h2>
</div>

<div class="divider"></div>

<?php if ($imageSrc): ?>
    <div class="profile-image">
        <img src="<?= $imageSrc ?>" width="130">
    </div>
<?php endif; ?>

<table>
    <tr>
        <td class="label">Name</td>
        <td class="value"><?= $user['name'] ?></td>
    </tr>
    <tr>
        <td class="label">Email</td>
        <td class="value"><?= $user['email'] ?></td>
    </tr>
    <tr>
        <td class="label">Phone</td>
        <td class="value"><?= $user['phone'] ?></td>
    </tr>
    <tr>
        <td class="label">Address</td>
        <td class="value"><?= $user['address'] ?></td>
    </tr>
    <tr>
        <td class="label">Date of Birth</td>
        <td class="value"><?= $user['dob'] ?></td>
    </tr>
    <tr>
        <td class="label">Status</td>
        <td class="value">
            <span class="status-badge">
                <?= ucfirst($user['status']) ?>
            </span>
        </td>
    </tr>
</table>

<div class="divider"></div>

<p style="text-align:center; font-size:12px; color:#888;">
    Generated on <?= date('d M Y, h:i A') ?>
</p>

</body>
</html>